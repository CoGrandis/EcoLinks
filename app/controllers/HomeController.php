<?php

class HomeController {
    public function index() {
        require __DIR__ . '/../views/home.php';
    }
    public function about() {
        require __DIR__ . '/../views/about.php';
    }
}
?>