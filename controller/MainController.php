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

        $url = "https://jsonplaceholder.typicode.com/posts";

        $this->mainModel->actualizarBaseDeDatos($url);
        echo $this->render->render("view/inicio.php");
    }

}