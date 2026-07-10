<form action="<?= isset($action) ? "app/$action" : '' ?>" method="post" enctype="multipart/form-data">
    <?php if (isset($action) && $action === 'update_event.php'): ?>
        <input type="hidden" name="id" value="<?= isset($evento) ? $evento['id'] : '' ?>">
    <?php endif; ?>

    <label for="nome">Nome do Evento:</label>
    <input type="text" id="nome" name="nome" value="<?= isset($evento) ? $evento['nome'] : '' ?>" required><br><br>

    <label for="data">Data do Evento:</label>
    <input type="date" id="data" name="data" value="<?= isset($evento) ? $evento['data'] : '' ?>" required><br><br>

    <label for="local">Local do Evento:</label>
    <input type="text" id="local" name="local" value="<?= isset($evento) ? $evento['local'] : '' ?>" required><br><br>

    <label for="descricao">Descrição do Evento:</label>
    <textarea id="descricao" name="descricao" required><?= isset($evento) ? $evento['descricao'] : '' ?></textarea><br><br>

    <input type="submit" value="<?= isset($action) && $action === 'update_event.php' ? 'Atualizar Evento' : 'Criar Evento' ?>">
</form>