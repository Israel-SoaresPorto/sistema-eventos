<?php include 'app/list_event.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Detalhes do Evento</title>
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>

<body>
    <!-- Header -->
    <?php include 'app/partials/header.php'; ?>

    <main>
        <h1>Detalhes do Evento</h1>
        
        <div style="background-color: var(--bg-primary); padding: var(--spacing-xl); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); max-width: 600px;">
            <div class="form-group">
                <label>Nome do Evento:</label>
                <p><strong><?php echo htmlspecialchars($evento['nome']); ?></strong></p>
            </div>
            
            <div class="form-group">
                <label>Data do Evento:</label>
                <p><?php echo htmlspecialchars($evento['data']); ?></p>
            </div>
            
            <div class="form-group">
                <label>Local:</label>
                <p><?php echo htmlspecialchars($evento['local']); ?></p>
            </div>
            
            <div class="form-group">
                <label>Descrição:</label>
                <p><?php echo htmlspecialchars($evento['descricao']); ?></p>
            </div>

            <div class="btn-group">
                <a href="editar_evento.php?id=<?php echo $eventoId; ?>" class="btn btn-primary">Editar Evento</a>
                <button id="delete-event-button" class="btn btn-danger" data-id="<?php echo $evento['id']; ?>">Excluir Evento</button>
                <a href="index.php" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </main>

    <!-- Modal de confirmação de exclusão -->
    <?php include 'app/partials/delete_dialog.php'; ?>

    <script src="public/assets/js/delete_dialog.js"></script>
</body>

</html>