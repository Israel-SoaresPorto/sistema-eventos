<?php

namespace App\Controllers\Pages;

use Core\View;
use Core\Http\Request;
use Core\Http\Response;

class HomeController
{
    /**
     * Método que renderiza a página inicial
     * @param Request $request // Parâmetro de requisição HTTP
     * @return Response // Retorna uma resposta HTTP
     */
    public function index(Request $request): Response
    {
        // Renderiza a view da página inicial com os eventos
        $content = View::render('home', [
            'message' => 'Bem-vindo ao Sistema de Eventos!',
        ]);

        return new Response($content, 200);
    }
}
