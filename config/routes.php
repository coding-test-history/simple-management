<?php

$routes = array_merge($webRoutes, $apiRoutes);

// Fungsi untuk mencocokkan rute dengan URL dan metode HTTP
function matchRoute($path, $method, $routes)
{
    foreach ($routes as $route => $options) {
        if (preg_match("#^$route$#", $path, $matches) && $options['method'] == $method) {
            array_shift($matches); // Hapus elemen pertama yang merupakan path penuh
            return ['controller' => $options['controller'], 'action' => $options['action'], 'params' => $matches];
        }
    }
    return null;
}

// Cek metode HTTP
$method = $_SERVER['REQUEST_METHOD'];

// Jika metode PUT atau DELETE, ambil data dari php://input
if ($method == 'PUT' || $method == 'DELETE') {
    parse_str(file_get_contents("php://input"), $_REQUEST);
}

// Jalankan controller dan aksi yang sesuai
$route = matchRoute($path, $method, $routes);

if ($route) {
    $controllerName = $route['controller'];
    $actionName = $route['action'];
    $params = $route['params'];

    // Buat instance controller
    $controller = new $controllerName();

    // Panggil action dengan parameter yang diperlukan
    call_user_func_array([$controller, $actionName], $params);
} else {
    // Halaman 404 jika route tidak ditemukan
    http_response_code(404);
    echo "404 - Halaman tidak ditemukan";
}
