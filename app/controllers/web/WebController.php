<?php
require 'config/render.php';

class WebController
{

    public function __construct() {}

    public function login()
    {
        $data = [
            'page' => "Login",
        ];
        render('login','auth', $data);
    }
    
    public function customer()
    {
        $data = [
            'page' => "customer",
        ];
        render('customer','web', $data);
    }

    public function order()
    {
        $data = [
            'page' => "order",
        ];
        render('order','web', $data);
    }
}
