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


    public function updatePriority(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $reclamo = $this->reclamoModel->updatePriority($priority);
        }
    }

    public function detalleReclamo($id){
            $reclamo = $this->reclamoModel->getById($id);
            $tpl = new TemplateMotor("detalle-reclamo");
            $current_page = basename($_SERVER['REQUEST_URI']);
            $tpl->assing([
                "RECLAMO_ACTIVE" => (strpos($current_page, 'reclamo') !== false) ? 'active' : '',
                "reclamo" => $reclamo[0]
            ]);
            $tpl->printToScreen();
    }

    public function responderReclamo(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $form = $_POST;
            $reclamo = $this->reclamoModel->responderReclamo($form);
            $estado = $this->reclamoModel->cambiarEstadoReclamo($form['idReclamo'], $form['estado']);
            
        }
        header('Location: /reclamo/detalle/' . $form['idReclamo']);
        echo "<script>alert('Respuesta enviada con éxito.');</script>";
    }
}

?>