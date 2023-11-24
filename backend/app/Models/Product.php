<?php



namespace Models;

require __DIR__ . '/../../autoloader.php';

abstract class Product
{
    public string $sku;
    public string $name;
    public string $price;
    public string $type;

    public array $attributes;

    public function __construct(
        $sku,
        $name,
        $price,
        $type,
        array $attributes
    ) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
    }

    abstract public function save();

}



?>

