<?php
class userController extends User{
    public function login($username,$password) {
$result=  $this->getUser($username,$password);
// if($row = $result->fetch_assoc()) {
//         $pwdCheck = password_verify($password, $row['password']);
//         if($pwdCheck) {
//             session_start();
//             $_SESSION['userId'] = $row['id'];
//             $_SESSION['username'] = $row['username'];
//             // $stmt->close();
//             // $this->closeConnection();
//             header('Location: dashboard.php');
//             exit;
//         }
//         else{
//             return "Invalid username or password";
//         }
//     }
//     return "Login Successfull";
    }
    public function register($username,$password){
        $result = $this->setUser($username,$password);
        return $result;
       }
       public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }

    public function updatePro($userId, $username, $profileImage){
        $result=$this->updateProfile($userId, $username, $profileImage);
        return $result;
    }

    


}





?>