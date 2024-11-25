<form id="form-customer" class="form">
    <div class="mb-8">
        <!--begin::Input group-->
        <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <label class="d-flex align-items-center fs-6 fw-semibold mb-2" for="name">
                    <span class="required">Name</span>
                </label>
                <input type="text" class="form-control form-control-solid" id="name" name="name"
                    placeholder="Enter Customer Name" />
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-semibold mb-2" for="phone">
                    <span class="required">Phone</span>
                </label>
                <!--end::Label-->
                <input type="text" class="form-control form-control-solid" id="phone" name="phone"
                    placeholder="+62" />
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-semibold mb-2" for="email">
                    <span class="required">Email</span>
                </label>
                <!--end::Label-->
                <input type="text" class="form-control form-control-solid" id="email" name="email"
                    placeholder="customer@mail.com" />
            </div>
            <!--end::Col-->

            <div class="col-md-12 fv-row">
                <label class="d-flex align-items-center fs-6 fw-semibold mb-2" for="address">
                    <span class="required">Address</span>
                </label>
                <textarea type="text" class="form-control form-control-solid" rows="7" id="address" name="address"
                    placeholder="Enter Customer Address"></textarea>
            </div>
        </div>
        <!--end::Input group-->
    </div>
</form>