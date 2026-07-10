<?php

require_once 'app/config.php';

$eventoId = $_GET['id'] ?? null;

if ($eventoId === null) {
    echo "ID do evento não fornecido.";
    exit;
}

$evento = getEventById($eventoId);

if (!$evento) {
    echo "Evento não encontrado.";
    exit;
}

?>