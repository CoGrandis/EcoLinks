<?php

class ErrorController
{
    public function error404()
    {
	    $tpl = new TemplateMotor("error");
        $tpl->printToScreen();
    }
}
