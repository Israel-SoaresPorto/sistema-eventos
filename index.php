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
    <header>
        <h1>Lista de Eventos</h1>
        <nav>
            <a href="criar_evento.php">Criar Evento</a>
        </nav>
    </header>
    <main>
        <div>
            <?php if (empty($eventos)) { ?>
                <p>Nenhum evento cadastrado.</p>
            <?php } else { ?>
                <table border="1" cellpadding="6" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Data</th>
                            <th>Local</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($eventos as $event) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($event['id'] ?? '—'); ?></td>
                                <td><?php echo htmlspecialchars($event['nome'] ?? '—'); ?></td>
                                <td><?php echo htmlspecialchars($event['data'] ?? '—'); ?></td>
                                <td><?php echo htmlspecialchars($event['local'] ?? '—'); ?></td>
                                <td>
                            </tr>        
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </main>
</body>

</html>