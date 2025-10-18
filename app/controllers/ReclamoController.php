<?php

require_once __DIR__ . '/../model/ReclamoModel.php';
require_once __DIR__ . '/../model/EmpleadoModel.php';


class ReclamoController{ 
    private $reclamoModel;

    public function __construct() {
        $this->reclamoModel = new ReclamoModel();
    }

    public function lista(){
        $reclamos = $this->reclamoModel->get();
        $tpl = new TemplateMotor("lista-reclamos");
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl->assing([
            "RECLAMO_ACTIVE" => (strpos($current_page, 'reclamo') !== false) ? 'active' : '',
            "reclamos" => $reclamos
        ]);
        $tpl->printToScreen();
    }

    public function createReclamo(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $form = $_POST;
            $idReclamo = $this->reclamoModel->create($form);
        }

        $empleadoModel = new EmpleadoModel();
        $employees = $empleadoModel->getAllEmpleados();
        $tpl = new TemplateMotor("reclamos");
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl->assing([
            "RECLAMO_ACTIVE" => (strpos($current_page, 'reclamo') !== false) ? 'active' : '',
            "employees" => $employees
        ]);
        $tpl->printToScreen();
    }

    public function updateReclamo(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $reclamo = $this->reclamoModel->update($form);
        }
    }

    public function updateStatus(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $reclamo = $this->reclamoModel->updateStatus($status);
        }
    }
    public function updatePriority(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $reclamo = $this->reclamoModel->updatePriority($priority);
        }
    }
}

?>