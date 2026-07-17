<?php

$eventoStatus = $_GET['evento'] ?? '';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Evento <?= ucfirst($eventoStatus) ?></title>
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>

<body>
    <!-- Header -->
    <?php include 'app/partials/header.php'; ?>
    
    <main>
        <div class="alert alert-success">
            <h1>Evento <?= ucfirst($eventoStatus) ?> com Sucesso!</h1>
            <p>O evento foi <?= $eventoStatus ?> com sucesso.</p>
            <a href="index.php" class="btn btn-primary" style="margin-top: var(--spacing-md);">← Voltar para Eventos</a>
        </div>
    </main>
</body>

</html>