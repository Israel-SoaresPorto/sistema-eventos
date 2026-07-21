<?php

namespace Core\Http;

class Request
{
    /**
     * Método HTTP da requisição (GET, POST, PUT, DELETE, etc.)
     * @var string
     */
    private string $httpMethod;

    /**
     * URI da requisição
     * @var string
     */
    private string $uri;

    /**
     * Parâmetros de consulta (query parameters) da requisição
     * @var array
     */
    private array $queryParams;

    /**
     * Parâmetros do corpo da requisição (body parameters)
     * @var array
     */
    private array $bodyParams;

    /**
     * Cabeçalhos da requisição
     * @var array
     */
    private array $headers;

    public function __construct()
    {
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '/';
        $this->queryParams = $_GET ?? [];
        $this->bodyParams = $_POST ?? [];
        $this->headers = getallheaders() ?? [];
    }

    /**
     * Retorna o método HTTP da requisição
     * @return string
     */
    public function getUri() : string
    {
        return $this->uri;
    }


    /**
     * Retorna o método HTTP da requisição
     * @return string
     */
    public function getMethod() : string
    {
        return $this->httpMethod;
    }

    /**
     * Retorna o array de parâmetros de consulta (query parameters) da requisição
     * @return array
     */
    public function getQueryParams() : array
    {
        return $this->queryParams;
    }

    /**
     * Retorna o array de parâmetros do corpo da requisição (body parameters)
     * @return array
     */
    public function getBodyParams() : array
    {
        return $this->bodyParams;
    }


    /**
     * Retorna o array de cabeçalhos da requisição
     * @return array
     */
    public function getHeaders() : array
    {
        return $this->headers;
    }
}