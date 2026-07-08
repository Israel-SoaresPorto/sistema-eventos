<?php

session_start();

if (!isset($_SESSION["eventos"])) {
    $_SESSION["eventos"] = [];
}

function addEvent(array $novoevento)
{
    $id = count($_SESSION["eventos"]) + 1;
    $novoevento["id"] = $id;
    $_SESSION["eventos"][] = $novoevento;
};

function getEvents(): array
{
    return $_SESSION["eventos"];
}
