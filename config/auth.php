<?php
// Ambil token dari header Authorization
$headers = getallheaders();
if (isset($headers['Authorization'])) {
    $authHeader = $headers['Authorization'];
    $jwt = str_replace('Bearer ', '', $authHeader); // Hapus 'Bearer ' dari header

    // Verifikasi token
    $datas = verifyJWT($jwt);
    if ($datas) {
        return $datas;
    } else {
        http_response_code(401);
        echo json_encode([
            'message' => 'Token tidak valid atau telah kedaluwarsa'
        ]);
    }
} else {
    $paths = explode('/', $path);
    if ($paths[0] != ""):
        if ($paths[0] == 'api'):
            if ($paths[1] != 'auth'):
                http_response_code(401);
                echo json_encode([
                    'message' => 'Unauthorized'
                ]);
                die;
            endif;
        else:
            $cookieToken = $_COOKIE['Bearer'];
            if (!isset($cookieToken)):
                header('location:/');
            endif;
        endif;
    endif;
}
