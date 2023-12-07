<?php

namespace Models;

use Helpers\Database;
use Helpers\Validation;

require __DIR__ . '/../../autoloader.php';

abstract class Product
{
    protected string $sku;
    protected string $name;
    protected string $price;
    protected string $type;
    public Validation $validator;

    public function __construct(
        array $properties
    ) {
        $this->sku = $properties["sku"];
        $this->name = $properties["name"];
        $this->price = $properties["price"];
        $this->type = $properties["type"];
        $this->validator = new Validation($properties);
    }

    abstract public function save();

    public function checkUniqueSKU()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $result = $conn->query("SELECT sku from products
        WHERE sku = '{$this->sku}'");

        return $result->rowCount();

    }
}



?>

