<?php
require_once __DIR__ . '/../model/ReciboSueldoModel.php';
require_once __DIR__ . '/../model/EmpleadoModel.php';
require_once __DIR__ . '/../model/PDFReciboSueldo.php';

class ReciboSueldoController {
    private $reciboModel;
    private $empleadoModel;

    public function __construct(){
        $this->reciboModel = new ReciboSueldoModel();
        $this->empleadoModel = new EmpleadoModel();
    }

    public function listarRecibos(){
        $recibos = $this->reciboModel->getAllRecibos();
        $empleados = $this->empleadoModel->getAllEmpleados();

        $tpl = new TemplateMotor("lista-recibos");
        $tpl->assing([
            "RECIBO_ACTIVE" => 'active',
            "recibos" => $recibos,
            "empleados" => $empleados
        ]);
        $tpl->printToScreen();
    }

    public function crearRecibo(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $form = $_POST;
             $idRecibo = $this->reciboModel->create($form);

            // Generar PDF
            $this->generarPDF($idRecibo);
            exit;
        }

        $empleados = $this->empleadoModel->getAllEmpleados();
        $tpl = new TemplateMotor("recibo-sueldo-form");
        $tpl->assing([
            "RECIBO_ACTIVE" => 'active',
            "empleados" => $empleados
        ]);
        $tpl->printToScreen();
    }

    public function generarPDF($idRecibo){
        $recibos = $this->reciboModel->getByEmpleado($idRecibo);

        $pdf = new PDFReciboSueldo();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->bloqueEmpleado($recibos);
        $pdf->bloqueSueldo($recibos);
        $pdf->Output('D', 'Recibo_Sueldo_'.$recibos['Nombre'].'.pdf');
    }
}
?>