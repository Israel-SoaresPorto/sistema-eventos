<?php

namespace App\Controllers\Pages;

use App\Model\Evento;
use App\Repository\EventoRepository;
use Core\Http\Request;
use Core\Http\Response;
use Core\View;

class EventoController
{
    private EventoRepository $eventoRepository;

    public function __construct()
    {
        $this->eventoRepository = new EventoRepository();
    }

    public function index(Request $request) : Response
    {
        $eventos = $this->eventoRepository->getAll();
        
        $content = View::render('evento/index', ['eventos' => $eventos]);

        return new Response($content);
    }

    public function getEvent(Request $request, int $id) : Response
    {
        $evento = $this->eventoRepository->getById((int) $id);

        if (!$evento) {
            return new Response("Evento não encontrado.", 404);
        }

        $content = View::render('evento/detalhes_evento', ['evento' => $evento]);

        return new Response($content);
    }

    public function create(Request $request): Response
    {
        return new Response(View::render('evento/criar_evento', [
            'action' => 'eventos',
        ]));
    }

    public function store(Request $request): void
    {
        $dados = $request->getBodyParams();

        $id = $_SESSION['eventos_id_counter']++;
        $evento = new Evento($id, $dados['nome'], $dados['descricao'], $dados['data'], $dados['local']);

        
        if ($this->eventoRepository->create($evento)) {
            $response = new Response('', 302, 'text/html');
            $response->redirect(URL_BASE . '/sucesso?evento=criado');
        } else {
            echo "Erro ao criar o evento.";
        }
    }

    public function edit(Request $request, int $id) : Response
    {
        $evento = $this->eventoRepository->getById($id);

        if (!$evento) {
            return new Response("Evento não encontrado.", 404);
        }

        $content = View::render('evento/editar_evento', [
            'evento' => $evento,
            'action' => "eventos/{$id}/atualizar"
        ]);

        return new Response($content);
    }

    public function update(Request $request, int $id) : void
    {
        $evento = $this->eventoRepository->getById($id);

        if (!$evento) {
            echo "Evento não encontrado.";
            return;
        }

        $dados = $request->getBodyParams();

        $eventoEditado = new Evento($evento->getId(), $dados['nome'], $dados['descricao'], $dados['data'], $dados['local']);

        if ($this->eventoRepository->update($eventoEditado)) {
            $response = new Response('', 302, 'text/html');
            $response->redirect(URL_BASE . '/sucesso?evento=atualizado');
        } else {
            echo "Erro ao atualizar o evento.";
        }
    }

    public function delete(Request $request) : void
    {
        $id = $request->getBodyParams()['id'] ?? null;

        if ($this->eventoRepository->delete($id)) {
            $response = new Response('', 302, 'text/html');
            $response->redirect(URL_BASE . '/sucesso?evento=deletado');
        } else {
            echo "Erro ao deletar o evento.";
        }
    }

    public function sucesso(Request $request): Response
    {
        $evento = $request->getQueryParams()['evento'] ?? null;

        $eventoAcao = $evento === null ? 'Ação Não Especificada' : ucfirst($evento);

        $content = View::render('sucesso', [
            'action' => $eventoAcao,
            'message' => "$eventoAcao criado com sucesso!",
        ]);

        return new Response($content, 200);
    }
}