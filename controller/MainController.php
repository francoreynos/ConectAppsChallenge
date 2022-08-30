<?php

class MainController
{
    private $render;

    public function __construct($render,$mainModel)
    {
        $this->render = $render;
        $this->mainModel = $mainModel;
    }

    public function execute()
    {
        $data["completedTasks"] = 0;
        echo $this->render->render("view/inicio.php",$data);
    }

}