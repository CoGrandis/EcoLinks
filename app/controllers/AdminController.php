
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

        public function files()
    {
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl = new TemplateMotor("admin-files");
        $tpl->assing(["FILES_ACTIVE" => (strpos($current_page, 'files') !== false) ? 'active' : '']);
        $tpl->printToScreen();
    }
    public function profile()
    {
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl = new TemplateMotor("perfil");
        $tpl->assing(["PROFILE_ACTIVE" => (strpos($current_page, 'profile') !== false) ? 'active' : '']);
        $tpl->printToScreen();
    }


}
// ?>