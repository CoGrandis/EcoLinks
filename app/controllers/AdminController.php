
<?php
class AdminController
{

    public function dashboard()
    {
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl = new TemplateMotor("admin-dashboard");
        $tpl->assing(["DASHBOARD_ACTIVE" => (strpos($current_page, 'dashboard') !== false) ? 'active' : '']);
        $tpl->printToScreen();
    }
    public function news()
    {
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl = new TemplateMotor("muro");
        $tpl->assing(["NEWS_ACTIVE" => (strpos($current_page, 'news') !== false) ? 'active' : '']);
        $tpl->printToScreen();
    }
    public function employee()
    {
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl = new TemplateMotor("employee-form");
        $tpl->assing(["EMPLOYEES_ACTIVE" => (strpos($current_page, 'employee') !== false) ? 'active' : '']);
        $tpl->printToScreen();
    }


}
// ?>