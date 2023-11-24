<?php
namespace Models;

require __DIR__ . '/../../autoloader.php';
use Helpers\Database;

class Dvd extends Product
{
    private string $size;

    public function save()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $insert = $conn->query("INSERT INTO products(sku, name, price, type) VALUES(
'$this->sku',
'$this->name',
'$this->price',
'$this->type')");


        $lastId = $conn->lastInsertId();

        $conn->query("INSERT INTO product_attributes(
attribute_name,
attribute_value,
attribute_prop,
products_id
)
VALUES(
'size',
$this->size,
'kg,
$lastId");
    }
}
