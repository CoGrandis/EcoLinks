<?php

require_once __DIR__ . '/../../config/connection.php';
require_once __DIR__ . '/PostFilesModel.php';
class PostModel {
    private $conn; 
    private $fileModel;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->fileModel = new PostFilesModel();

    }
    public function getAllWithFiles() {
        $query = $this->conn->prepare("SELECT post.*, usuario.usuario AS username FROM post JOIN usuario ON post.FK_ID_USUARIO = usuario.ID_USUARIO ORDER BY post.fechaCreado DESC; ");
        $query->execute();
        $posts = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts as &$post) {
            $post['files'] = $this->fileModel->getByPost($post['ID_POST']);
        }

        return $posts;
    }
    public function create($userId, $title, $content) {
        $query = $this->conn->prepare("INSERT INTO post (FK_ID_USUARIO, titulo, contenido) VALUES (:id, :title, :content)");
        $query->bindParam(':title', $title);
        $query->bindParam(':content', $content);
        $query->bindParam(':id', $userId);
        $query->execute();
        return $this->conn->lastInsertId();
    }
    public function update($form) {
        $query = $this->conn->prepare("UPDATE post SET titulo = :title, contenido = :content WHERE FK_ID_USUARIO = :id");
        $query->bindParam(':title', $form['title']);
        $query->bindParam(':content', $form['content']);
        $query->bindParam(':id', $_SESSION['user']['ID_USUARIO']);
        return $query->execute();
    }
}

?>