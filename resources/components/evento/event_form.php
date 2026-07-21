<?php if (empty($action)) : ?>
    <p>Houve um erro ao processar o formulário. Por favor, tente novamente.</p>
    <a href="<?= URL_BASE ?>/eventos" class="btn btn-primary">← Voltar para Eventos</a>
<?php else : ?>
    <form action="<?= URL_BASE ?>/<?= $action ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome do Evento:</label>
            <input type="text" id="nome" name="nome" value="<?= isset($evento) ? $evento->getNome() : '' ?>" required placeholder="Digite o nome do evento">
        </div>

        <div class="form-group">
            <label for="data">Data do Evento:</label>
            <input type="date" id="data" name="data" value="<?= isset($evento) ? $evento->getData() : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="local">Local do Evento:</label>
            <input type="text" id="local" name="local" value="<?= isset($evento) ? $evento->getLocal() : '' ?>" required placeholder="Digite o local do evento">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição do Evento:</label>
            <textarea id="descricao" name="descricao" required placeholder="Digite uma descrição detalhada do evento"><?= isset($evento) ? $evento->getDescricao() : '' ?></textarea>
        </div>

        <input type="submit" value="<?= isset($action) && str_contains($action, 'atualizar') ? 'Atualizar Evento' : 'Criar Evento' ?>">
    </form>
<?php endif; ?>