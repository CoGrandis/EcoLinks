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
    public function uploadFiles($files) {
        $uploadedFiles = [];
        $count=0;
        foreach ($files['name'] as $filename) 
        {
            $temp=$this->baseDir;
            $tmp=$files['tmp_name'][$count];
            $count=$count + 1;
            $temp=$temp.basename($filename);

            if(move_uploaded_file($tmp,$temp)){
                $uploadedFiles[] = [
                    'filename' => $filename,
                    'filepath' => $temp
                ];
            }
            $temp='';
            $tmp='';
        }
        return $uploadedFiles;


    }

}

?>