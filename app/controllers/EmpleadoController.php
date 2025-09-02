<?php

require_once __DIR__ . '/../model/EmpleadoModel.php';
class EmpleadoController {
    private $empleadoModel;

    public function __construct() {
        $this->empleadoModel = new EmpleadoModel();
    }

    public function list() {
        $empleados = $this->empleadoModel->getAllEmpleados();
        require __DIR__ . '/../views/empleados.php';
    }
}
?>