<?php

require_once 'app/repositories/panel/order/OrderRepositories.php';

class EloquentOrderRepositories implements OrderRepositories
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getDatabaseConnection();
    }

    /**
     * get all data
     */
    public function data()
    {
        try {
            $data = [];
            $response = sendResponse(null, 200, $data);
        } catch (\Exception $ex) {
            $ex = json_decode($ex->getMessage());
            $response = sendResponse($ex[0], $ex[1]);
        } catch (PDOException $e) {
            $response = sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * get single data
     */
    public function get($id)
    {
        try {
            $data = [];
            $response = sendResponse(null, 200, $data);
        } catch (\Exception $ex) {
            $ex = json_decode($ex->getMessage());
            $response = sendResponse($ex[0], $ex[1]);
        } catch (PDOException $e) {
            $response = sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * delete data 
     */
    public function delete($id)
    {
        try {
            $response = sendResponse(outputMessage('deleted', 'order'), 200);
        } catch (\Exception $ex) {
            $ex = json_decode($ex->getMessage());
            $response = sendResponse($ex[0], $ex[1]);
        } catch (PDOException $e) {
            $response = sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * update data
     */
    public function update($id, $request)
    {
        try {
            $response = sendResponse(outputMessage('updated', 'order'), 201, null);
        } catch (\Exception $ex) {
            $ex = json_decode($ex->getMessage());
            $response = sendResponse($ex[0], $ex[1]);
        } catch (PDOException $e) {
            $response = sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * store data
     */
    public function store($request)
    {
        try {
            $response = sendResponse(outputMessage('saved', 'order'), 201, null);
        } catch (\Exception $ex) {
            $ex = json_decode($ex->getMessage());
            $response = sendResponse($ex[0], $ex[1]);
        } catch (PDOException $e) {
            $response = sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
