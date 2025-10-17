<?php
require_once __DIR__ . '/../../config/connection.php';
class UserModel{
    private $conn; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getByUsername($username){
        $query = $this->conn->prepare("SELECT * FROM usuario WHERE usuario = :username");
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
        $rol = 3;

        // Hash de la contraseña
        $hashedPassword = password_hash($form['password'], PASSWORD_BCRYPT);

        // Insert usuario
        $query = $this->conn->prepare("
            INSERT INTO usuario (usuario, hashContrasenia, FK_ID_ROL, FK_ID_EMPLEADO) 
            VALUES (:usuario, :password, :rol, :empleadoId)
        ");
        $query->bindParam(':usuario', $form['username']);
        $query->bindParam(':password', $hashedPassword);
        $query->bindParam(':rol', $rol);
        $query->bindParam(':empleadoId', $empleado['ID_EMPLEADO']);
        $query->execute();
        if ($query->rowCount() > 0) {
            return ["success" => "Usuario creado exitosamente."];
        } else {
            return ["error" => "Error al crear el usuario."];
        

        }

    }
}


?>