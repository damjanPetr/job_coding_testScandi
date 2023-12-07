<?php

namespace Models;

require __DIR__ . '/../../autoloader.php';

use Helpers\Database;

class Book extends Product
{
    protected string $attribute_name = "weight";
    protected string $attribute_prop = "KG";
    protected string $weight;
    public function __construct(
        array $properties
    ) {
        parent::__construct($properties);
        $this->weight = $properties["weight"];

    }
    public function validate()
    {
        $this->validator->validateAllFieldsRequired()
            ->validateFieldNumberOnly('price')
            ->validateFieldNumberOnly('weight');


    }
    public function save()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $conn->query("INSERT INTO products(sku, name, price, type, attribute_name, attribute_value, attribute_prop) VALUES(
                '$this->sku', 
                '$this->name', 
                '$this->price', 
                '$this->type',
                '$this->attribute_name',
                '$this->weight',
                '$this->attribute_prop'
                )");
    }
}
