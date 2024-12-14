<?php

class database {
    private $host = "localhost";
    private $user = "root";
    private $email = ""
    private $pwd = "";
    private $dbName = "user_db";
    protected $conn;

    protected function connect() {
        //database user_db creation
        $sql = "CREATE DATABASE IF NOT EXISTS $this->dbName";
        if ($this->conn->query($sql) === TRUE) {
            echo "Database created successfully or already exists.<br>";
        } else {
            die("Error creating database: " . $this->conn->error);
        }
        //create users table
       
        $tableQuery = "
            CREATE TABLE IF NOT EXISTS users (
                user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
                user_name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL
            )";

        if ($this->conn->query($tableQuery) === TRUE) {
            echo "Table `users` created successfully or already exists.<br>";
        } else {
            die("Error creating table: " . $this->conn->error);
        }


        // Connect to the created database
        $this->conn->select_db($this->dbName);
        $this->conn = new mysqli($this->host, $this->user,$this->$email, $this->pwd, $this->dbName);

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