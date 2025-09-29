<?php

class EmployeeController {
    public function register() {
        $tpl = new TemplateMotor("employee-form");
        $tpl->printToScreen();
    }
}
?>