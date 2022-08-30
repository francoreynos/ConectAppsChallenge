<?php


class MainModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function actualizarBaseDeDatos($url){

        $url = "https://jsonplaceholder.typicode.com/posts";

        $informacionJson = file_get_contents($url);

        $datosJson = json_decode($informacionJson, true);

        foreach ( $datosJson as $data){

            $sql = "INSERT INTO post (userId, id, title, body)
                VALUES (" . $data["userId"] . ", " . $data["id"] . ", " . $data["title"] . ", " . $data["body"] . ")";
            $this->database->query($sql);
        }

        return true;
    }

    public function addTask($name){

    }

    public function getAllCompletedTasks(){
        $sql = 'SELECT * FROM to_do WHERE status = 1 and active = 1';

        $table = $this->database->query($sql);
        $datos = array();
        while ($fila = $table->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }


}