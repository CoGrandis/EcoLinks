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
            $this->generarPDF($form['employee_id'], $form['periodo']);
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

    public function generarPDF($idEmpleado, $periodo){
        $recibos = $this->reciboModel->getByEmpleado($idEmpleado, $periodo);
        if(empty($recibos)) return;

        $recibo = $recibos[0];
        $pdf = new PDFReciboSueldo();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->bloqueEmpleado($recibo);
        $pdf->bloqueSueldo($recibo);
        $pdf->Output('D', 'Recibo_Sueldo_'.$recibo['Nombre'].'.pdf');
    }
}
?>
