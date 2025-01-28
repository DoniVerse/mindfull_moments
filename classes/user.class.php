<?php

require_once 'includes/autoloader.inc.php';
class User extends database {

    public function __construct() {
        $this->connect();  
    }
   
    public function getUser($username) {
        $this->connect();
        
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
   
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            return null; 
        }
        return $result->fetch_assoc();
    }

    public function setUser($username, $password) {
        $this->connect();
       
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

    
}
?>
