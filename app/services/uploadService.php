<?php
/*
 * Servicio para subir archivos
 */
class UploadService {
    private $baseDir ;

    public function __construct ($baseDir = 'uploads/') {
        $this->baseDir = rtrim($baseDir, '/') . '/';
        if (!is_dir($this->baseDir)) {
            mkdir($this->baseDir, 0777, true);
        }
    }

    public function upload($files, $folder) {
    $uploadedFiles = [];
    $uploadPath = $this->baseDir . trim($folder, '/') . '/';

    if (!is_dir($uploadPath)) mkdir($uploadPath, 0777, true);

    foreach ($files['name'] as $key => $name) {
        $tmpName = $files['tmp_name'][$key];
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        // Generamos un nombre único para evitar colisiones
        $uniqueName = uniqid() . "." . $ext;
        $destination = $uploadPath . $uniqueName;

        if (move_uploaded_file($tmpName, $destination)) {
            $uploadedFiles[] = [
                'filename' => $name,         // el nombre original
                'filepath' => $destination   // la ruta completa donde se guardó
            ];
        }
    }

    return $uploadedFiles;
    }

}

?>