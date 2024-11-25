<?php

require_once 'app/repositories/panel/customer/CustomerRepositories.php';

class EloquentCustomerRepositories implements CustomerRepositories
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
            // Query statement
            $stmt = $this->pdo->prepare("SELECT * FROM customer");

            // Eksekusi query
            $stmt->execute();

            // Ambil hasil query
            $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Periksa apakah data ditemukan
            if (!$customer):
                throw new Exception(outputMessage('not found', 'customer'), 404);
            endif;

            $response = sendResponse(null, 200, $customer);
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
            // Query statement
            $stmt = $this->pdo->prepare("SELECT * FROM customer WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Eksekusi query
            $stmt->execute();

            // Ambil hasil query
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            // Periksa apakah data ditemukan
            if (!$data):
                throw new Exception(json_encode([outputMessage('not found', 'customer'), 404]));
            endif;

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

            // checking data if exist
            $checkStmt = $this->pdo->prepare("SELECT * FROM customer WHERE id = :id");
            $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Eksekusi query
            $checkStmt->execute();

            // Ambil hasil query
            $checkData = $checkStmt->fetch(PDO::FETCH_ASSOC);

            // Periksa apakah data ditemukan
            if (!$checkData):
                throw new Exception(json_encode([outputMessage('not found', 'customer'), 404]));
            endif;

            // delete data
            $deleteStmt = $this->pdo->prepare("DELETE FROM customer WHERE id = :id");
            $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Eksekusi query
            if (!$deleteStmt->execute()):
                throw new PDOException(outputMessage('undeleted', 'customer'));
            endif;

            $response = sendResponse(outputMessage('deleted', $checkData['name']), 200);
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
            $name = $request['name'];
            $phone = $request['phone'];
            $email = $request['email'];
            $address = $request['address'];

            // checking data if exist
            $checkStmt = $this->pdo->prepare("SELECT * FROM customer WHERE id = :id");
            $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Eksekusi query
            $checkStmt->execute();

            // Ambil hasil query
            $checkData = $checkStmt->fetch(PDO::FETCH_ASSOC);

            // Periksa apakah data ditemukan
            if (!$checkData):
                throw new Exception(json_encode([outputMessage('not found', 'customer'), 404]));
            endif;

            // update statement
            $updateStmt = $this->pdo->prepare("UPDATE customer SET name = :name, phone = :phone, email = :email, address = :address WHERE id = :id");
            $updateStmt->bindParam(':name', $name, PDO::PARAM_STR);
            $updateStmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $updateStmt->bindParam(':email', $email, PDO::PARAM_STR);
            $updateStmt->bindParam(':address', $address, PDO::PARAM_STR);
            $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Eksekusi insert
            if (!$updateStmt->execute()) :
                throw new PDOException(outputMessage('update fail', $name));
            endif;

            $response = sendResponse(outputMessage('updated', $name), 201, null);
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
            $name = $request['name'];
            $phone = $request['phone'];
            $email = $request['email'];
            $address = $request['address'];

            // checking data if exist
            $checkStmt = $this->pdo->prepare("SELECT * FROM customer WHERE phone = :phone OR email = :email");
            $checkStmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $checkStmt->bindParam(':email', $email, PDO::PARAM_STR);

            // Eksekusi query
            $checkStmt->execute();

            // Ambil hasil query
            $checkData = $checkStmt->fetch(PDO::FETCH_ASSOC);

            // Periksa apakah data ditemukan
            if ($checkData):
                throw new Exception(json_encode([outputMessage('exist', $name), 201]));
            endif;

            // insert statement
            $insertStmt = $this->pdo->prepare("INSERT INTO customer (name, phone, email, address) VALUES (:name, :phone, :email, :address)");
            $insertStmt->bindParam(':name', $name, PDO::PARAM_STR);
            $insertStmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $insertStmt->bindParam(':email', $email, PDO::PARAM_STR);
            $insertStmt->bindParam(':address', $address, PDO::PARAM_STR);

            // Eksekusi insert
            if (!$insertStmt->execute()) :
                throw new PDOException(outputMessage('unsaved', $name));
            endif;

            $response = sendResponse(outputMessage('saved', $name), 201, null);
        } catch (\Exception $ex) {
            $ex = json_decode($ex->getMessage());
            $response = sendResponse($ex[0], $ex[1]);
        } catch (PDOException $e) {
            $response = sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
