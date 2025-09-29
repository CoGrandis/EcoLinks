<?php
class AuthMiddleware {
    public static function handle() {
        if (!isset($_SESSION['user'])) {
            header('Location: /auth/login');
            return false;
        }
        return true;
    }
}

?>