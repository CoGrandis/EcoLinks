<?php
require __DIR__ . '/../model/EmpleadoModel.php';
    
class EmployeeController {
    private $empleadoModel;

    public function __construct() {
        $this->empleadoModel = new EmpleadoModel();
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
                header("Location: /admin/employee");
                exit;
            } else {
                echo "Error al registrar el empleado.";
            }
        }
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl = new TemplateMotor("employee-form");
        $tpl->assing(["EMPLOYEES_ACTIVE" => (strpos($current_page, 'employee') !== false) ? 'active' : '']);
        $tpl->printToScreen();
    }

    public function list() {
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl = new TemplateMotor("employee-list");
        $tpl->assing([
            "EMPLOYEES_ACTIVE" => (strpos($current_page, 'employee') !== false) ? 'active' : '',
        ]);
        $tpl->printToScreen();
    }
}
?>