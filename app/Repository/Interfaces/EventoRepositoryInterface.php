<?php

namespace App\Repository\Interfaces;

use App\Model\Evento;
interface EventoRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?Evento;
    public function create(Evento $evento): bool;
    public function update(Evento $evento): bool;
    public function delete(int $id): bool;
}