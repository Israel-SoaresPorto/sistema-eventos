<?php

namespace Core;

use Core\Http\Request;
use Core\Http\Response;
use Exception;

class Router
{
    /**
     * URL base do roteador
     * @var string
     */
    private string $urlBase = '';

    /**
     * Prefixo da URL do roteador
     * @var string
     */
    private string $prefix = '';

    /**
     * Rotas registradas no roteador
     * @var array
     */
    private array $routes = [];

    /**
     * Instância da requisição HTTP
     * @var Request
     */
    private Request $request;

    /**
     * Instância da resposta HTTP
     * @var Response
     */
    private Response $response;

    public function __construct(string $urlBase = URL_BASE)
    {
        $this->request = new Request();
        $this->urlBase = $urlBase;
        $this->setPrefix();
    }

    /**
     * Retorna a URI da requisição
     * @return string
     */
    public function getUri(): string
    {
        return $this->request->getUri();
    }

    /**
     * Define o prefixo da URL do roteador
     */
    public function setPrefix(): void
    {
        $url_parsed = parse_url($this->urlBase, PHP_URL_PATH) ?? '';
        $this->prefix = rtrim($url_parsed, '/');
    }

    /**
     * Adiciona uma rota ao roteador
     * @param string $method Método HTTP da rota (GET, POST, etc.)
     * @param string $route Caminho da rota
     * @param array $params Parâmetros da rota (controller, action, etc.)
     */
    public function addRoute(string $method, string $route, array $params = []): void
    {
        // Percorre os parâmetros para verificar se há uma função anônima (Closure) e a define como controlador
        foreach ($params as $key => $value) {
            if ($value instanceof \Closure) {
                $params['controller'] = $value;
                // Remove o parâmetro da lista de parâmetros
                unset($params[$key]);
                continue;
            }
        }

        // Define os parâmetros padrão da rota
        $params['variables'] = [];
        // Expressão regular para identificar variáveis na rota
        $patternVariable = '/{(.*?)}/';

        // Verifica se a rota contém variáveis e as substitui por expressões regulares 
        if (preg_match_all($patternVariable, $route, $matches)) {
            $route = preg_replace($patternVariable, '(.*?)', $route);
            $params['variables'] = $matches[1];
        }

        // Cria o padrão da rota para correspondência usando expressões regulares
        $patternRoute = '/^' . str_replace('/', '\/', $route) . '$/';

        // Armazena a rota no array de rotas do roteador
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Adiciona uma rota GET ao roteador
     * @param string $route Caminho da rota
     * @param array $params Parâmetros da rota (controller, action, etc.)
     */
    public function get(string $route, array $params = []): void
    {
        $this->addRoute('GET', $route, $params);
    }

    /**
     * Adiciona uma rota POST ao roteador
     * @param string $route Caminho da rota
     * @param array $params Parâmetros da rota (controller, action, etc.)
     */
    public function post(string $route, array $params = []): void
    {
        $this->addRoute('POST', $route, $params);
    }

    /**
     * Obtém a rota correspondente ao caminho e método da requisição
     * @return array 
     * @throws Exception 
     */
    private function getRoute(): array
    {
        // Obtém a URI da requisição e o método HTTP
        $uri = $this->getUri();
        $httpMethod = $this->request->getMethod();

        // Percorre as rotas registradas para encontrar uma correspondência com o caminho e método da requisição
        foreach ($this->routes as $pattern => $methods) {
            // Verifica se o padrão da rota corresponde ao caminho da requisição
            if (preg_match($pattern, $uri, $matches)) {

                // Verifica se o método HTTP da requisição corresponde ao método da rota
                if (isset($methods[$httpMethod])) {
                    unset($matches[0]); // Remove o primeiro elemento do array de correspondências (o caminho completo)

                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys, $matches); // Combina as variáveis da rota com os valores correspondentes
                    $methods[$httpMethod]['variables']['request'] = $this->request; // Adiciona a instância da requisição aos parâmetros da rota

                    return $methods[$httpMethod]; // Retorna os parâmetros da rota correspondente
                }

                throw new Exception("Método não permitido para a rota: $uri", 405);
            }
        }

        throw new Exception("Rota não encontrada: $uri", 404);
    }

    /**
     * Dispara a rota correspondente ao método e caminho especificados
     * @param string $method Método HTTP da rota (GET, POST, etc.)
     * @param string $path Caminho da rota
     */
    public function dispatch(string $method, string $path)
    {
        try {
            $route = $this->getRoute();

            if (!isset($route['controller'])) {
                throw new Exception("Erro do servidor", 500);
            }

            $args = [];

            $reflection = new \ReflectionFunction($route['controller']);

            foreach ($reflection->getParameters() as $param) {
                $name = $param->getName();
                $args[] = $route['variables'][$name] ?? '';   
            }

            return call_user_func_array($route['controller'], $args);

        } catch (Exception $e) {
            return new Response($e->getMessage(), $e->getCode() ?: 500);
        }
    }
}
