<?php

namespace Core;

class View
{
    /**
     * Método que retorna o caminho da view
     * @param string $view Nome da view
     * @throws \Exception Lança uma exceção se a view não for encontrada
     * @return string | bool Caminho da view ou false se não for encontrada
     */
    private static function getViewPath(string $view): string | bool
    {
        $file = __DIR__ . '/../resources/views/' . $view . '.php';

        if (!file_exists($file)) {
            throw new \Exception("View not found: $view");
        }

        return $file;
    }


    /**
     * Método que renderiza a view
     * @param string $view Nome da view
     * @param array $data Dados a serem passados para a view
     * @throws \Exception Lança uma exceção se a view não for encontrada
     * @return string | bool Conteúdo da view renderizada ou false se não for encontrada
     */
    public static function render(string $view, array $data = []): string | bool
    {
        // Obtém o conteúdo da view
        $content = self::getViewPath($view);

        // Verifica se o conteúdo da view foi carregado corretamente
        if ($content === false) {
            throw new \Exception("Failed to load view: $view");
        }

        // Extrai as variáveis do array de dados para o escopo da view
        extract($data);

        // Inicia o buffer de saída, inclui o conteúdo da view e retorna o conteúdo do buffer
        ob_start();
        include $content;
        return ob_get_clean();
    }
}
