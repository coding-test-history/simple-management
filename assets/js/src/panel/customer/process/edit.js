import { ModalInput } from "../components/modal/modal.js";

const editEvents = ()  => {
    $(document).ready(function () {
        const customerModalHandler = new ModalInput();
        // Event listener for the "Edit" button in the DataTable
        $('#table-customer').on('click', '.edit-data-button', function () {
            const customerId = $(this).data('id');
            // Call the modal edit handler function with customerId and nama as parameters
            customerModalHandler.modalEditHandler(customerId);
        });
    });    
}

export {editEvents}