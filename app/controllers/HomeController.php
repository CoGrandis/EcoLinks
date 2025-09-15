<?php

class HomeController
{
    public function index()
    {
	    $tpl = new TemplateMotor("home");
        $tpl->printToScreen();
    }
}
