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
    
    default:
        # code...
        break;
}

















?>