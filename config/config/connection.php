<?php
// Conexion a la base de datos usando PDO
class Database {
    // Variables para la configuración de la base de datos
    private $host = "localhost";    
    private $db_name = "u214138677_eco"; 
    private $username = "u214138677_ecoadmin";     
    private $password = "COnatiz@25Dra";         
    private $conn;

    // Obtener la conexión PDO
    public function getConnection(): PDO {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO(
                    "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                    $this->username,
                    $this->password
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}
?>