<?php if (empty($eventos)) { ?>
    <div class="alert alert-info">
        <p>Nenhum evento cadastrado. <a href="<?= URL_BASE ?>/eventos/criar">Criar primeiro evento</a></p>
    </div>
<?php } else { ?>
    <div style="overflow-x: auto;">
        <table>
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
                        <td>#<?php echo htmlspecialchars($event->getId()); ?></td>
                        <td><strong><?php echo htmlspecialchars($event->getNome()); ?></strong></td>
                        <td><?php echo htmlspecialchars($event->getData()); ?></td>
                        <td><?php echo htmlspecialchars($event->getLocal()); ?></td>
                        <td>
                            <a href="<?= URL_BASE ?>/evento/<?= $event->getId() ?>" class="btn btn-primary" style="font-size: 0.875rem; padding: 0.5rem 0.75rem;">Detalhes</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>