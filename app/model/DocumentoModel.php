<?php
require_once __DIR__ . '/../../config/connection.php';
class DocumentosModel {
     private $conn; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }


    public function getByEmpleado($idEmpleado) {
        $query = $this->conn->prepare("
            SELECT *
            FROM documentos 
            WHERE FK_ID_EMPLEADO = :id
        ");
        $query->bindParam(':id', $idEmpleado);
        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarDocumento($idEmpleado, $nombre, $ruta) {
        $query = $this->conn->prepare("
            INSERT INTO documentos (nombre, ruta, fecha_subida, FK_ID_EMPLEADO)
            VALUES (:nombre, :ruta, NOW(), :id)
        ");
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':id', $idEmpleado);
        $query->bindParam(':ruta', $ruta);

        $query->execute();
    }

    public function getDocumentoById($id) {
        $query = $this->conn->prepare("SELECT * FROM documentos WHERE ID_DOCUMENTO = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function eliminarDocumento($id) {
        $query = $this->conn->prepare("DELETE FROM documentos WHERE ID_DOCUMENTO = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }

}
