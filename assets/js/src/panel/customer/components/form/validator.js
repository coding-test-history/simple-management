const customerValidator = FormValidation.formValidation($("#form-customer")[0], {
    fields: {
        name: {
            validators: {
                notEmpty: {
                    message: "Nama lengkap tidak boleh kosong",
                },
            },
        },
        phone: {
            validators: {
                notEmpty: {
                    message: "Nomor Telepon tidak boleh kosong",
                },
            },
        },
        email: {
            validators: {
                notEmpty: {
                    message: "Email tidak boleh kosong",
                },
            },
        },
        address: {
            validators: {
                notEmpty: {
                    message: "Alamat tidak boleh kosong",
                }
            },
        },
    },

    plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: ".fv-row",
            eleInvalidClass: "",
            eleValidClass: "",
        }),
    },
}); 

export { customerValidator };
