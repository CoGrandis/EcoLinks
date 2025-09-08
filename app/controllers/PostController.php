<?php
require_once __DIR__ . '/../model/Post.php';

class PostController{
    private $post;

    public function __construct() {
        $this->post = new Post();
    }
}
?>