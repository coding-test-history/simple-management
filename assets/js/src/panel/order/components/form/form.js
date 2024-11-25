import { getOrderData, renderOrderData } from "../../process/read.js";
import { optionFormat, iconOptions, parentMenuOptions } from "../select2/select2-template.js";
import { FormManager } from "../../../../../helpers/FormManager.js";
import defaultValidator from "./validator.js";

class FormInput extends FormManager{
    constructor(form, modal, submitButton) {
        super(form, modal, submitButton);

        this.initForm();
    }

    getFormData() {
        const formData = new FormData(this.form[0]);

        // Get all checkboxes in the form
        const checkboxes = this.form.find('input[type="checkbox"]');

        // Loop through checkboxes and set their values to 1 if checked, 0 if not checked
        checkboxes.each(function () {
            const checkboxName = $(this).attr('name');
            const checkboxValue = $(this).is(':checked') ? 'yes' : 'no';
            formData.set(checkboxName, checkboxValue);
        });

        return formData;
    }


    getPostData = () => {
        const formData = this.getFormData();
        const checkboxes = this.form.find('input[type="checkbox"]');
        
        // Loop through checkboxes and set their values to 1 if checked, 0 if not checked
        checkboxes.each(function() {
            const checkboxName = $(this).attr('name');
            const checkboxValue = $(this).is(':checked') ? 'yes' : 'no';
            formData.set(checkboxName, checkboxValue);
        });

        return formData;
    }

    handleSuccessResponse = async (response) => {
        swalSuccess(response.message, async () => {
            await renderOrderData();
            this.modal.modal("hide");
            this.emptyForm();
        });
    };

    fillForm(data) {
        data = data || {};
        this.emptyForm();

        // Array of field names to exclude from rendering
        const excludeFields = [];
        const selectFields = [];
        const checkboxFields = [];

        // Loop through the response data and populate the form fields
        $.each(data, function (key, value) {
            // Check if the field is not in the excludeFields array
            if (!excludeFields.includes(key)) {
                // Find input elements with matching name attributes
                const inputElement = $(`[name="${key}"]`);

                // Check if the input element exists and set its value
                if (inputElement.length) {
                    inputElement.val(value);
                }
            }
            if (selectFields.includes(key)) {
                const selectElement = $(`[name="${key}"]`);
                selectElement.trigger("change");
            }
            if (checkboxFields.includes(key)) {
                const checkboxElement = $(`[name="${key}"]`);
                checkboxElement.prop("checked", value == 1);
            }
        });
    }


    async initSelect2() {
        const iconSelect = $("#icon");
        const parentSelect = $("#parent");

        iconSelect.empty()
        parentSelect.empty()

        iconSelect.append(iconOptions);
        iconSelect.select2({
            allowClear: true,
            minimumResultsForSearch: 5,
            templateSelection: optionFormat,
            templateResult: optionFormat
        });

        const parentData = await getOrderData();
        parentSelect.append(parentMenuOptions(parentData));
        parentSelect.select2({
            allowClear: true,
            minimumResultsForSearch: 5,
            templateSelection: optionFormat,
            templateResult: optionFormat
        });
    }

    emptyForm = () => {
        defaultValidator.resetForm(true);
    }

    initForm = async () => {
        await this.initSelect2()

        this.submitButton.off('click').on('click', () => {
            //validate with validators
            if (defaultValidator) {
                defaultValidator.validate().then((status) => {
                    if (status === 'Valid') {
                        this.form.submit();
                    } else {
                        const formElements = defaultValidator.elements;

                        Object.keys(formElements).forEach(fieldName => {
                            const field = formElements[fieldName];
                            defaultValidator.validateField(fieldName).then(result => {
                                if (result === 'Invalid') {
                                    const errorMessages = defaultValidator.getMessages(field);
                                }
                            });
                        });
                        
                    }
                });
            }
            // Call the form's submit method if validation passes
        });

        this.form.off("submit").on("submit", (e) => {
            e.preventDefault();
            this.submitForm(true);
        });
        
    }
}

const formInput = new FormInput($("#form-order"), $("#modal-order"), $("#submit-button-order"));
export { FormManager, formInput };
