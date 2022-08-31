<?php


class MainModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function cargarBaseDeDatos($url)
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

    public function actualizarBaseDeDatos($url){

        $informacionJson = file_get_contents($url);

        $datosJson = json_decode($informacionJson, true);

        if (is_array($datosJson)) {
            foreach ($datosJson as $value) {

                $userId = $value["userId"];
                $id = $value["id"];
                $title = $value["title"];
                $body = $value["body"];

                $sql = "UPDATE post 
                SET userId = " . $userId . ", id = " . $id . ", title = '" . $title . "', body = '" . $body . "'
                where id = " . $id;

                $this->database->query($sql);
            }
            return true;
        } else {
            return false;
        }

    }

    public function obtenerInformacionBDD(){

        $sql = 'SELECT * FROM post';

        $table = $this->database->query($sql);
        $datos = array();
        while ($fila = $table->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }


}