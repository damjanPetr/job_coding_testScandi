<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header('content-type: application/json; charset=utf-8');

require_once __DIR__ . '/../../autoloader.php';

use Helpers\Database;


class Product_Api
{
    public function createProduct($sku, $name, $price, $attributes, $type)
    {
        $product = new Product($sku, $name, $price, $attributes, $type);
        $product->store();
        return $product;
    }
    public function getAllProducts()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = $conn->query("SELECT * FROM products");
        $query->execute();


        $products = $query->fetchAll();
        echo json_encode($products);



        $getAttributesSql = "SELECT (product_id, attribute_name, attribute_value) 
        FROM product_attributes
        WHERE product_id IN ()
        ";
        // foreach ($products as $product) {
        //     $item = new Product(
        //         $product['sku'],
        //         $product['name'],
        //         $product['price'],
        //         $product['attributes'],
        //         $product['type'],
        //     );
        // }


    }

    public function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];
        // $data = file_get_contents('php://input');



        switch ($method) {
            case 'GET':
                $this->getAllProducts();
                break;
            case 'POST':
                $data = json_decode(file_get_contents('php://input'), true);

                $props = $data['productProperties'];
                $attributes = $data['attributes'];

                $sku = $props['name'];
                $name = $props['sku'];
                $price = $props['price'];
                $type = $props['type'];

                // $this->createProduct($sku, $name, $price, $attributes, $type);
                break;
            default:
                http_response_code(405);
                break;
        }
    }
}

$api = new Product_Api();
$api->handleRequest();

