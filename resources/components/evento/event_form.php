<form action="<?= isset($action) ? "app/$action" : '' ?>" method="post" enctype="multipart/form-data">
    <?php if (isset($action) && $action === 'update_event.php'): ?>
        <input type="hidden" name="id" value="<?= isset($evento) ? $evento['id'] : '' ?>">
    <?php endif; ?>

    <div class="form-group">
        <label for="nome">Nome do Evento:</label>
        <input type="text" id="nome" name="nome" value="<?= isset($evento) ? $evento['nome'] : '' ?>" required placeholder="Digite o nome do evento">
    </div>

    <div class="form-group">
        <label for="data">Data do Evento:</label>
        <input type="date" id="data" name="data" value="<?= isset($evento) ? $evento['data'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label for="local">Local do Evento:</label>
        <input type="text" id="local" name="local" value="<?= isset($evento) ? $evento['local'] : '' ?>" required placeholder="Digite o local do evento">
    </div>

    <div class="form-group">
        <label for="descricao">Descrição do Evento:</label>
        <textarea id="descricao" name="descricao" required placeholder="Digite uma descrição detalhada do evento"><?= isset($evento) ? $evento['descricao'] : '' ?></textarea>
    </div>

    <input type="submit" value="<?= isset($action) && $action === 'update_event.php' ? '✓ Atualizar Evento' : '✓ Criar Evento' ?>">
</form>