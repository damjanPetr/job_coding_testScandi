<?php

namespace Models;

require __DIR__ . '/../../autoloader.php';

use Helpers\Database;

class Furniture extends Product
{
    private string $height;
    private string $width;
    private string $length;
    public function save()
    { {
            $db = new Database();
            $conn = $db->getConnection();
            $conn->query("INSERT INTO products(sku, name, price, type) VALUES(
'$this->sku',
'$this->name',
'$this->price',
'$this->type')");
            $lastId = $conn->lastInsertId();
            foreach ($this->attributes as $attribute) {
                $conn->query("INSERT INTO product_attributes(
attribute_name,
attribute_value,
attribute_prop,
products_id
)
VALUES(
$attribute->attribute_name,
$attribute->attribute_value,
$attribute->attribute_prop,
$lastId");
            }
        }
    }
}
