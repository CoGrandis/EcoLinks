<?php

require_once __DIR__ . '/../model/ReclamoModel.php';


class ReclamoController{ 
    private $reclamoModel;

    public function __construct() {
        $this->reclamoModel = new ReclamoModel();
    }

    public function reclamos(){
        $reclamos = $this->reclamoModel->get();
    }

    public function createReclamo(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $idReclamo = $this->reclamoModel->create($form);
        }

        $tpl = new TemplateMotor("reclamos");
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl->assing([
            "RECLAMO_ACTIVE" => (strpos($current_page, 'reclamo') !== false) ? 'active' : '',
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