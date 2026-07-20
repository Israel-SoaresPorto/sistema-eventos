<?php

namespace Core;

use Core\Http\Request;
use Core\Http\Response;
use Exception;

class Router
{
    /**
     * Base URL do aplicativo
     * @var string
     */
    private string $baseUrl;
    /**
     * Array de rotas registradas
     * @var array
     */
    private static array $routes = [];

    public function __construct(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
        // Inicializa o array de rotas
        self::$routes = [];
    }


    /**
     * Registra uma rota GET
     * @param string $uri
     * @param array $action
     */
    public static function get(string $uri, array $action): void
    {
        self::addRouter("GET", $uri, $action);
    }

    /**
     * Registra uma rota POST
     * @param string $uri
     * @param array $action
     */
    public static function post(string $uri, array $action): void
    {
        self::addRouter("POST", $uri, $action);
    }

    /**
     * Adiciona uma rota ao array de rotas registradas
     * @param string $method
     * @param string $uri
     * @param array $action
     */
    private static function addRouter(
        string $method,
        string $uri,
        array $action,
    ): void {
        self::$routes[] = [
            "method" => $method,
            "uri" => $uri,
            "action" => $action,
        ];
    }

    /**
     * Verifica se a rota atual corresponde a uma rota registrada
     * @param string $routeUri
     * @param string $requestUri
     * @return bool|array Retorna false se não houver correspondência, ou um array associativo com os parâmetros da rota se houver correspondência
     */
    private static function matchRoute(
        string $routeUri,
        string $requestUri,
    ): bool|array {
        // Extrai os nomes dos parâmetros da rota
        $paramNames = [];

        // Encontra todos os parâmetros na rota usando regex
        preg_match_all("/\{([^}]+)\}/", $routeUri, $matches);
        $paramNames = $matches[1];

        // Substitui os parâmetros na rota por regex para capturar os valores correspondentes na URI da requisição
        $pattern = preg_replace("/\{([^}]+)\}/", "([^/]+)", $routeUri);
        $pattern = "#^$pattern$#";


        // Verifica se a URI da requisição corresponde ao padrão da rota
        if (preg_match($pattern, $requestUri, $matches)) {
            array_shift($matches); // remove match completo

            // Cria um array associativo com os nomes dos parâmetros e seus valores correspondentes
            $paramsAssoc = [];

            // Itera sobre os nomes dos parâmetros e seus valores correspondentes
            foreach ($paramNames as $index => $name) {
                $paramsAssoc[$name] = $matches[$index] ?? null;
            }

            // Retorna o array associativo com os parâmetros da rota
            return $paramsAssoc;
        }

        // Se a URI da requisição for exatamente igual à URI da rota, retorna um array vazio
        if ($routeUri === $requestUri) {
            return [];
        }

        // Se não houver correspondência, retorna false
        return false;
    }

    /**
     * Dispara a rota correspondente à requisição
     * @return void
     */
    public function dispatch(): void
    {
        try {
            // Cria uma instância da classe Request para obter informações sobre a requisição
            $request = new Request();
            $method = $request->getMethod();
            $uri = $request->getUri();

            // Obtém o caminho base da URL do aplicativo
            $basePath = parse_url($this->baseUrl, PHP_URL_PATH);

            // Se a URI da requisição começar com o caminho base, remove o caminho base da URI
            if ($basePath && strpos($uri, $basePath) === 0) {
                // Remove o caminho base da URL da requisição
                $uri = substr($uri, strlen($basePath));
            }

            //Remoção de Base da URL
            $uri = str_replace($this->baseUrl, "", $uri);

            // Itera sobre as rotas registradas para encontrar uma correspondência
            foreach (self::$routes as $route) {
                // Verifica se o método da requisição corresponde ao método da rota
                if ($route["method"] !== $method) {
                    continue;
                }

                // Verifica se a URI da requisição corresponde à URI da rota, considerando parâmetros
                $match = self::matchRoute($route["uri"], $uri);

                // Se houver correspondência, executa a ação associada à rota
                if ($match !== false) {

                    // Extrai o tipo, o controller e o método da ação da rota
                    [$type, $controller, $methodAction] = $route["action"];

                    // Monta o namespace completo do controller
                    $controllerNameSpace = "App\\Controllers\\{$type}\\{$controller}";

                    // Verifica se a classe do controller existe
                    if (!class_exists($controllerNameSpace)) {
                        throw new Exception(
                            "Controller $controllerNameSpace not found",
                        );
                    }

                    // Instancia o controller e chama o método correspondente, passando a requisição e os parâmetros da rota
                    $instance = new $controllerNameSpace();

                    // Executa o método passando os valores dos parâmetros
                    $response = $instance->$methodAction(
                        $request,
                        ...array_values($match),
                    );

                    //Se o controller devolover uma resposta, envia para o navegador
                    if ($response instanceof Response) {
                        $response->sendResponse();
                    }
                    return; // Interrompe o loop pois já encontrou a rota
                }
            }

            // Se não houver correspondência, retorna uma resposta 404
            $response = new Response("Página não encontrada", 404);
            $response->sendResponse();
        } catch (Exception $e) {
            // Em caso de erro, retorna uma resposta 500 com a mensagem de erro
            $response = new Response(
                "Erro interno do servidor: " . $e->getMessage(),
                500
            );
            $response->sendResponse();
        }
    }
}
