<?php 

include 'app/list_event.php'; 

$action = 'update_event.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Editar Evento</title>
</head>

<body>
    <?php include 'app/partials/header.php'; ?>

    <main>
        <h1>Editar Evento</h1>

        <!-- Formulário de evento -->
        <?php include 'app/partials/event_form.php'; ?>
    </main>
</body>

</html>