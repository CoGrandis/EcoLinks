<?php
require_once __DIR__ . '../../model/EmpleadoModel.php';
require_once __DIR__ . '../../model/DocumentoModel.php';
require_once __DIR__ . '../../services/UploadService.php';

class DocumentosController{
    private $documentosModel;

    public function __construct() {
        $this->documentosModel = new DocumentosModel();
    }


    public function misDocumentos(){
        $empleadoModel = new EmpleadoModel();
        
        $empleado = $empleadoModel->getEmpleadosById($_SESSION['user']['FK_ID_EMPLEADO']);

        $documentos = $this->documentosModel->getByEmpleado($_SESSION['user']['FK_ID_EMPLEADO']);
        $tpl = new TemplateMotor("mis-documentos");
        $tpl->assing([
            "PROFILE_ACTIVE" => 'active',
            "EMPLOYEE_NAME" => $empleado['Nombre'] . " " . $empleado['Apellido'],
            "EMPLOYEE_POSITION" => $empleado['Puesto'] ?? 'Sin asignar',
            "DOCUMENTOS" => $documentos
        ]);

        $tpl->printToScreen();
    }


    public function subirDocumentos(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_FILES['files']['name'][0])) {
                $uploadService = new UploadService();
                $uploadedFiles = $uploadService->uploadFiles($_FILES['files']);
                foreach ($uploadedFiles as $file) {
                    $this->documentosModel->insertarDocumento( $_SESSION['user']['FK_ID_EMPLEADO'],$file['filename'], $file['filepath']);
                    
                }
            }

            header('Location: /documentos');
            exit;
        }
    }
    public function eliminarDocumento() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_documento'])) {
            $id = $_POST['id_documento'];
            $doc = $this->documentosModel->getDocumentoById($id);

            if ($doc && file_exists($doc['ruta'])) {
                unlink($doc['ruta']); // elimina archivo
            }

            $this->documentosModel->eliminarDocumento($id);
            header('Location: /documentos');
            exit;
        }
    }

}

?>