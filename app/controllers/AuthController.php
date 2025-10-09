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
                    $_SESSION['user'] = $user;

                    if ($user['FK_ID_ROL'] == 3) {
                        header('Location: /news');
                        exit();
                    }
                    header('Location: /admin/dashboard');
                    exit();
                }
            }
        }
        $tpl = new TemplateMotor("login");
        $tpl->printToScreen();
    }
    public function register()
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = [
                "username" => $_POST['username'],
                "password" => $_POST['password'],
                "credential" => $_POST['credential'] // credencial del empleado
            ];

            $userModel = new UserModel();
            $result = $userModel->create($form);
             if (isset($result['success'])) {
                header("Location: /auth/login");
                exit;
            } else {
                header("Location: /auth/register");
                exit;
            }

            }
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
