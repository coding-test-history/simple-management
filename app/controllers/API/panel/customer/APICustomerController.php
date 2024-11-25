<?php
//require_once 'config/auth.php';
require_once 'app/repositories/panel/customer/EloquentCustomerRepositories.php';

class APICustomerController
{

    private $customerRepositories;
    
    public function __construct(
    ) {
        header('Content-Type: application/json');
        $this->customerRepositories = new EloquentCustomerRepositories();
    }

    public function data()
    {
        /**
         * process
         */
        $response = $this->customerRepositories->data();
        $code = $response['code'];
        unset($response['code']);

        /**
         * return response
         */
        http_response_code($code);
        echo json_encode($response);
    }

    public function get($id)
    {

        /**
         * process
         */
        $response = $this->customerRepositories->get($id);
        $code = $response['code'];
        unset($response['code']);

        /**
         * return response
         */
        http_response_code($code);
        echo json_encode($response);
    }

    public function delete($id)
    {
        /**
         * process
         */
        $response = $this->customerRepositories->delete($id);
        $code = $response['code'];
        unset($response['code']);

        /**
         * return response
         */
        http_response_code($code);
        echo json_encode($response);
    }

    public function update($id)
    {
        /**
         * form request
         */
        parse_str(file_get_contents("php://input"), $request);

        /**
         * process
         */
        $response = $this->customerRepositories->update($id, $request);
        $code = $response['code'];
        unset($response['code']);

        /**
         * return response
         */
        http_response_code($code);
        echo json_encode($response);
    }

    public function store()
    {
        /**
         * form request
         */
        $request = [
            'name' =>  $_POST['name'],
            'phone' =>  $_POST['phone'],
            'email' =>  $_POST['email'],
            'address' =>  $_POST['address'],
        ];

        /**
         * process
         */
        $response = $this->customerRepositories->store($request);
        $code = $response['code'];
        unset($response['code']);

        /**
         * return response
         */
        http_response_code($code);
        echo json_encode($response);
    }
}
