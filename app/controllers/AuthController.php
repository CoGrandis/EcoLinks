<?php
require __DIR__ . '/../model/UserModel.php';
class AuthController
{

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($username && $password) {
                $userModel = new UserModel();
                $user = $userModel->getByUsername($username);
                if ($user && password_verify($password, $user['hashedPassword'])) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header('Location: /admin/dashboard');
                    exit();
                } else {
                    header('Location: /auth/login');
                }
            }
        }
        $tpl = new TemplateMotor("login");
        $tpl->printToScreen();
    }
    public function register()
    {
        $tpl = new TemplateMotor("register");
        $tpl->printToScreen();
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /');

    }
}
