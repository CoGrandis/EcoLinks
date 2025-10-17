<?php
class EcholinkIAService
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = 'https://echolink-ia-api.onrender.com/api/subir_cv'; // Ajustar si hay una ruta /analyze o similar
    }

    public function analizarArchivo($filePath)
    {
        if (!file_exists($filePath)) {
            throw new Exception("Archivo no encontrado: $filePath");
        }

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                'file' => new CURLFile($filePath, mime_content_type($filePath), basename($filePath))
            ],
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
               'x-api-key: clave-secreta' ,
            ],
            CURLOPT_TIMEOUT => 60
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception("Error cURL: $error");
        }

        curl_close($ch);

        $json = json_decode($response, true);
        if ($httpCode >= 200 && $httpCode < 300 && $json !== null) {
            return $json;
        } else {
            throw new Exception("Error API ($httpCode): $response");
        }
    }

    public function analizarEncuesta(){

    }
}
