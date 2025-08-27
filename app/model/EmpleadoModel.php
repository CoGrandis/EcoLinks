<?php

/** 
 * EmpleadoModel.php
 * Modelo para manejar los datos de los empleados.
 * 
 */
require_once __DIR__ . '/../../config/connection.php';
class EmpleadoModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllEmpleados()
    {
        $query = $this->conn->prepare("SELECT * FROM empleado");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmpleadosById($id)
    {
        $query = $this->conn->prepare("SELECT * FROM empleado WHERE ID_EMPLEADO = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function searchEmpleado($search)
    {
        $query = $this->conn->prepare("SELECT * FROM empleado WHERE Nombre LIKE %:search% OR Apellido LIKE %:search% ");
        $query->bindParam(':search', $search);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function create($username, $hashedPassword, $email, $direccion, $fechaNacimiento, $departamento)
    {
        $query = $this->conn->prepare("INSERT INTO empleado() VALUES(:username, :hashedPassword, :email, :direccion, :fechaNacimiento, :departamento) ");
        $query->bindParam(':username', $username);
        $query->bindParam(':hashedPassword', $hashedPassword);
        $query->bindParam(':email', $email);
        $query->bindParam(':direccion', $direccion);
        $query->bindParam(':fechaNacimiento', $fechaNacimiento);
        $query->bindParam(':departamento', $departamento);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
