<?php

namespace App\Model;

class Evento
{
    private int $id;
    private string $nome;
    private string $descricao;
    private string $data;
    private string $local;

    public function __construct(int $id, string $nome, string $descricao, string $data, string $local)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->data = $data;
        $this->local = $local;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getLocal(): string
    {
        return $this->local;
    }
}