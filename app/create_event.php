<?php

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $data = $_POST["data"];
    $local = $_POST["local"];
    $descricao = $_POST["descricao"];

    $evento = [
        "nome" => $nome,
        "data" => $data,
        "local" => $local,
        "descricao" => $descricao
    ];

    addEvent($evento);

    header("Location: ../evento_criado.php");
    exit;
}