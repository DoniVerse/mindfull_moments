<?php

class database {
    private $host = "localhost";
    private $user = "root";
    private $email = "";
    private $pwd = "123";
    private $dbName = "user_db";
    protected $conn;
  protected function connect() {
    $this->conn = new mysqli($this->host, $this->user, $this->pwd, $this->dbName);
       if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }

    protected function closeConnection() {
        if($this->conn) {
            $this->conn->close();
        }
    } 
}