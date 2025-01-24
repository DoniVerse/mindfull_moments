<?php

require_once 'includes/autoloader.inc.php';
class User extends database {
    


    public function __construct() {
        $this->connect();  // Establish connection from parent class
    }
   
    public function getUser($username) {
        $this->connect();
        
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
   
        $result = $stmt->get_result();
        return $result->fetch_assoc();
        // return $stmt;
        // $result = $stmt->get_result();
        
        // if($row = $result->fetch_assoc()) {
        //     $pwdCheck = password_verify($password, $row['password']);
        //     if($pwdCheck) {
        //         session_start();
        //         $_SESSION['userId'] = $row['id'];
        //         $_SESSION['username'] = $row['username'];
        //         header('Location: dashboard.php');
        //         $stmt->close();
        //         $this->closeConnection();
        //         return true;
        //     }
        // }
        // $stmt->close();
        // $this->closeConnection();
        // return false;
    }

    public function setUser($username, $password) {
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

    // public function isLoggedIn() {
    //     if(isset($_SESSION['userId'])) {
    //         return true;
    //     }
    //     return false;
    // }

    // public function logout() {
    //     session_start();
    //     session_unset();
    //     session_destroy();
    // }
    public function updateProfile($userId, $username, $profileImage) {
        // Create a secure SQL query using prepared statements
        $sql = "UPDATE users 
                SET username = ?, 
                    profile_picture = ? 
                WHERE id = ?";
    
        try {
         
            $stmt = $this->conn->prepare($sql);
    
            if (!$stmt) {
                throw new Exception("Statement preparation failed: " . $this->conn->error);
            }
    
          
            $stmt->bind_param("ssi", $username, $profile_picture, $userId);
    
            
            if (!$stmt->execute()) {
                throw new Exception("Execution failed: " . $stmt->error);
            }
    
          
            $_SESSION['profile_picture'] = $profile_picture;
            $_SESSION['username'] = $username;
    
        
            $stmt->close();
            return true;
    
        } catch (Exception $e) {
           
            error_log($e->getMessage());  
            return false;
        }
    }
    
    
}





?>