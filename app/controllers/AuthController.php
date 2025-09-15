<?php
require __DIR__ . '/../model/User.php';
class AuthController
{

    public function login()
    {
        require __DIR__ . '/../views/login.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($username && $password) {
                $userModel = new UserModel();
                $user = $userModel->getUserByUsername($username);
                if ($user && password_verify($password, $user['hashedPassword'])) {
                    session_start();
                    $_SESSION['username'] = $username;
                    header('Location: /admin/dashboard');
                    exit();
                } else {
                    header('Location: /auth/login');
                }
            }
        }
    }
    public function register()
    {
        require __DIR__ . '/../views/register.php';
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /');

    }
}
