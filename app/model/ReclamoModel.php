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

    public function cambiarEstadoReclamo($id, $estado){
        $query = $this->conn->prepare("
            UPDATE reclamo
            SET
                estado = :estado
            WHERE ID_RECLAMO = :id
        ");

        $query->bindParam(':estado', $estado);
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function get(){
        $query = $this->conn->prepare("
            SELECT 
                reclamo.*,
                empleado.Nombre AS nombre_empleado,
                empleado.Apellido AS apellido_empleado,
                supervisor.Nombre AS nombre_supervisor,
                supervisor.Apellido AS apellido_supervisor
            FROM reclamo
            INNER JOIN empleado ON empleado.ID_EMPLEADO = reclamo.FK_ID_EMPLEADO
            INNER JOIN empleado supervisor ON supervisor.ID_EMPLEADO = reclamo.FK_ID_SUPERVISOR
            ORDER BY reclamo.fecha_denuncia DESC
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }   


    public function getById($id){
        $query = $this->conn->prepare("
            SELECT 
                reclamo.*,
                empleado.Nombre AS nombre_empleado,
                empleado.Apellido AS apellido_empleado,
                supervisor.Nombre AS nombre_supervisor,
                supervisor.Apellido AS apellido_supervisor
            FROM reclamo
            INNER JOIN empleado ON empleado.ID_EMPLEADO = reclamo.FK_ID_EMPLEADO
            INNER JOIN empleado supervisor ON supervisor.ID_EMPLEADO = reclamo.FK_ID_SUPERVISOR
            WHERE ID_RECLAMO = :id
        ");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function responderReclamo($form){
        $query = $this->conn->prepare("
            INSERT INTO 
            respuesta_reclamo
            (
                FK_ID_RECLAMO, 
                FK_ID_EMPLEADO,
                respuesta
            )
            VALUES
            (
                :id_reclamo,
                :id_empleado,
                :respuesta
            )
        ");

        $query->bindParam(':respuesta', $form['respuesta']);
        $query->bindParam(':id_reclamo', $form['idReclamo']);
            $query->bindParam(':id_empleado', $_SESSION['user']['FK_ID_EMPLEADO']);
        return $query->execute();

    }

    public function asignarResponsable($idReclamo, $idResponsable) {
        $query = $this->conn->prepare("
            UPDATE reclamo 
            SET FK_ID_RESPONSABLE = :idResponsable
            WHERE ID_RECLAMO = :idReclamo
        ");
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':idReclamo', $idReclamo);
        return $query->execute();
    }

    public function cambiarPrioridadReclamo($id, $prioridad) {
        $query = $this->conn->prepare("
            UPDATE reclamo 
            SET prioridad = :prioridad 
            WHERE ID_RECLAMO = :id
        ");
        $query->bindParam(':prioridad', $prioridad);
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function buscarReclamos($filtros = []) {
    $sql = "
        SELECT 
            r.*, 
            e.nombre AS nombre_empleado,
            e.apellido AS apellido_empleado
        FROM reclamo r
        INNER JOIN empleado e ON e.ID_EMPLEADO = r.FK_ID_EMPLEADO
        WHERE 1=1
    ";

    $params = [];

    // Filtro por empleado (nombre o ID)
    if (!empty($filtros['empleado'])) {
        $sql .= " AND (e.nombre LIKE :empleado OR e.apellido LIKE :empleado OR e.ID_EMPLEADO = :empleadoExacto)";
        $params[':empleado'] = "%{$filtros['empleado']}%";
        $params[':empleadoExacto'] = $filtros['empleado'];
    }

    // Filtro por estado
    if (!empty($filtros['estado'])) {
        $sql .= " AND r.estado = :estado";
        $params[':estado'] = $filtros['estado'];
    }

    // Filtro por prioridad
        if (!empty($filtros['prioridad'])) {
            $sql .= " AND r.prioridad = :prioridad";
            $params[':prioridad'] = $filtros['prioridad'];
        }

        $sql .= " ORDER BY r.fecha_denuncia DESC";

        $query = $this->conn->prepare($sql);
        foreach ($params as $key => $value) {
            $query->bindValue($key, $value);
        }

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getComentariosByReclamo($idReclamo){
        $query = $this->conn->prepare("
            SELECT respuesta_reclamo.*, empleado.Nombre AS nombre_empleado, empleado.Apellido AS apellido_empleado
            FROM respuesta_reclamo 
            INNER JOIN empleado ON empleado.ID_EMPLEADO = respuesta_reclamo.FK_ID_EMPLEADO
            WHERE respuesta_reclamo.FK_ID_RECLAMO = :idReclamo
        ");
        $query->bindParam(':idReclamo', $idReclamo);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>