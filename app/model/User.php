<?php
require_once __DIR__ . '/../../config/connection.php';
class UserModel{
    private $conn; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getUserByUsername($username){
        $query = $this->conn->prepare("SELECT * FROM usuario WHERE Username = :username");
        $query->bindParam(':username', $username);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->conn->prepare("INSERT INTO usuario (Username, hashedPassword) VALUES (:username, :password)");
        $query->bindParam(':username', $username );
        $query->bindParam(':password', $hashedPassword);
        return $query->execute();
    }

}   


?>