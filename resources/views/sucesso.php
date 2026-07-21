<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Evento <?= ucfirst($action) ?></title>
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>

<body>
    <!-- Header -->
    <?php include BASE_DIR . '/resources/components/evento/header.php'; ?>

    <main>
        <div class="alert alert-success">
            <?php if (empty($action) || empty($message)) : ?>
                <p>Houve um erro ao processar a ação. Por favor, tente novamente.</p>
                <a href="<?= URL_BASE ?>/eventos" class="btn btn-primary mt-md">← Voltar para Eventos</a>
            <?php else : ?>
                <h1>Evento <?= ucfirst($action) ?> com Sucesso!</h1>
                <p>O <?= $message ?></p>
                <a href="<?= URL_BASE ?>/eventos" class="btn btn-primary mt-md">← Voltar para Eventos</a>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>