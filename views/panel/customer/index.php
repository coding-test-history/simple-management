<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <?php
                        include('views/panel/customer/components/search.php');
                        include('views/panel/customer/components/add-button.php');
                        ?>
                    </div>
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <?php include('views/panel/customer/table/customer.php') ?>
                        <!--end::Table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('views/panel/customer/modal/customer.php') ?>