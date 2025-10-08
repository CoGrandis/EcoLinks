<?php

class PostController
{
    public function create()
    {
        $tpl = new TemplateMotor("create-post");
        $tpl->printToScreen();
    }

    public function list()
    {
        $tpl = new TemplateMotor("list");
        $tpl->printToScreen();
    }

    public function delete($id)
    {
    }
}
?>