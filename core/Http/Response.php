<?php

namespace Core\Http;

class Response
{
    /**
     * Código de status HTTP da resposta
     * @var int
     */
    private int $statusCode;

    /**
     * Cabeçalhos da resposta
     * @var array
     */
    private array $headers;

    /**
     * Tipo de conteúdo da resposta
     * @var string
     */
    private string $contentType;

    /**
     * Corpo da resposta
     * @var string
     */
    private string $body;

    public function __construct(string $content, int $statusCode = 200, string $contentType = 'text/html')
    {
        $this->statusCode = $statusCode;
        $this->headers = getallheaders();
        $this->contentType = $contentType;
        $this->body = $content;
    }

    /**
     * Define o código de status HTTP da resposta
     * @param int $code
     */
    public function setStatusCode(int $code) : void
    {
        $this->statusCode = $code;
    }

    /**
     * Define um cabeçalho da resposta
     * @param string $name
     * @param string $value
     */
    public function setHeader(string $name, string $value) : void
    {
        $this->headers[$name] = $value;
    }

    /**
     * Define o tipo de conteúdo da resposta
     * @param string $type
     */
    public function setContentType(string $type) : void
    {
        $this->contentType = $type;
        $this->setHeader('Content-Type', $type);
    }

    /**
     * Envia os cabeçalhos da resposta
     */
    public function sendHeaders() : void
    {
        http_response_code($this->statusCode);
        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }
    }

    /**
     * Define o corpo da resposta
     * @param string $content
     */
    public function setBody(string $content)
    {
        $this->body = $content;
    }

    /**
     * Envia a resposta HTTP
     */
    public function sendResponse(): void
    {
        $this->sendHeaders();

        switch ($this->contentType) {
            case 'application/json':
                echo json_encode($this->body);
                break;
            case 'text/html':
            default:
                echo $this->body;
                break;
        }
    }
}
