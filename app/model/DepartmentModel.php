<?php

require_once __DIR__ . '/../../config/connection.php';

class DepartmentModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = $this->conn->prepare("SELECT * FROM departamento");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>