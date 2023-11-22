<?php 

class Database
{

    protected PDO $connection ;
    
    public function __construct() {
        $host = '127.0.0.1';
        $db   = 'skilltest';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        $options=[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $this->connection = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
    }
    public function getConnection()
    {
        return $this->connection;
    }
}


?>


