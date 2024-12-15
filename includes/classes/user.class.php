<?php


class User extends database {
    public function __construct() {
        $this->connect();  // Establish connection from parent class
    }
    public function login($username, $password) {
        $this->connect();
        
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($row = $result->fetch_assoc()) {
            $pwdCheck = password_verify($password, $row['password']);
            if($pwdCheck) {
                session_start();
                $_SESSION['userId'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $stmt->close();
                $this->closeConnection();
                return true;
            }
        }
        $stmt->close();
        $this->closeConnection();
        return false;
    }

    public function register($username, $password) {
        $this->connect();
        
        // Check if username already exists
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0) {
            $stmt->close();
            $this->closeConnection();
            return "Username already exists";
        }
        
        // Hash password and create user
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashedPwd);
        
        if($stmt->execute()) {
            $stmt->close();
            $this->closeConnection();
            return "success";
        } else {
            $error = "Error: " . $stmt->error;
            $stmt->close();
            $this->closeConnection();
            return $error;
        }
    }

    public function isLoggedIn() {
        if(isset($_SESSION['userId'])) {
            return true;
        }
        return false;
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }
}




?>