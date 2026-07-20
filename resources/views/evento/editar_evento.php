<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Editar Evento</title>
    <link rel="stylesheet" href="../../public/assets/css/style.css">
</head>

<body>
    <?php include BASE_DIR . '/resources/components/evento/header.php'; ?>

    <main>
        <h1>Editar Evento</h1>

        <?php if (empty($evento)) : ?>
            <p>Evento não encontrado.</p>
            <a href="<?= URL_BASE ?>/eventos" class="btn btn-primary">← Voltar para Eventos</a> 
        <?php endif; ?>

        <!-- Formulário de evento -->
        <?php include BASE_DIR . '/resources/components/evento/event_form.php'; ?>
        
        <a href="<?= URL_BASE . "/eventos/" . $evento->getId() ?>" class="btn btn-secondary" style="margin-top: var(--spacing-lg);">← Voltar</a>
    </main>
</body>

</html>