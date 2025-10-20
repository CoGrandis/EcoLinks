<?php

require_once __DIR__ . '/../model/ReclamoModel.php';
require_once __DIR__ . '/../model/EmpleadoModel.php';
require_once __DIR__ . '/../model/PdfReclamo.php';


class ReclamoController{ 
    private $reclamoModel;
    private $empleadoModel;

    public function __construct() {
        $this->reclamoModel = new ReclamoModel();
        $this->empleadoModel = new EmpleadoModel();
    }

    public function buscar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filtros = [
                'empleado' => $_POST['empleado'] ?? null,
                'estado' => $_POST['estado'] ?? null,
                'prioridad' => $_POST['prioridad'] ?? null
            ];

            $reclamos = $this->reclamoModel->buscarReclamos($filtros);
        } else {
            $reclamos = $this->reclamoModel->get();
        }

        $empleados = $this->empleadoModel->getAllEmpleados();

        $tpl = new TemplateMotor("lista-reclamos");
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl->assing([
            "RECLAMO_ACTIVE" => (strpos($current_page, 'reclamos') !== false) ? 'active' : '',
            "reclamos" => $reclamos,
            "empleados" => $empleados
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



    public function detalleReclamo($id){
        $reclamo = $this->reclamoModel->getById($id);
        $comentarios = $this->reclamoModel->getComentariosByReclamo($id);

        $tpl = new TemplateMotor("detalle-reclamo");
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl->assing([
            "RECLAMO_ACTIVE" => (strpos($current_page, 'reclamo') !== false) ? 'active' : '',
            "reclamo" => $reclamo[0],
            "comentarios" => $comentarios
        ]);
        $tpl->printToScreen();
    }

    public function responderReclamo(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $form = $_POST;
            $reclamo = $this->reclamoModel->responderReclamo($form);
            $estado = $this->reclamoModel->cambiarEstadoReclamo($form['idReclamo'], $form['estado']);
            header('Location: /reclamo/detalle/'.$form['idReclamo']);
            exit;
        }
    }

    public function actualizarTabla() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idReclamo = $_POST['idReclamo'];
            
            if (!empty($_POST['prioridad'])) {
                $this->reclamoModel->cambiarPrioridadReclamo($idReclamo, $_POST['prioridad']);
            }

            if (!empty($_POST['responsable'])) {
                $this->reclamoModel->asignarResponsable($idReclamo, $_POST['responsable']);
            }

            header('Location: /reclamos');
            exit;
        }
    }

    public function generarPDF($id) {
        $reclamo = $this->reclamoModel->getById($id);
        $comentarios = $this->reclamoModel->getComentariosByReclamo($id);

        $pdf = new PDFReclamo();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->bloqueDatos($reclamo);
        $pdf->bloqueTexto('Descripción', $reclamo['descripcion']);
        $pdf->bloqueTexto('Impacto', $reclamo['impacto'], [255,245,230]);
        $pdf->bloqueTexto('Solución', $reclamo['solucion'], [240,255,240]);
        $pdf->imprimirComentarios($comentarios);

        $pdf->Output('D','reclamo_'.$reclamo['ID_RECLAMO'].'.pdf');
    }
    


}

?>