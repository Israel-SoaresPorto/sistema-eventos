<?php

require_once 'config.php';

$eventoId = $_POST['id'] ?? 0;

if ($eventoId) {
    $evento = getEventById($eventoId);

    if ($evento) {
        deleteEvent($eventoId);
        header('Location: ../sucesso.php?evento=excluido');
        exit;
    }
}