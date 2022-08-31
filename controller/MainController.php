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

        if (isset($_GET["actualizarBaseDeDatos"])){

            $actualizacionExitosa = $this->mainModel->actualizarBaseDeDatos($url);
        }

        $data["actualizacionExitosa"] = $actualizacionExitosa;

        $basededatos = $this->mainModel->obtenerInformacionBDD();
        echo $this->render->render("view/inicio.php",$data);
    }


}