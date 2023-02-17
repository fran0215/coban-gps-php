<?php

include "../config/DataBase.php";
include "../services/tracker.php";

$db = new DataBase;
$servicio = new Services;
$op = $_POST['op'];

switch (trim($_POST['op'])) {
    case 'getLocation':
        $imei = $_POST['imei'];
        $select = "*";
        $table = "locations";
        $where = "WHERE imei = $imei ORDER BY id DESC limit 1";
        
        $resp = $db->getFromQuery($select, $table, $where);
        echo $resp;
        break;
    
    case 'addUser':
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cc = $_POST['cc'];
        $cel = $_POST['cel'];
        $correo = $_POST['correo'];
        $user = $_POST['usuario'];
        $pass = password_hash($_POST['clave'], PASSWORD_DEFAULT);
        $values = "'$nombre' ,'$apellido' ,'$cc' ,'$cel' ,'$correo' ,'$user' ,'$pass'";
        $table = "user";
        $columns = "nombre, apellido, cc, cel, correo, usuario, clave";
        
        $resp = $db->insertOnTable($table, $columns, $values);
        echo $resp;
        break;

    case 'addDevice':
        $imei = $_POST['imei'];
        $nombre = $_POST['nombre'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $columns = "imei, nombre, modelo, placa";
        $table = "devices";
        $values = "'$imei' , '$nombre', '$modelo', '$placa'";
        
        $resp = $db->insertOnTable($table, $columns, $values);
        echo $resp;
        break;

    case 'addDeviceXUser':
        $user = $_POST['user'];
        $device = $_POST['device'];
        $columns = "user_id, device_id";
        $table = "devices_user";
        $values = "'$user' , '$device'";
        
        $resp = $db->insertOnTable($table, $columns, $values);
        echo $resp;
        break;

    case 'arm':
        $arm = isset($_POST['arm']) ? $_POST['arm'] : NULL ;
        $device = isset($_POST['device']) ? $_POST['device'] : NULL ;
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : NULL ;
        if ($device = NULL || $arm = NULL || $usuario = NULL) {
            $resp = json_encode(["error" => 1, "data" => 'Error: Datos incompletos']);
        }else{
            $resp = $servicio->sendArmCommand($device, $usuario, $arm);
        }
        
        echo $resp;

        break;
    default:
        # code...
        break;
}
