import { renderOrderData } from "./read.js"

const deleteDataRole = async (id) => {
    try {
        // Request endpoint data role
        const response = await sendApiRequest({
            url: `/api/order/delete/${id}`,
            type: 'DELETE',
        }, true);
        if (response.status) {
            swalSuccess(response.message, renderOrderData)
        }      
    } 
    catch (error) {
        swalError(error)
    }
}

const deleteEvent = () => {
    // Assuming 'tableContainer' is the ID of the parent container of your DataTable
    const tableContainer = $('#table-order');

    tableContainer.on('click', '.delete-data-button', function (event) {
        const target = $(this);

        // Check if the clicked element is a delete button inside the DataTable
        const id = target.data('id');
        const nama = target.data('nama');
        const deleteMessage = msgConfirmDelete(nama);
        swalConfirmDelete(deleteMessage, () => {
            deleteDataRole(id);
        })
    });
}

export { deleteEvent }