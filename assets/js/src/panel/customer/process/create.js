import { ModalInput } from '../components/modal/modal.js';

/** 
 * create master obat
 */

const createEvents = () => {
    $('#open-create-modal').on('click', () => {
        const customerModalHandler = new ModalInput();
        customerModalHandler.modalAddHandler();
    })
}

export { createEvents }