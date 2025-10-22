<?php
require_once __DIR__ . '/../../config/connection.php';

class ReciboSueldoModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($form) {
        $sueldoNeto = $form['sueldo_base'] + $form['bonificaciones'] - $form['descuentos'];
        $query = $this->conn->prepare("
            INSERT INTO recibos_sueldo (
                FK_ID_EMPLEADO,
                PERIODO,
                SUELDO_BASE,
                BONIFICACIONES,
                DESCUENTOS,
                SUELDO_NETO,
                FECHA_EMISION
            ) VALUES (
                :idEmpleado,
                :periodo,
                :sueldoBase,
                :bonificaciones,
                :descuentos,
                :sueldoNeto,
                NOW()
            )
        ");

        $query->bindParam(':idEmpleado', $form['employee_id']);
        $query->bindParam(':periodo', $form['periodo']);
        $query->bindParam(':sueldoBase', $form['sueldo_base']);
        $query->bindParam(':bonificaciones', $form['bonificaciones']);
        $query->bindParam(':descuentos', $form['descuentos']);
        $query->bindParam(':sueldoNeto', $sueldoNeto);

        if($query->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function getByEmpleado($idEmpleado){
        $sql = "SELECT r.*, e.Nombre, e.Apellido, d.departamento AS Departamento, p.puesto AS Puesto, e.fechaContratacion AS FECHA_CONTRATACION
                FROM recibos_sueldo r
                JOIN empleado e ON e.ID_EMPLEADO = r.FK_ID_EMPLEADO
                JOIN departamento d ON e.FK_ID_DEPARTAMENTO = d.ID_DEPARTAMENTO
                JOIN puesto p ON e.FK_ID_PUESTO = p.ID_PUESTO
                WHERE r.ID_RECIBO = :idEmpleado";

  
        $query = $this->conn->prepare($sql);
        $query->bindParam(':idEmpleado', $idEmpleado);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllRecibos(){
        $query = $this->conn->prepare("
            SELECT r.*, e.Nombre, e.Apellido
            FROM recibos_sueldo r
            JOIN empleado e ON e.ID_EMPLEADO = r.FK_ID_EMPLEADO
            ORDER BY r.FECHA_EMISION DESC
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>