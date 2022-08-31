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



        if (isset($_GET["cargarBaseDeDatos"])) {

            $data["cargaExitosa"] = $this->mainModel->cargarBaseDeDatos($url);
        }


        if (isset($_GET["actualizarBaseDeDatos"])) {

            $data["cargaExitosa"] = $this->mainModel->actualizarBaseDeDatos($url);
        }

        $existeBaseDeDatos = $this->mainModel->obtenerInformacionBDD();

        if (count($existeBaseDeDatos) > 0){
            $data["tablaDatos"] = $existeBaseDeDatos;
            $data["cargaExitosa"] = true;
        } else {
            $data["cargaExitosa"] = false;
        }
        
        echo $this->render->render("view/inicio.php",$data);
    }


}