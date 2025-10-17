<?php

require_once __DIR__ . '/../../config/connection.php';

class PostFilesModel {
    private $conn; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    public function getByPost($id) {
        $query = $this->conn->prepare("SELECT * FROM post_archivo WHERE FK_ID_POST = :post_id");
        $query->bindParam(':post_id', $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data) { 
        $query = $this->conn->prepare("INSERT INTO post_archivo (FK_ID_POST, nombre, direccionArchivo) VALUES (:post_id, :filename, :filepath)");
        $query->bindParam(':post_id', $data['FK_ID_POST']);
        $query->bindParam(':filename', $data['filename']);
        $query->bindParam(':filepath', $data['filepath']);
        return $query->execute();
    }

}

?>