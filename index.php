<?php

include 'app/config.php';

$eventos = getEvents();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Lista de Eventos</title>
</head>

<body>
    <!-- Header -->
    <?php include 'app/partials/header.php'; ?>

    <main>
        <h1>Lista de Eventos</h1>
        <div>
            <!-- Tabela de eventos -->
            <?php include 'app/partials/event_table.php'; ?>
        </div>

        <!-- Modal de confirmação de exclusão -->
        <?php include 'app/partials/delete_dialog.php'; ?>
    </main>
</body>

</html>