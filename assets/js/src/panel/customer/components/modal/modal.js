import { formInput } from "../form/form.js";
import { getDataById } from "../../process/read.js";

/**
 * differentiator Modal Add and Edit
 */
class ModalInput {
    constructor() {
        this.formManager = formInput;
        this.titleModal = $("#title-customer");
        this.buttonSubmit = $("#submit-button-customer");
    }

    modalAddHandler() {
        this.formManager.setMethod("POST");
        this.formManager.setAction("/api/customer/store");
        this.formManager.emptyForm();
        this.titleModal.text("Add New Customer");
        this.formManager.setValidatorAdd();
        this.buttonSubmit.text("Save");
    }

    async modalEditHandler(customerId) {
        this.formManager.setMethod("PUT");
        this.formManager.setAction(`/api/customer/update/${customerId}`);
        const customerData = await getDataById(customerId);
        this.formManager.fillForm(customerData);
        this.titleModal.text("Edit Customer");
        this.formManager.setValidatorEdit();
        this.buttonSubmit.text("Update");
        $("#modal-customer").modal("show");
    }
}

export { ModalInput };
