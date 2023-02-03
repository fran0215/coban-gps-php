<?php

include "config/DataBase.php";

$db = new DataBase;

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
        $usuario = $_POST['usuario'];
        $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
        $values = "'$nombre', '$apellido', '$usuario', '$clave'";
        $table = "user";
        $columns = "nombre, apellido, usuario, clave";
        
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
    default:
        # code...
        break;
}

















?>