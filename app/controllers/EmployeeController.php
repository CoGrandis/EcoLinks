<?php

class EmployeeController {
    public function register() {
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl = new TemplateMotor("employee-form");
        $tpl->assing(["EMPLOYEES_ACTIVE" => (strpos($current_page, 'employee') !== false) ? 'active' : '']);
        $tpl->printToScreen();
    }
}
?>