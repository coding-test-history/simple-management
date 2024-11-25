<?php
//require_once 'config/auth.php';
require_once 'app/repositories/panel/order/EloquentOrderRepositories.php';

class APIOrderController
{

    private $orderRepositories;
    
    public function __construct(
    ) {
        header('Content-Type: application/json');
        $this->orderRepositories = new EloquentOrderRepositories();
    }

    public function data()
    {
        /**
         * process
         */
        $response = $this->orderRepositories->data();
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
        $response = $this->orderRepositories->get($id);
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
        $response = $this->orderRepositories->delete($id);
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
        $response = $this->orderRepositories->update($id, $request);
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
            'item_id' =>  $_POST['item_id'],
            'customer_id' =>  $_POST['customer_id'],
            'total' =>  $_POST['total'],
        ];

        /**
         * process
         */
        $response = $this->orderRepositories->store($request);
        $code = $response['code'];
        unset($response['code']);

        /**
         * return response
         */
        http_response_code($code);
        echo json_encode($response);
    }
}
