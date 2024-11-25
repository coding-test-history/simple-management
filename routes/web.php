<?php

// Autoload semua controller
spl_autoload_register(function ($class_name) {
    include 'app/controllers/web/WebController.php';
});

// Sistem routing
$webRoutes = [
    '' => ['controller' => 'WebController', 'action' => 'login', 'method' => 'GET'],
    'customer' => ['controller' => 'WebController', 'action' => 'customer', 'method' => 'GET'],
    'order' => ['controller' => 'WebController', 'action' => 'order', 'method' => 'GET'],
];