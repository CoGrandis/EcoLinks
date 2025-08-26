<?php
require __DIR__ . '/../model/User.php';
class AuthController {
    public function registerView() {
        require __DIR__ . '/../views/register.php';
    }
    public function loginView() {
        require __DIR__ . '/../views/login.php';
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];      
            if($username && $password){
                $userModel = new UserModel();
                $user = $userModel->getUserByUsername($username);
                if($user && password_verify($password, $user['hashedPassword']) ) {
                    session_start();
                    $_SESSION['username'] = $username;
                    header('Location: /empleado/list');
                    exit();    
                }else{
                    require __DIR__ . '/../views/login.php';
                }
                
            }
        }
    }
    public function register() {
        require __DIR__ . '/../views/register.php';
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }
}
?>