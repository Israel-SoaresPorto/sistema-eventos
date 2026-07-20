<?php

namespace App\Repository;

use App\Model\Evento;
use App\Repository\Interfaces\EventoRepositoryInterface;

class EventoRepository implements EventoRepositoryInterface
{

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['eventos'])) {
            $_SESSION['eventos'] = [];
            $_SESSION['eventos_id_counter'] = 1;
        }
    }

    public function getAll(): array
    {
        return array_values($_SESSION['eventos']);
    }

    public function getById(int $id): ?Evento
    {
        foreach ($_SESSION['eventos'] as $evento) {
            if ($evento->getId() === $id) {
                return $evento;
            }
        }
        return null;
    }

    public function create(Evento $evento): bool
    {
        $_SESSION['eventos'][] = $evento;
        return true;
    }

    public function update(Evento $evento): bool
    {
        foreach ($_SESSION['eventos'] as $index => $e) {
            if ($e->getId() === $evento->getId()) {
                $_SESSION['eventos'][$index] = $evento;
                return true;
            }
        }

        return false;
    }

    public function delete(int $id): bool
    {
        
        $_SESSION['eventos'] = array_filter($_SESSION['eventos'], function ($e) use ($id) {
            return $e->getId() !== $id;
        });

        return true;
    }
}
