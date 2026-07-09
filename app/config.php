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

function getEventById(int $id): ?array
{
    $evento = array_filter($_SESSION["eventos"], function ($evento) use ($id) {
        return $evento["id"] === $id;
    });

    return $evento ? array_values($evento)[0] : null;
}

function updateEvent(int $id, array $novoevento)
{
    foreach ($_SESSION["eventos"] as &$evento) {
        if ($evento["id"] === $id) {
            $evento = array_merge($evento, $novoevento);
            return true;
        }
    }
    return false;
}
