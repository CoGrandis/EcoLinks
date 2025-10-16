<?php
/**
 * Clase Modelo Reclamo
 */
require_once __DIR__ . '/../../config/connection.php';


class ReclamoModel {
    private $conn; 
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();

    }

    public function create($form){
        $query = $this->conn->prepare("
            INSERT INTO `reclamo`
            (`FK_ID_EMPLEADO`, `FK_ID_TIPO`, `asunto`,`descripcion`)
            VALUES
            (:idEmpleado, :idTipo, :asunto, :descripcion)

        ");

        $query->bindParam(':idEmpleado', $form['usuario']);
        $query->bindParam(':idTipo', $form['tipo']);
        $query->bindParam(':asunto', $form['asunto']);
        $query->bindParam(':descripcion', $form['descripcion']);
        return $this->conn->lastInsertId();

    }

    public function update($form){
        $query = $this->conn->prepare("
            UPDATE `reclamo`
            SET
                `FK_ID_EMPLEADO` = :idEmpleado,
                `FK_ID_TIPO` = :idTipo,
                `asunto` = :asunto,
                `descripcion` = :descripcion
            WHERE `id` = :id
        ");

        $query->bindParam(':idEmpleado', $form['usuario']);
        $query->bindParam(':idTipo', $form['tipo']);
        $query->bindParam(':asunto', $form['asunto']);
        $query->bindParam(':descripcion', $form['descripcion']);
        $query->bindParam(':id', $form['id']);
        $query->execute();
        return $this->conn->lastInsertId();
    }

    public function updateStatus($id, $estado){
        $query = $this->conn->prepare("
            UPDATE `reclamo`
            SET
                `estado` = :estado
            WHERE `ID_RECLAMO` = :id
        ");

        $query->bindParam(':estado', $estado);
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function updatePriority($id, $prioridad){
        $query = $this->conn->prepare("
            UPDATE `reclamo`
            SET
                `prioridad` = :prioridad
            WHERE `ID_RECLAMO` = :id
        ");

        $query->bindParam(':prioridad', $prioridad);
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function get(){
        $query = $this->conn->prepare("SELECT * FROM `reclamo`");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByStatus($estado){
        $query = $this->conn->prepare("SELECT * FROM `reclamo` WHERE `estado` = :estado");
        $query->bindParam(':estado', $estado);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $query = $this->conn->prepare("SELECT * FROM `reclamo` WHERE `ID_RECLAMO` = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>