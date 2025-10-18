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

    public function create($form) {
        $query = $this->conn->prepare("
            INSERT INTO reclamo (
                FK_ID_EMPLEADO, 
                FK_ID_SUPERVISOR, 
                empresa, 
                fecha_denuncia, 
                descripcion, 
                impacto, 
                solucion, 
                comentarios, 
                firma_digital, 
                asunto
                )
            VALUES (
                :idEmpleado,
                :idSupervisor,
                :empresa,
                :fecha,
                :descripcion,
                :impacto,
                :solucion,
                :comentarios,
                :firmaDigital,
                :asunto
            )
        ");

        $query->bindParam(':idEmpleado', $_SESSION['user']['FK_ID_EMPLEADO']);
        $query->bindParam(':idSupervisor', $form['supervisor']);
        $query->bindParam(':empresa', $form['empresa']);
        $query->bindParam(':fecha', $form['fecha']);
        $query->bindParam(':descripcion', $form['descripcion']);
        $query->bindParam(':impacto', $form['impacto']);
        $query->bindParam(':solucion', $form['solucion']);
        $query->bindParam(':comentarios', $form['comentarios']);
        $query->bindParam(':firmaDigital', $form['signature']);
        $query->bindParam(':asunto', $form['asunto']); // tomar del formulario

        if($query->execute()) {
            return $this->conn->lastInsertId();
        }

     
}


    public function update(){
        $query = $this->conn->prepare("
            UPDATE `reclamo`
            SET
                `FK_ID_EMPLEADO` = :idEmpleado,
                `FK_ID_TIPO` = :idTipo,
                `asunto` = :asunto,
                `descripcion` = :descripcion
            WHERE `id` = :id
        "); 

        $query->bindParam(':idEmpleado', $_SESSION['user']['FK_ID_EMPLOYEE']);
        $query->bindParam(':idTipo', $_POST['tipo']);
        $query->bindParam(':asunto', $_POST['asunto']);
        $query->bindParam(':descripcion', $_POST['descripcion']);
        $query->bindParam(':id', $_POST['id']);
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
        $query = $this->conn->prepare("SELECT * FROM `reclamo` INNER JOIN tipo_reclamo ON reclamo.FK_ID_TIPO = tipo_reclamo.ID_TIPO WHERE `estado` = :estado");
        $query->bindParam(':estado', $estado);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $query = $this->conn->prepare("SELECT * FROM `reclamo` WHERE `ID_RECLAMO` = :id INNER JOIN tipo_reclamo ON reclamo.FK_ID_TIPO = tipo_reclamo.ID_TIPO WHERE `estado` = :estado");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatus(){
        
    }
}
?>