import { renderCustomerData } from "../../process/read.js";
import { FormManager } from "../../../../../helpers/FormManager.js";
import { customerValidator } from "./validator.js";

class FormInput extends FormManager {
    constructor(formElement, modal, submitButton) {
        super(formElement, modal, submitButton);
        
        this.maskConfig = {
            "alias": "numeric",
            "groupSeparator": ".",
            "autoGroup": true,
            "digits": 0,
            "digitsOptional": false,
            "placeholder": "0",
            "rightAlign": false,
            "autoUnmask" : true
        };
        this.validatorUsed = [];
        this.initForm();
    }

    getPostData = () => {
        const formData = this.getFormData();
        return formData;
    }

    getPutData = () => {
        const formData = new URLSearchParams(this.getPostData()).toString();
        return formData;
    }

    handleSuccessResponse = async (response) => {
        swalSuccess(response.message, async () => {
            this.modal.modal("hide");
            this.emptyForm();
            await renderCustomerData();
        });
    };

    setValidatorAdd = async () => {
        this.validatorUsed = [customerValidator];
    }

    setValidatorEdit = async () => {
        this.validatorUsed = [customerValidator];
    }

    emptyForm = () => {
        this.form.trigger("reset");
    }

    fillForm(data) {
        this.emptyForm();
        const excludeFields = [];
        // Loop through the response data and populate the form fields
        $.each(data, (key, value) => {
            // Find input elements with matching name attributes
            const inputElement = $(`[name="${key}"]`);
            
            // Check if the field is not in the excludeFields array
            if (!excludeFields.includes(key)) {
    
                // Check if the input element exists and set its value
                if (inputElement.length) {
                    inputElement.val(value);
                }
            }
        });
    }

    validateForm = async () => {
        const statuses = await Promise.all(this.validatorUsed.map(validator => validator.validate()));
    
        const isValid = statuses.every(status => status === 'Valid');
        if (isValid) {
            return true;
        }
    
        const handleInvalidFields = async (validator) => {
            const formElements = validator.elements;
            for (const fieldName in formElements) {
                const field = formElements[fieldName];
                const result = await validator.validateField(fieldName);
                if (result === 'Invalid') {
                    const errorMessages = validator.getMessages(field);
                }
            }
        };
        return false;
    };

    initForm = async () => {;        
        this.submitButton.off('click').on('click', () => {
            // Call the form's submit method
            if (this.validatorUsed) {
                this.validateForm().then(isValid => {
                    if (isValid) {
                        this.form.submit();
                    } 
                });
            }
        });

        this.form.off("submit").on("submit", (e) => {
            e.preventDefault();
            this.submitForm();
        });
    }
}

const formInput = new FormInput($("#form-customer"), $("#modal-customer"), $("#submit-button-customer"));
export { formInput };