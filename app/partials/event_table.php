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
                        <a href="detalhes_evento.php?id=<?php echo $event['id']; ?>">Detalhes</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>