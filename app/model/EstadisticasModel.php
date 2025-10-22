<?php
require_once __DIR__ . '/../../config/connection.php';

class EstadisticasModel {
   private $conn; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getEstadisticas() {
        $stats = [];

        // Total de empleados
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total_empleados FROM empleado");
        $stmt->execute();
        $stats['total_empleados'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_empleados'];

        // Empleados activos vs inactivos
        $stmt = $this->conn->prepare("SELECT Estado, COUNT(*) AS total FROM empleado GROUP BY Estado");
        $stmt->execute();
        $stats['empleados_estado'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Empleados por departamento
        $stmt = $this->conn->prepare("
            SELECT d.departamento, COUNT(e.ID_EMPLEADO) AS total
            FROM empleado e
            LEFT JOIN departamento d ON e.FK_ID_DEPARTAMENTO = d.ID_DEPARTAMENTO
            GROUP BY d.departamento
        ");
        $stmt->execute();
        $stats['empleados_departamento'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Promedio de antigüedad
        $stmt = $this->conn->prepare("SELECT AVG(DATEDIFF(CURDATE(), FechaContratacion)/365) AS antiguedad_promedio FROM empleado");
        $stmt->execute();
        $stats['antiguedad_promedio'] = $stmt->fetch(PDO::FETCH_ASSOC)['antiguedad_promedio'];

        // Total de reclamos
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total_reclamos FROM reclamo");
        $stmt->execute();
        $stats['total_reclamos'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_reclamos'];

        // Reclamos por estado
        $stmt = $this->conn->prepare("SELECT estado, COUNT(*) AS total FROM reclamo GROUP BY estado");
        $stmt->execute();
        $stats['reclamos_estado'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Reclamos por empleado
        $stmt = $this->conn->prepare("
            SELECT e.Nombre, e.Apellido, COUNT(r.ID_RECLAMO) AS total_reclamos
            FROM reclamo r
            JOIN empleado e ON r.FK_ID_EMPLEADO = e.ID_EMPLEADO
            GROUP BY e.ID_EMPLEADO
        ");
        $stmt->execute();
        $stats['reclamos_por_empleado'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Promedio de reclamos por empleado
        $stmt = $this->conn->prepare("
            SELECT AVG(reclamos) AS promedio_reclamos_por_empleado
            FROM (
                SELECT COUNT(*) AS reclamos
                FROM reclamo
                GROUP BY FK_ID_EMPLEADO
            ) AS sub
        ");
        $stmt->execute();
        $stats['promedio_reclamos_por_empleado'] = $stmt->fetch(PDO::FETCH_ASSOC)['promedio_reclamos_por_empleado'];

        return $stats;
    }
}
