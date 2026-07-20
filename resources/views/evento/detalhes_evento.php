<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Detalhes do Evento</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>

<body>
    <!-- Header -->
    <?php include BASE_DIR . '/resources/components/evento/header.php'; ?>

    <main>
        <?php if (empty($evento)) : ?>
            <p>Evento não encontrado.</p>
            <a href="<?= URL_BASE ?>/eventos" class="btn btn-primary">← Voltar para Eventos</a>
        <?php else : ?>
            <h1>Detalhes do Evento</h1>

            <div style="background-color: var(--bg-primary); padding: var(--spacing-xl); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); max-width: 600px;">
                <div class="form-group">
                    <label>Nome do Evento:</label>
                    <p><strong><?php echo htmlspecialchars($evento->getNome()); ?></strong></p>
                </div>

                <div class="form-group">
                    <label>Data do Evento:</label>
                    <p><?php echo htmlspecialchars($evento->getData()); ?></p>
                </div>

                <div class="form-group">
                    <label>Local:</label>
                    <p><?php echo htmlspecialchars($evento->getLocal()); ?></p>
                </div>

                <div class="form-group">
                    <label>Descrição:</label>
                    <p><?php echo htmlspecialchars($evento->getDescricao()); ?></p>
                </div>

                <div class="btn-group">
                    <a href="<?= URL_BASE ?>/eventos/<?= $evento->getId() ?>/editar" class="btn btn-primary">Editar Evento</a>
                    <button id="delete-event-button" class="btn btn-danger" data-id="<?= $evento->getId() ?>">Excluir Evento</button>
                    <a href="<?= URL_BASE ?>/eventos" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <!-- Modal de confirmação de exclusão -->
    <?php include BASE_DIR . '/resources/components/evento/delete_dialog.php'; ?>

    <script src="../public/assets/js/delete_dialog.js"></script>
</body>

</html>