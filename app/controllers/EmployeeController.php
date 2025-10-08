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
            $form = [
                "name" => $_POST['name'],
                "surname" => $_POST['surname'],
                "email" => $_POST['email'],
                "dateBirth" => $_POST['dateBirth'],
                "address" => $_POST['address'],
                "hiringDate" => $_POST['hiringDate'],
                "department" => $_POST['department'],
                "position" => $_POST['position']
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
        $current_page = basename($_SERVER['REQUEST_URI']);
        $employees = $this->empleadoModel->getAllEmpleados();

        $objectHTML = "";
        foreach ($employees as $emp) {
            $objectHTML .= "<tr
                <td>{$emp['ID_EMPLEADO']}</td>
                <td>{$emp['Nombre']}</td>
                <td>{$emp['Apellido']}</td>
                <td>{$emp['Email']}</td>
            </tr>";
        }
        $tpl = new TemplateMotor("employee-list");
        $tpl->assing([
            "EMPLOYEES_ACTIVE" => (strpos($current_page, 'employee') !== false) ? 'active' : '',
            "EMPLOYEE_LIST" => $objectHTML
        ]);
        $tpl->printToScreen();
    }
}
?>