const defaultValidator = FormValidation.formValidation(
    $("#form-order")[0],
    {
        fields: {
            "customer": {
                validators: {
                    notEmpty: {
                        message: "Customer cannot empty"
                    }
                }
            }
        },

        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: ""
            })
        }
    }
);

export default defaultValidator;
