<?php
require __DIR__ . '/../model/EmpleadoModel.php';
require __DIR__ . '/../model/PositionModel.php';
require __DIR__ . '/../model/DepartmentModel.php';
class EmployeeController {
    private $empleadoModel;
    private $positionModel;
    private $departmentModel;

    public function __construct() {
        $this->empleadoModel = new EmpleadoModel();
        $this->positionModel = new PositionModel();
        $this->departmentModel = new DepartmentModel();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = bin2hex(random_bytes(32));
            $form = [
                "name" => $_POST['name'],
                "surname" => $_POST['surname'],
                "email" => $_POST['email'],
                "dateBirth" => $_POST['dateBirth'],
                "address" => $_POST['address'],
                "hiringDate" => $_POST['hiringDate'],
                "department" => $_POST['department'],
                "position" => $_POST['position'],
                "token" => $token
            ];

            $insertedId = $this->empleadoModel->register($form);

            if ($insertedId) {
                header("Location: /admin/employee/register");
                exit;
            } else {
                echo "Error al registrar el empleado.";
            }
        }
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl = new TemplateMotor("employee-form");
        // Obtener puestos para el select
        $positions = $this->positionModel->getAll();
        $optionsHTML = "";
        foreach ($positions as $pos) {
            $optionsHTML .= "<option value='{$pos['ID_PUESTO']}'>{$pos['puesto']}</option>";
        }

        //Obterner departamentos para el select
        $departments = $this->departmentModel->getAll();
        $optionsDepartmentHTML = "";
        foreach ($departments as $dept) {
            $optionsDepartmentHTML .= "<option value='{$dept['ID_DEPARTAMENTO']}'>{$dept['departamento']}</option>";
        }

        
        $tpl->assing(["EMPLOYEES_ACTIVE" => (strpos($current_page, 'register') !== false) ? 'active' : '' ]);
        $tpl->assing([
            "POSITION_OPTIONS" => $optionsHTML,
            "DEPARTMENT_OPTIONS" => $optionsDepartmentHTML
        ]);
        $tpl->printToScreen();
    }

    public function list() {
        $employees = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['search'] ?? '';
            $employees = $this->empleadoModel->searchEmpleado($search);
        } else {
            $employees = $this->empleadoModel->getAllEmpleados();
        }

        $current_page = basename($_SERVER['REQUEST_URI']);

       
        $tpl = new TemplateMotor("lista");
        $tpl->assing([
            "EMPLOYEES_ACTIVE" => (strpos($current_page, 'empleados') !== false) ? 'active' : '',
            "employees" => $employees
        ]);
        $tpl->printToScreen();
    }

    public function profile(){
        $empleadoModel = new EmpleadoModel();
        
        $id = $_SESSION['user']['FK_ID_EMPLEADO'];
        $empleado = $empleadoModel->getEmpleadosById($id);

        // Cargar plantilla con datos
        $tpl = new TemplateMotor("perfil");
        $tpl->assing([
            "EMPLOYEE_NAME" => $empleado['Nombre'] . " " . $empleado['Apellido'],
            "EMPLOYEE_POSITION" => $empleado['Puesto'] ?? 'Sin asignar',
            "EMPLOYEE_DEPARTMENT" => $empleado['Departamento'] ?? 'No asignado',
            "EMPLOYEE_HIRING_DATE" => $empleado['FechaContratacion']?? '',
            "EMPLOYEE_BIRTH_DATE" => $empleado['FechaNacimiento']?? '',
            "EMPLOYEE_EMAIL" => $empleado['Email']?? '',
            "EMPLOYEE_ADDRESS" => $empleado['Direccion']?? '',
            "EMPLOYEE_STATUS" => $empleado['Estado'] ?? 'Activo'
        ]);

        $tpl->printToScreen();
    }

    public function delete($id) {
        // Lógica para eliminar un empleado
        $empleadoModel = new EmpleadoModel();
        $empleadoModel->delete($id);
        header("Location: /admin/employee");
        exit;
    }   
}   
?>