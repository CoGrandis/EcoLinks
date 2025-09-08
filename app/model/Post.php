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
        $query = $this->conn->prepare("INSERT INTO posts (Title, Content_Text,Attachmentpath) VALUES(:title, :content, :attachment)");
        $query->bindParam(':title', $form['title']);
        $query->bindParam(':content', $form['content']);
        $query->bindParam(':attachment', $form['attachment']);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get(){
        $query = $this->conn->prepare("SELECT * FROM posts");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete(){
        $query = $this->conn->prepare("DELETE ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($form, $id){
        $query = $this->conn->prepare("UPDATE posts SET Title = :title, Content_Text = :content, Attachmentpath= :attachment WHERE ID_Post = $id ");
        $query->bindParam(':title', $form['title']);
        $query->bindParam(':content', $form['content']);
        $query->bindParam(':attachment', $form['attachment']);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>