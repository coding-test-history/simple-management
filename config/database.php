<?php

function getDatabaseConnection()
{
    $host = $_ENV['DB_HOST'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $db = $_ENV['DB_DATABASE'];
    $port = $_ENV['DB_PORT'] ?? '5432';
    $connection = $_ENV['DB_CONNECTION'];

    try {

        if ($connection == 'pgsql'):
            $dsn = 'pgsql:host=' . $host . ';port=' . $port . ';dbname=' . $db;
        else:
            $dsn = 'mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8';
        endif;
        $pdo = new PDO($dsn, $username, $password);

        // Atur mode error ke Exception untuk menangani error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        // Tampilkan pesan error jika koneksi gagal
        die("Koneksi database gagal: {$db} " . $e->getMessage());
    }
}
