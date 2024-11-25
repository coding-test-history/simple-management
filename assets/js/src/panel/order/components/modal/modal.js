import { formInput } from "../form/form.js";
import { getDataById } from "../../process/read.js";

class ModalInput {
    constructor() {
        this.formManager = formInput;
        this.titleModal = $("#title-order");
        this.buttonSubmit = $("#submit-button-order")
    }

    modalAddHandler() {
        this.formManager.setMethod("POST");
        this.formManager.setAction("/api/ordder/store");
        this.formManager.emptyForm();
        this.titleModal.text("Add New Order");
        this.buttonSubmit.text("Simpan")
    }

    async modalEditHandler(id) {
        this.formManager.setMethod("PUT");
        this.formManager.setAction(
            `/api/ordder/update/${id}`
        );
        const dataOrder = await getDataById(id);
        this.formManager.fillForm(dataOrder);
        this.titleModal.text("Edit Order");
        this.buttonSubmit.text("Update Order")
        $('#modal-order').modal('show');
    }
}

export { ModalInput }