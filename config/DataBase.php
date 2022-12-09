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

    function getFromQuery($select, $table, $where){
        $conn = $this->getConnection();
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT $select FROM $table $where";
        error_log($sql);
        $resp = $conn->query($sql);
        if ($resp->num_rows > 0) {
            while($row = $resp->fetch_assoc()) {
                $data = [
                    "imei" => $row['imei'],
                    "latitud" => $row['latitude'],
                    "longitud" => $row['longitude'],
                    "speed" => $row['speed'],
                    "event_type" => $row['event_type'],
                ];
                return json_encode($data);
              }
            return json_encode(["error" => 0, "mensaje" => $data]);
        } else {
            return json_encode(["error" => 1, "mensaje" => $conn->error]);
        }

        $conn->close();
    }

}













?>