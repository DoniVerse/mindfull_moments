<?php

class userController extends User{
    public function login($username,$password) {
$data=  $this->getUser($username);
if ($data) {
    $pwdCheck = password_verify($password, $data['password']);
    if ($pwdCheck) {
        session_start();
        $_SESSION['userId'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        header('Location: dashboard.php');
        exit();
    }
}
return false; 
    }
    public function register($username,$password){
        $result = $this->setUser($username,$password);
        // // $data = $stmt->get_result();
        
        // if($result->num_rows > 0) {
        //     $stmt->close();
        //     $this->closeConnection();
        //     return "Username already exists";
        // }
        
        // Hash password and create user
        // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        // $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        // $stmt = $this->conn->prepare($sql);
        // $stmt->bind_param("ss", $username, $hashedPwd);
        
        // if($stmt->execute()) {
        //     $stmt->close();
        //     $this->closeConnection();
        //     return "success";
        // } else {
        //     $error = "Error: " . $stmt->error;
        //     $stmt->close();
        //     $this->closeConnection();
        //     return $error;
        // }
        // return $result;
       }
       public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }

    public function updatePro($userId, $username, $profileImage){
        $result=$this->updateProfile($userId, $username, $profileImage);
        
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
        return $result;
    }

    


}





?>