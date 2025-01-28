<?php
require_once 'classes/user.class.php';
class userController extends User {
    public function login($username, $password) {
        $data = $this->getUser($username);
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

    public function register($username, $password) {
        $result = $this->setUser($username, $password);
        return $result; 
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }

   
}
?>
