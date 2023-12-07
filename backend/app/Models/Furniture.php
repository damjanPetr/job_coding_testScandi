<?php

namespace Models;

require __DIR__ . '/../../autoloader.php';

use Helpers\Database;

class Furniture extends Product
{
    protected string $height;
    protected string $width;
    protected string $length;
    protected string $attribute_name = "Dimensions";
    protected string|null $attribute_prop = null;


    public function __construct(
        array $properties
    ) {

        parent::__construct($properties);

        $this->height = $properties["height"];
        $this->width = $properties["width"];
        $this->length = $properties["length"];
    }
    public function validate()
    {
        $this->validator->validateAllFieldsRequired()
            ->validateFieldNumberOnly('height')
            ->validateFieldNumberOnly('price')
            ->validateFieldNumberOnly('width')
            ->validateFieldNumberOnly('length');


    }
    public function save()
    {




        $db = new Database();
        $conn = $db->getConnection();
        $result = $conn->query("INSERT INTO products(
                sku, 
                name, 
                price, 
                type,
                attribute_name,
                attribute_value
                ) VALUES (
                '$this->sku',
                '$this->name',
                '$this->price',
                '$this->type',
                '$this->attribute_name',
                '{$this->width}x{$this->height}x{$this->length}')");

        return $result ? true : false;
    }
}
