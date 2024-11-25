<form id="form-order" class="form" enctype="multipart/form-data">
    <div class="mb-8">
        <!--begin::Input group-->
        <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-12 fv-row">

                <!--begin::Label-->
                <label class="required fs-6 fw-semibold form-label mb-2" for="customer">Customer</label>
                <!--end::Label-->
                <select class="form-select form-select-solid" data-placeholder="Choose Customer" data-control="select2"
                    name="customer" id="customer" data-dropdown-parent="#modal-customer">
                    <option></option>
                </select>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <label class="d-flex align-items-center fs-6 fw-semibold mb-2" for="ip">
                    <span class="required">Choose Item</span>
                </label>
                <!--begin:Option-->
                <label class="d-flex flex-stack mb-5 cursor-pointer">
                    <!--begin:Label-->
                    <span class="d-flex align-items-center me-2">
                        <!--begin:Icon-->
                        <span class="symbol symbol-50px me-6">
                            <span class="symbol-label bg-light-primary">
                                <i class="ki-duotone ki-abstract-24 fs-1 text-primary"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </span>
                        </span>
                        <!--end:Icon-->

                        <!--begin:Info-->
                        <span class="d-flex flex-column">
                            <span class="fw-bold fs-6">Item 1</span>
                            <span class="fs-7 text-muted">Rp 10.0000</span>
                        </span>
                        <!--end:Info-->
                    </span>
                    <!--end:Label-->

                    <!--begin:Input-->
                    <span class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="category" value="1" />
                    </span>
                    <!--end:Input-->
                </label>
                <!--end::Option-->

                <!--begin:Option-->
                <label class="d-flex flex-stack mb-5 cursor-pointer">
                    <!--begin:Label-->
                    <span class="d-flex align-items-center me-2">
                        <!--begin:Icon-->
                        <span class="symbol symbol-50px me-6">
                            <span class="symbol-label bg-light-primary">
                                <i class="ki-duotone ki-abstract-24 fs-1 text-primary"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i>
                            </span>
                        </span>
                        <!--end:Icon-->

                        <!--begin:Info-->
                        <span class="d-flex flex-column">
                            <span class="fw-bold fs-6">Item 2</span>
                            <span class="fs-7 text-muted">Rp 20.000</span>
                        </span>
                        <!--end:Info-->
                    </span>
                    <!--end:Label-->

                    <!--begin:Input-->
                    <span class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="category" value="2" />
                    </span>
                    <!--end:Input-->
                </label>
                <!--end::Option-->

                <!--begin:Option-->
                <label class="d-flex flex-stack cursor-pointer">
                    <!--begin:Label-->
                    <span class="d-flex align-items-center me-2">
                        <!--begin:Icon-->
                        <span class="symbol symbol-50px me-6">
                            <span class="symbol-label bg-light-primary">
                                <i class="ki-duotone ki-abstract-24 fs-1 text-primary"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i>
                            </span>
                        </span>
                        <!--end:Icon-->

                        <!--begin:Info-->
                        <span class="d-flex flex-column">
                            <span class="fw-bold fs-6">Item 3</span>
                            <span class="fs-7 text-muted">Rp 30.000</span>
                        </span>
                        <!--end:Info-->
                    </span>
                    <!--end:Label-->

                    <!--begin:Input-->
                    <span class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="category" value="3" />
                    </span>
                    <!--end:Input-->
                </label>
                <!--end::Option-->
            </div>
            <!--end::Col-->
            <div class="col-md-12 fv-row">
                <h3>Total : Rp 0</h3>
            </div>
        </div>
        <!--end::Input group-->
    </div>
</form>