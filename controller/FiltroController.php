<?php

class FiltroController
{
    private $render;

    public function __construct($render, $mainModel)
    {
        $this->render = $render;
        $this->mainModel = $mainModel;
    }

    public function execute()
    {

        $existeBaseDeDatos = $this->mainModel->obtenerInformacionBDD();

        if (isset($existeBaseDeDatos)) {
            $data["tablaDatos"] = $existeBaseDeDatos;
            $data["cargaExitosa"] = true;
            $data["todosLosId"] = $this->mainModel->obtenerTodosLosId();

            if (isset($_GET["select"])){

                $id = $_GET["select"];

                $data["tablaDatos"] = $this->mainModel->filtrarPorId($id);

                $data["tablaDatosJson"] = json_encode( $data["tablaDatos"] );

            }

            echo $this->render->render("view/filtro.php", $data);
        }
        else {
            echo $this->render->render("view/inicio.php");
        }


    }


}