<?php include 'app/list_event.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Detalhes do Evento</title>
</head>

<body>
    <h1>Detalhes do Evento</h1>
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($evento['nome']); ?></p>
    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($evento['descricao']); ?></p>
    <p><strong>Data:</strong> <?php echo htmlspecialchars($evento['data']); ?></p>
    <p><strong>Local:</strong> <?php echo htmlspecialchars($evento['local']); ?></p>
    <div>
        <a hidden href="editar_evento.php?id=<?php echo $eventoId; ?>">Editar Evento</a>
        <a hidden href="excluir_evento.php?id=<?php echo $eventoId; ?>">Excluir Evento</a>
    </div>
</body>

</html>