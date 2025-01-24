<?php
require_once 'classes/user.class.php';
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
        //  return $result;
    }

    


}





?>