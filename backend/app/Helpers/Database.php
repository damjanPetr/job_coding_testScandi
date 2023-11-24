<?php

namespace Helpers;

require __DIR__ . '/../../autoloader.php';

use PDO;
use Helpers\Debug;

class Database
{

    protected PDO|null $connection = null;

    public function __construct()
    {
        $host = DB_HOST;
        $db = DB_NAME;
        $user = DB_USER;
        $port = DB_PORT;
        $pass = DB_PASSWORD;
        $charset = DB_CHARSET;
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $this->connection = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=$charset", $user, $pass, $options);

        $this->getConnection();

    }
    public function getConnection()
    {
        return $this->connection;
    }
    public function init()
    {
        $dbSql = file_get_contents(__DIR__ . '/../../db.sql');



        $this->connection->exec($dbSql);
    }
}

?>

