<?php
require_once __DIR__ . '/../../config/connection.php';
class UserModel{
    private $conn; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getByUsername($username){
        $query = $this->conn->prepare("SELECT * FROM usuario WHERE usuario = :usuario");
        $query->bindParam(':username', $username);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function create($form) {
        // Verificar credencial
        $query = $this->conn->prepare("SELECT * FROM empleado WHERE ID_EMPLEADO = :id");
        $query->bindParam(':id', $form['credential']);
        $query->execute();
        $empleado = $query->fetch(PDO::FETCH_ASSOC);

        if (!$empleado) {
            return ["error" => "Credencial inválida. El empleado no existe."];
        }

        // Asignar rol según departamento
        $rol = ($empleado['FK_ID_DEPARTAMENTO'] == 1) ? 2 : 3;

        // Hash de la contraseña
        $hashedPassword = password_hash($form['password'], PASSWORD_BCRYPT);

        // Insert usuario
        $query = $this->conn->prepare("
            INSERT INTO usuario (usuario, hashContraseña, FK_ID_ROL, FK_ID_EMPLEADO) 
            VALUES (:usuario, :contraseña, :rol, :empleadoId)
        ");
        $query->bindParam(':usuario', $form['usuario']);
        $query->bindParam(':contraseña', $hashedContraseña);
        $query->bindParam(':rol', $rol);
        $query->bindParam(':empleadoId', $empleado['ID_EMPLEADO']);

        if ($query->execute()) {
            return $query->execute();
        }

    }
}



?>