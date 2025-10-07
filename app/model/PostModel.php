<?php

require_once __DIR__ . '/../../config/connection.php';

class PostModel {
    private $conn; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    public function get() {
        $query = $this->conn->prepare("SELECT * FROM post");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($form) {
        $query = $this->conn->prepare("INSERT INTO post (title, content, author_id) VALUES (:title, :content, :author_id)");
        $query->bindParam(':title', $form['title']);
        $query->bindParam(':content', $form['content']);
        $query->bindParam(':author_id', $form['author_id']);
        return $query->execute();
    }
    public function update($form) {
        $query = $this->conn->prepare("UPDATE post SET title = :title, content = :content WHERE id = :id");
        $query->bindParam(':title', $form['title']);
        $query->bindParam(':content', $form['content']);
        $query->bindParam(':id', $form['id']);
        return $query->execute();
    }

}

?>