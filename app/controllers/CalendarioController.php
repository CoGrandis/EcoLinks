<?php

class CalendarioController
{
    public function calendario()
    {
	    $tpl = new TemplateMotor("calendario");
        $tpl->printToScreen();
    }
}
