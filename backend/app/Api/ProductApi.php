<?php
require_once __DIR__ . '/../../autoloader.php';

header("Access-Control-Allow-Origin: " . ORIGIN);

header('Access-Control-Allow-Methods: GET, POST, DELETE');
header('content-type: application/json; charset=utf-8');


use Helpers\Database;

class Product_Api
{
    public function getAllProducts()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = $conn->query("SELECT * FROM products");
        $query->execute();

        $products = $query->fetchAll();
        echo json_encode($products);

    }
    public function deleteAllProducts($products_array)
    {
        if (empty($products_array)) {
            echo json_encode(["message" => "No products to delete"]);

        } else {
            $db = new Database();
            $conn = $db->getConnection();
            $query = $conn->query("DELETE FROM products WHERE id IN (" . implode(',', $products_array) . ");");

            if ($query->execute()) {
                echo json_encode(["message" => "Products deleted successfully"]);
            } else {
                http_response_code(404);
            }
        }

    }

    public function handleRequest()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $action = $data['action'];

        switch ($action) {
            case 'GET':
                $this->getAllProducts();
                break;
            case 'POST':

                $properties = $data['productProperties'];


                if (class_exists($class = "Models\\" . ucfirst($properties['type']))) {
                    $product = new $class($properties);
                    try {
                        if ($product->checkUniqueSKU()) {
                            $product->validator->addError("sku", "SKU already exists");
                        }

                        $product->validate();
                        if ($product->validator->isValid()) {
                            $product->save();
                            echo json_encode(["message" => "Product saved successfully"]);
                            http_response_code(201);
                        } else {
                            echo json_encode(["errors" => $product->validator->getErrors()]);
                        }

                    } catch (\Throwable $e) {
                        echo json_encode($e->getMessage());
                        http_response_code(400);
                    }
                } else {
                    http_response_code(400);
                }
                ;
                break;
            case 'DELETE':
                $this->deleteAllProducts($data['products_id_array']);
                break;
            default:
                break;
        }
    }
}


$api = new Product_Api();


$api->handleRequest($_SERVER['REQUEST_METHOD']);
