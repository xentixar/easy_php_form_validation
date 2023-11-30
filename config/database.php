<?php

class Database
{
    private $server_name = 'localhost';
    private $user_name = 'root';
    private $password = '';
    private $database_name = 'php_data_validation';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server_name, $this->user_name, $this->password, $this->database_name);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function connect()
    {
        return $this->conn;
    }
}
