<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Fungsi untuk membuat token JWT
function createJWT($userId) {
    $issuedAt = time();
    $expirationTime = $issuedAt + 3600; // Token berlaku selama 1 jam
    $payload = [
        'iat' => $issuedAt,
        'exp' => $expirationTime,
        'data' => [
            'userId' => $userId
        ]
    ];

    return JWT::encode($payload, $_ENV['JWT_SECRET_KEY'], $_ENV['JWT_ALGORITHM']);
}

// Fungsi untuk memverifikasi token JWT
function verifyJWT($jwt) {
    try {
        $decoded = JWT::decode($jwt, new Key($_ENV['JWT_SECRET_KEY'], $_ENV['JWT_ALGORITHM']));
        return (array) $decoded->data; // Mengembalikan data jika token valid
    } catch (Exception $e) {
        return null; // Token tidak valid
    }
}
