<?php


class BDDJsonController
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


            $jsonBDD = json_encode($existeBaseDeDatos);

            $data["jsonBDD"] = $jsonBDD;
        }

        echo $this->render->render("view/jsonBDD.php", $data);
    }


}