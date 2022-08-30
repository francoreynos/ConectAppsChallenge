<?php


class MainModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addTask($name){
        $sql = "INSERT INTO to_do (name, created_at, status, active)
                VALUES ('" .$name . "', curdate(), 0, 1)";
        return $this->database->query($sql);
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

    public function getAllNotCompletedTasks(){
        $sql = 'SELECT * FROM to_do WHERE status = 0 and active = 1';

        $table = $this->database->query($sql);
        $datos = array();
        while ($fila = $table->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function getAllDeletedTasks(){
        $sql = 'SELECT * FROM to_do WHERE active = 0';

        $table = $this->database->query($sql);
        $datos = array();
        while ($fila = $table->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function checkTask($id,$status){
        $sql = 'UPDATE to_do SET status = "' . $status . '", completed_at = curdate() WHERE id = ' . $id;

        return $this->database->query($sql);
    }

    public function uncheckTask($id){
        $sql = 'UPDATE to_do SET status = 0, completed_at = NULL WHERE id = ' . $id;

        return $this->database->query($sql);
    }

    public function deleteTask($id){

        $sql = 'UPDATE to_do SET active = 0 WHERE id = ' . $id;

        return $this->database->query($sql);
    }


}