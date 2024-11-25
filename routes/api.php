<?php

// Autoload semua controller
spl_autoload_register(function ($class_name) {
    require_once 'app/controllers/API/auth/login/APILoginController.php';
    require_once 'app/controllers/API/panel/customer/APICustomerController.php';
    require_once 'app/controllers/API/panel/order/APIOrderController.php';
});

// Sistem routing
$apiRoutes = [

    /**
     * auth
     */
    'api/auth/login' => [
        'controller' => 'APILoginController',
        'action' => 'login',
        'method' => 'POST'
    ],

    /**
     * customer management
     */
    'api/customer/data' => [
        'controller' => 'APICustomerController',
        'action' => 'data',
        'method' => 'GET'
    ],
    'api/customer/get/(\d+)' => [
        'controller' => 'APICustomerController',
        'action' => 'get',
        'method' => 'GET'
    ],
    'api/customer/delete/(\d+)' => [
        'controller' => 'APICustomerController',
        'action' => 'delete',
        'method' => 'DELETE'
    ],
    'api/customer/update/(\d+)' => [
        'controller' => 'APICustomerController',
        'action' => 'update',
        'method' => 'PUT'
    ],
    'api/customer/store' => [
        'controller' => 'APICustomerController',
        'action' => 'store',
        'method' => 'POST'
    ],

    /**
     * order management
     */
    'api/order/data' => [
        'controller' => 'APIOrderController',
        'action' => 'data',
        'method' => 'GET'
    ],
    'api/order/get/(\d+)' => [
        'controller' => 'APIOrderController',
        'action' => 'get',
        'method' => 'GET'
    ],
    'api/order/delete/(\d+)' => [
        'controller' => 'APIOrderController',
        'action' => 'delete',
        'method' => 'DELETE'
    ],
    'api/order/update/(\d+)' => [
        'controller' => 'APIOrderController',
        'action' => 'update',
        'method' => 'PUT'
    ],
    'api/order/store' => [
        'controller' => 'APIOrderController',
        'action' => 'store',
        'method' => 'POST'
    ]
];