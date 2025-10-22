<?php
require __DIR__ . '/../model/EstadisticasModel.php';

class EstadisticasController {
    private $model;

    public function __construct() {
        $this->model = new EstadisticasModel();
    }

    public function dashboard() {
        $estadisticas = $this->model->getEstadisticas();
        $tpl = new TemplateMotor("admin-dashboard");
        $tpl->assing(["DASHBOARD_ACTIVE" => 'active', "estadisticas"=> $estadisticas ]);
        $tpl->printToScreen();
    }
}
