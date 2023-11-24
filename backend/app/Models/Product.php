<?php



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

?>

