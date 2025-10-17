<?php
require_once __DIR__.'/../../app/services/EcholinkIAService.php';
class APIController
{
     public function subirCV()
    {
         if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $tmpPath = $file['tmp_name'];
            $service = new EcholinkIAService();

            try {
                $result = $service->analizarArchivo($tmpPath);
                // Muestra la respuesta del análisis
                echo "<h3>Resultado del análisis:</h3>";
                echo "<pre>" . htmlspecialchars(print_r($result, true)) . "</pre>";
            } catch (Exception $e) {
                echo "<h3>Error:</h3> " . htmlspecialchars($e->getMessage());
            }
         }

    }
    public function formCV()
    {
	    $tpl = new TemplateMotor("subir-cv");
        $tpl->printToScreen();
    }
}
