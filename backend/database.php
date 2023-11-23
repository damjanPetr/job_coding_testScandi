<?php

class Database
{

    protected PDO $connection;


    public function __construct()
    {
        $host = '127.0.0.1';
        $db = 'skilltest';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $this->connection = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, $options);

    }
    public function getConnection()
    {
        return $this->connection;
    }
    public function init()
    {
        $droptable = $this->connection->exec(
            "DROP TABLE IF EXISTS `Product`;"
        );
        $createTables = $this->connection->exec(
            "CREATE TABLE IF NOT EXISTS products (
                `id` INT NOT NULL AUTO_INCREMENT,
                `name` VARCHAR(255) NOT NULL,
                `sku` VARCHAR(255) NOT NULL,
                `price` VARCHAR(255) NULL,
                `attribute_id` INT NOT NULL,
                PRIMARY KEY (`id`)
                );
                CREATE TABLE IF NOT EXISTS attribute (
                `type` VARCHAR(255) NULL,
                `value` VARCHAR(255) NULL,
                `products_id` INT NOT NULL,
                PRIMARY KEY (`products_id`),
                CONSTRAINT `fk_attribute_products`
                  FOREIGN KEY (`products_id`)
                  REFERENCES products (`id`))"
        );
    }
}


$db = new Database();
$db->init();

?>

