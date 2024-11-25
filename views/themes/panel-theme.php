<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token(">
    <title>CPCM Coding Test -</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="page" content="panel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="assets/images/logo/logo.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    
    <link href="assets/css/config/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/config/style.bundle.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="assets/css/config/custom.css">
    <link rel="stylesheet" href="assets/css/config/vendor.css">
    <link rel="stylesheet" type="text/css" href="assets/css/src/panel/<?= $page ?>/<?= $page ?>-plugin.css">
    <link rel="stylesheet" type="text/css" href="assets/css/src/panel/<?= $page ?>/<?= $page ?>.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="assets/vendors/datatables/datatables.bundle.css">

</head>

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-animation="false" data-kt-sticky-offset="{default: '0px', lg: '0px'}">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch flex-stack border-bottom" id="kt_app_header_container">
                    <?php include('views/themes/components/header/toggle.php') ?>
                    <?php include('views/themes/components/header/navbar.php') ?>
                </div>
            </div>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div id="kt_app_sidebar" class="app-sidebar flex-column border-end ps-2 pe-2 ps-lg-7 pe-lg-4" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <?php include('views/themes/components/sidebar/header.php') ?>
                    <?php include('views/themes/components/sidebar/menu.php') ?>
                </div>
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <div class="d-flex flex-column flex-column-fluid">
                            <?php include('views/themes/components/breadcrumb.php') ?>
                            <?php $page == 'customer' ? include('views/panel/customer/index.php') : include('views/panel/order/index.php') ?>
                        </div>
                    </div>
                    <?php include('views/themes/components/footer/panel.php') ?>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/config/plugins.bundle.js"></script>
    <script src="assets/js/config/scripts.bundle.js"></script>
    <script src="assets/vendors/sweetalert2/sweetalert2.js"></script>
    <script src="assets/vendors/datatables/datatables.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <script src="assets/js/config/config.js"></script>
    <script src="assets/js/config/custom.js"></script>
    <script src="assets/js/utilities/request.js"></script>
    <script src="assets/js/utilities/token.js"></script>
    <script src="assets/js/utilities/sweetalert.js"></script>
    <script src="assets/js/utilities/signout.js"></script>
    <script src="assets/js/utilities/user-data.js"></script>

    <script src="assets/js/src/panel/<?= $page ?>/<?= $page ?>-plugin.js"></script>
    <script src="assets/js/src/panel/<?= $page ?>/<?= $page ?>.js" type="module"></script>
    </body>

</html>