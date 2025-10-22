<?php
class SeleccionPersonalController
{
    private $apiUrl = "https://echolink-ia-api.onrender.com";
    private $apiKey = "Lacomunicaionesclave";

    

    // ✅ Subir CVs a la API Flask
    public function subirCV()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['cv']['name'][0])) {
            $files = $_FILES['cv'];
            $curlFiles = [];

            foreach ($files['tmp_name'] as $index => $tmpName) {
                $curlFiles[] = new CURLFile($tmpName, $files['type'][$index], $files['name'][$index]);
            }

            $ch = curl_init("{$this->apiUrl}/api/subir_cv");
            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => ['x-api-key: ' . $this->apiKey],
                CURLOPT_POSTFIELDS => ['cv' => $curlFiles]
            ]);

            $response = curl_exec($ch);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) {
                $mensaje = "❌ Error al conectar con la API: $error";
            } else {
                $data = json_decode($response, true);
                $mensaje = $data['mensaje'] ?? 'Error al procesar respuesta.';
            }

            $tpl = new TemplateMotor("seleccion");
            $tpl->assing([
                "MENSAJE" => $mensaje,
                "CURRICULUM_ACTIVE" => 'active'
            ]);
            $tpl->printToScreen();
        }
        $tpl = new TemplateMotor("seleccion");
            
            $tpl->printToScreen();
    }


    // ✅ Ver resultados desde la API Flask
    public function verResultados()
    {
        $ch = curl_init("{$this->apiUrl}/api/resultados_filtrado");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['x-api-key: ' . $this->apiKey]
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
$data = json_decode($response, true);
var_dump($data);
exit;
        $tpl = new TemplateMotor("resultados");
        $current_page = basename($_SERVER['REQUEST_URI']);

        if ($error) {
            $tpl->assing([
                "ERROR" => "Error al conectar con la API: $error",
                "SELECCION_ACTIVE" => 'active'
            ]);
        } else {
            $data = json_decode($response, true);
            $tpl->assing([
                "RESULTADOS" => $data['resultados'] ?? [],
                "SELECCION_ACTIVE" => 'active'
            ]);
        }

        $tpl->printToScreen();
    }
}
?>
