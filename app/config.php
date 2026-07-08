<?php

session_start();

if (!isset($_SESSION["eventos"])) {
    $_SESSION["eventos"] = [];
}

function addEvent(array $novoevento)
{
    $id = count($_SESSION["eventos"]);

    $novoevento["id"] = ++$id;

    $_SESSION["eventos"][] = $novoevento;
    echo "Evento adicionado com sucesso!";
};

function getEvents(): array
{
    return $_SESSION["eventos"];
}
