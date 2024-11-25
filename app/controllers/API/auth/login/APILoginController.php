<?php

require_once 'app/repositories/auth/login/EloquentLoginRepositories.php';

class APILoginController
{

    private $loginRepositories;
    
    public function __construct(
    ) {
        header('Content-Type: application/json');
        $this->loginRepositories = new EloquentLoginRepositories();
    }

    public function login()
    {
        /**
         * form request
         */
        $request = [
            'username' =>  $_POST['username'],
            'password' =>  $_POST['password'],
        ];

        /**
         * process
         */
        $response = $this->loginRepositories->login($request);
        $code = $response['code'];
        unset($response['code']);

        /**
         * return response
         */
        http_response_code($code);
        echo json_encode($response);
    }
}
