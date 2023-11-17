<?php

class DatabaseConnection {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'imss';
    private $conn;

    public function __construct() {
        $this->conn = $this->connect();
    }

    private function connect() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        return $conn;
    }

    public function getConnection() {
        return $this->conn;
    }
}
