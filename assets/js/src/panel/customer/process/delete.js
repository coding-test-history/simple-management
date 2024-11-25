import { renderCustomerData } from './read.js';

/**
 * Delete data 
 */

const deleteDataDataObat = async (customerId) => {
    try {
        // Request endpoint data
        const response = await sendApiRequest({
            url: `/api/customer/delete/${customerId}`,
            type: 'DELETE',
        }, true);
        if (response.status) {
            swalSuccess(response.message, renderCustomerData)
        }      
    } 
    catch (error) {
        swalError(error)
    }
}

const deleteEvents = () => {
    // Assuming 'tableContainer' is the ID of the parent container of your DataTable
    const tableContainer = $('#table-customer');

    tableContainer.on('click', '.delete-data-button', function(event) {
        const target = $(this);

        // Check if the clicked element is a delete button inside the DataTable
        const customerId = target.data('id');
        const nama = target.data('nama');
        const deleteMessage = msgConfirmDelete(nama);
        swalConfirmDelete(deleteMessage, () => {
            deleteDataDataObat(customerId);
        })
    });
}

export { deleteDataDataObat, deleteEvents }