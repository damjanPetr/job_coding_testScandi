<?php
namespace Models;

require __DIR__ . '/../../autoloader.php';

use Helpers\Database;

class Book extends Product
{

    private string $weight;
    public function save()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $conn->query("INSERT INTO products(sku, name, price, type) VALUES(
                '$this->sku', 
                '$this->name', 
                '$this->price', 
                '$this->type')");
        $lastId = $conn->lastInsertId();
    }
}
