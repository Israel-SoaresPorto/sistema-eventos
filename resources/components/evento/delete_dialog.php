<dialog id="confirm-delete-dialog">
    <div>
        <h2>Confirmar Exclusão</h2>
        <p>Tem certeza que deseja excluir este evento? Esta ação não pode ser desfeita.</p>
        <form id="delete-form" method="post" action="<?= URL_BASE . '/eventos/deletar' ?>">
            <input type="hidden" name="id" id="delete-event-id">
            <button type="submit" class="btn btn-danger">Excluir</button>
            <button type="button" id="cancel-button" class="btn btn-secondary">Cancelar</button>
        </form>
    </div>
</dialog>