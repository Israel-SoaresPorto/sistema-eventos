<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos | Criar Evento</title>
</head>

<body>
    <h1>Criar Evento</h1>
    <form action="app/create_event.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome do Evento:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="data">Data do Evento:</label>
        <input type="date" id="data" name="data" required><br><br>

        <label for="local">Local do Evento:</label>
        <input type="text" id="local" name="local" required><br><br>

        <label for="descricao">Descrição do Evento:</label>
        <textarea id="descricao" name="descricao" required></textarea><br><br>

        <input type="submit" value="Criar Evento">
    </form>
</body>

</html>