<dialog id="confirm-delete-dialog">
    <div>
        <p>Tem certeza que deseja excluir este evento?</p>
        <form id="delete-form" method="post" action="app/delete_event.php">
            <input type="hidden" name="id" id="delete-event-id">
            <button type="submit">Sim</button>
            <button type="button" id="cancel-button">Não</button>
        </form>
    </div>
</dialog>