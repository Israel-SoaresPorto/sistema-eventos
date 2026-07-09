<?php

include 'app/config.php';

$evento = getEventById($_GET['id'] ?? 0);

if (!$evento) {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Editar Evento</title>
</head>
<body>
    <h1>Editar Evento</h1>
    <form action="app/update_event.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $evento['id'] ?>">
        <label for="nome">Nome do Evento:</label>
        <input type="text" id="nome" name="nome" value="<?= $evento['nome'] ?>" required><br><br>

        <label for="data">Data do Evento:</label>
        <input type="date" id="data" name="data" value="<?= $evento['data'] ?>" required><br><br>

        <label for="local">Local do Evento:</label>
        <input type="text" id="local" name="local" value="<?= $evento['local'] ?>" required><br><br>

        <label for="descricao">Descrição do Evento:</label>
        <textarea id="descricao" name="descricao" required><?= $evento['descricao'] ?></textarea><br><br>

        <input type="submit" value="Atualizar Evento">
    </form>
</body>
</html>