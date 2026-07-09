<?php

require_once 'config.php';

$eventoId = $_POST['id'] ?? 0;

if ($eventoId) {
    $evento = getEventById($eventoId);

    if ($evento) {
        $nome = $_POST['nome'] ?? $evento['nome'];
        $data = $_POST['data'] ?? $evento['data'];
        $local = $_POST['local'] ?? $evento['local'];
        $descricao = $_POST['descricao'] ?? $evento['descricao'];

        $novoevento = [
            'nome' => $nome,
            'data' => $data,
            'local' => $local,
            'descricao' => $descricao
        ];

        updateEvent($eventoId, $novoevento);
    }

    header('Location: ../sucesso.php?evento=atualizado');
    exit;
}
