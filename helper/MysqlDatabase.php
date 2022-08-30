<?php

class MysqlDatabase
{
    private $connection;

    public function __construct($servername, $username, $password, $dbname)
    {
        $conn = mysqli_connect(
            $servername,
            $username,
            $password,
            $dbname
        );

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $this->connection = $conn;
    }

    public function execute($sql)
    {
        mysqli_query($this->connection, $sql);
    }

    public function query($sql)
    {
       $data=$this->connection->query($sql);
       return $data;
    }

}