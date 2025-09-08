<?php
/**
 * 
 * PostModel.php
 * Modelo para manejar los datosz
 */

require_once __DIR__ . '/../../config/connection.php';


class Post{
    private $conn; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($form){
        $query = $this->conn->prepare("SELECT * FROM posts");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get(){
        $query = $this->conn->prepare("SELECT * FROM posts");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>