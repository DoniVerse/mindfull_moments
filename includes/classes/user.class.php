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
    public function updateProfile($userId, $username) {
        // Create a secure SQL query using prepared statements
        $sql = "UPDATE users 
                SET username = ?, 
                    
                WHERE id = ?";
    
        try {
            // Prepare the query
            $stmt = $this->conn->prepare($sql);
    
            // Check if statement preparation was successful
            if (!$stmt) {
                throw new Exception("Statement preparation failed: " . $this->conn->error);
            }
    
            // Bind parameters securely
            $stmt->bind_param("si", $username, $userId);
    
            // Execute the query
            if (!$stmt->execute()) {
                throw new Exception("Execution failed: " . $stmt->error);
            }
    
            // Update the session username after a successful update
            $_SESSION['username'] = $username;
    
            // Close the statement and return success
            $stmt->close();
            return true;
    
        } catch (Exception $e) {
            // Handle errors gracefully
            error_log($e->getMessage());  // Log error for troubleshooting
            return false;
        }
    }
    
    
}




?>