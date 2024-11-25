import { ModalInput } from "../components/modal/modal.js";

const createEvents = () => {
    $('#open-create-modal').on('click', () => {
        const orderModalHandler = new ModalInput();
        orderModalHandler.modalAddHandler();
    })
}

export { createEvents }