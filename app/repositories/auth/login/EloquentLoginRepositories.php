<?php

require_once 'app/repositories/auth/login/LoginRepositories.php';

class EloquentLoginRepositories implements LoginRepositories
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getDatabaseConnection();
    }

    /**
     * login
     */
    public function login($request)
    {
        try {

            // Ambil input username dan password dari form
            $username = $request['username'];
            $password = $request['password']; // Plain password yang diinput pengguna

            // Query untuk mencari user berdasarkan username
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = :username");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);

            // Eksekusi query
            $stmt->execute();

            // Ambil hasil query
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Periksa apakah data ditemukan
            if (!$user):
                throw new Exception(json_encode([outputMessage('not found', 'username'), 401]));
            endif;

            // Verifikasi password dengan password_verify
            if (!password_verify($password, $user['password'])) :
                throw new Exception(json_encode([outputMessage('not found', 'password'), 401]));
            endif;

            $data = [
                'token' => createJWT($user['id']),
                'name' => $user['name'],
                'username' => $user['username'],
            ];
            $response = sendResponse(null, 200, $data);
        } catch (\Exception $ex) {
            $ex = json_decode($ex->getMessage());
            $response = sendResponse($ex[0], $ex[1]);
        } catch (PDOException $e) {
            // Menangani error
            $response = sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
