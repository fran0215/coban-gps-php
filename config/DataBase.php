<?php 


class DataBase
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "FJ990215";
    private $database = "";
    function _construct(){

    }
    
    function getConnection(){
        $conn = new mysqli($this->host, $this->user, $this->pass, "tracker_dev");

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";
        return $conn;
    }

    function insertOnTable($table, $columns, $values){
        $conn = $this->getConnection();
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO $table ($columns)
        VALUES ($values)";

        if ($conn->query($sql) === TRUE) {
        return json_encode(["error" => 0, "mensaje" => "Inserted"]);
        } else {
            return json_encode(["error" => 1, "mensaje" => $conn->error]);
        }

        $conn->close();

    }

    function getFromQuery(){

    }

}













?>