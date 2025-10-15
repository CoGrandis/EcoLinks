    <?php
    /** 
     * EmpleadoModel.php
     * Modelo para manejar los datos de los empleados.
     * 
    */
    require_once __DIR__ . '/../../config/connection.php';
    class EmpleadoModel{
        
        private $conn; 
    <?php
    /** 
     * EmpleadoModel.php
     * Modelo para manejar los datos de los empleados.
     * 
    */
    require_once __DIR__ . '/../../config/connection.php';
    class EmpleadoModel{
        
        private $conn; 

        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
        }
        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function getAllEmpleados(){
            $query = $this->conn->prepare("SELECT * FROM empleado");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getAllEmpleados(){
            $query = $this->conn->prepare("SELECT * FROM empleado");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getEmpleadosById($id){
            $query = $this->conn->prepare("SELECT e.*, d.departamento AS Departamento, p.puesto AS Puesto FROM empleado e LEFT JOIN departamento d ON e.FK_ID_DEPARTAMENTO = d.ID_DEPARTAMENTO LEFT JOIN puesto p ON e.FK_ID_PUESTO = p.ID_PUESTO WHERE ID_EMPLEADO = :id");
            $query->bindParam(':id', $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        public function getEmpleadosById($id){
            $query = $this->conn->prepare("SELECT e.*, d.departamento AS Departamento, p.puesto AS Puesto FROM empleado e LEFT JOIN departamento d ON e.FK_ID_DEPARTAMENTO = d.ID_DEPARTAMENTO LEFT JOIN puesto p ON e.FK_ID_PUESTO = p.ID_PUESTO WHERE ID_EMPLEADO = :id");
            $query->bindParam(':id', $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function delete($id) {
            $query = $this->conn->prepare("DELETE FROM empleado WHERE ID_EMPLEADO = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            return $query->execute();
        }
        public function searchEmpleado($search){
        $query = $this->conn->prepare("SELECT e.*, d.departamento AS Departamento, p.puesto AS Puesto FROM empleado e LEFT JOIN departamento d ON e.FK_ID_DEPARTAMENTO = d.ID_DEPARTAMENTO LEFT JOIN puesto p ON e.FK_ID_PUESTO = p.ID_PUESTO WHERE e.Nombre LIKE :search OR e.Apellido LIKE :search");
        $searchParam = "%".$search."%";
        $query->bindParam(':search', $searchParam);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


        public function register($form){
            $query = $this->conn->prepare("INSERT INTO empleado (`Nombre`, `Apellido`, `Email`, `FechaNacimiento`, `Direccion`, `FechaContratacion`, `FK_ID_DEPARTAMENTO`,`FK_ID_PUESTO`) VALUES (:name, :surname, :email, :dateBirth, :address, :hiringDate, :department, :position)");
            $query->bindParam(':name', $form['name'] );
            $query->bindParam(':surname', $form['surname'] );
            $query->bindParam(':email', $form['email'] );
            $query->bindParam(':dateBirth', $form['dateBirth'] );
            $query->bindParam(':address', $form['address'] );
            $query->bindParam(':hiringDate', $form['hiringDate'] );
            $query->bindParam(':department', $form['department'] );
            $query->bindParam(':position', $form['position'] );
            
            return $query->execute();
        }

            public function update($form) {
            $query = $this->conn->prepare("
                UPDATE empleado SET 
                    Nombre = :name, 
                    Apellido = :surname, 
                    Email = :email, 
                    FechaNacimiento = :dateBirth, 
                    Direccion = :address, 
                    FechaContratacion = :hiringDate, 
                    Estado = :estado, 
                    FK_ID_DEPARTAMENTO = :department, 
                    FK_ID_PUESTO = :position 
                WHERE ID_EMPLEADO = :id
            ");

            $query->bindParam(':id', $form['id'], PDO::PARAM_INT);
            $query->bindParam(':name', $form['name']);
            $query->bindParam(':surname', $form['surname']);
            $query->bindParam(':email', $form['email']);
            $query->bindParam(':dateBirth', $form['dateBirth']);
            $query->bindParam(':address', $form['address']);
            $query->bindParam(':hiringDate', $form['hiringDate']);
            $query->bindParam(':estado', $form['estado']);
            $query->bindParam(':department', $form['department']);
            $query->bindParam(':position', $form['position']);

            return $query->execute();
        }
    }   

    ?>
    ?>