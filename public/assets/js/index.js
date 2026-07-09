const deleteButtons = document.querySelectorAll('#delete-event-button');
const deleteForm = document.getElementById('delete-form');
const deleteEventIdInput = document.getElementById('delete-event-id');
const cancelButton = document.getElementById('cancel-button');
const dialog = document.getElementById('confirm-delete-dialog');

deleteButtons.forEach(button => {
    button.addEventListener('click', () => {
        const eventId = button.getAttribute('data-id');
        deleteEventIdInput.value = eventId;
        dialog.showModal();
    });
});

cancelButton.addEventListener('click', () => {
    dialog.close();
});