import { ModalInput } from "../components/modal/modal.js";

const editEvents = ()  => {
    $(document).ready(function () {
        const orderModalHandler = new ModalInput();
        // Event listener for the "Edit" button in the DataTable
        $('#table-order').on('click', '.edit-data-button', function () {
            const id = $(this).data('id');
            orderModalHandler.modalEditHandler(id);
        });
    });    
}

export {editEvents}