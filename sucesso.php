<?php

$eventoStatus = $_GET['evento'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Evento <?= ucfirst($eventoStatus) ?></title>
</head>

<body>
    <h1>Evento <?= ucfirst($eventoStatus) ?> com Sucesso!</h1>
    <p>O evento foi <?= $eventoStatus ?> com sucesso.</p>
    <a href="index.php">Ver eventos</a>
</body>

</html>