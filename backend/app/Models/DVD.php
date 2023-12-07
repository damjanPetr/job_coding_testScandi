<?php

namespace Models;

require __DIR__ . '/../../autoloader.php';
use Helpers\Database;

class Dvd extends Product
{
    protected string $size;
    protected string $attribute_name = "size";
    protected string $attribute_prop = "KG";
    public function __construct(
        array $properties
    ) {
        parent::__construct($properties);
        $this->size = $properties["size"];

    }

    public function validate()
    {
        $this->validator->validateAllFieldsRequired()
            ->validateFieldNumberOnly('price')
            ->validateFieldNumberOnly('size');


    }
    public function save()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $conn->query("INSERT INTO products(sku, name, price, type, attribute_name, attribute_value) VALUES(
            '$this->sku',
            '$this->name',
            '$this->price',
            '$this->type',
            '$this->attribute_name',
            '$this->size')");



    }
}
