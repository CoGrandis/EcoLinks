<?php
require_once __DIR__ . '/../../config/connection.php';

class ComentarioModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($postId, $userId, $comment) {
        $query = $this->conn->prepare("
            INSERT INTO comentario (FK_ID_POST, FK_ID_USUARIO, comentario)
            VALUES (:post_id, :user_id, :comment)
        ");
        $query->bindParam(':post_id', $postId);
        $query->bindParam(':user_id', $userId);
        $query->bindParam(':comment', $comment);
        return $query->execute();
    }

    public function getByPost($postId) {
        $query = $this->conn->prepare("
            SELECT c.*, u.usuario AS username 
            FROM comentario c 
            JOIN usuario u ON c.FK_ID_USUARIO = u.ID_USUARIO
            WHERE c.FK_ID_POST = :post_id
            ORDER BY c.fechaDeCreacion  ASC
        ");
        $query->bindParam(':post_id', $postId);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
