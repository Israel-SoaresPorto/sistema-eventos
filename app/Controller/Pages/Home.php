<?php

namespace App\Controller\Pages;

use \Core\View;

class Home
{
    /**
     * Método que renderiza a página inicial
     * @return string Conteúdo da página inicial renderizada
     */
    public function index()
    {
        // Renderiza a view da página inicial com os eventos
        return View::render('home', [
            'message' => 'Bem-vindo ao Sistema de Eventos!',
        ]);
    }
}
