<?php


class MainModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function actualizarBaseDeDatos($url)
    {

        $informacionJson = file_get_contents($url);

        $datosJson = json_decode($informacionJson, true);

        if (is_array($datosJson)) {
            foreach ($datosJson as $value) {

                $userId = $value["userId"];
                $id = $value["id"];
                $title = $value["title"];
                $body = $value["body"];

                $sql = "INSERT INTO post (userId, id, title, body)
                VALUES (" . $userId . ", " . $id . ", '" . $title . "', '" . $body . "')";

                $this->database->query($sql);
            }
            return true;
        } else {
            return false;
        }
    }

    public function obtenerInformacionBDD(){
        $sql = 'SELECT * FROM to_do WHERE status = 1 and active = 1';

        $table = $this->database->query($sql);
        $datos = array();
        while ($fila = $table->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }


}