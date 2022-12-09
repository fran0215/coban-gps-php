<?php
include "config/DataBase.php";

$db = new DataBase();

$db->getConnection();


// echo $db->insertOnTable();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <title>Fran Server On</title>
</head>
<body>
  <h1>SERVER IS RUNNING!</h1>
  <button type="submit" onclick="getLocations(868166051280915)">Moto1</button>
  <div class="info" id="info">
  <p>Locations</p>
  </div>
</body>
<script>
  function getLocations(imei) {
    $.ajax({
        type: 'POST',
        url: "api.php",
        dataType: 'json',
        data: {
            'op': 'getLocation',
            'imei': imei
        },
        success: function (resp) {
          console.log(resp);
          imei = resp.imei
          latitud = resp.latitud
          longitud = resp.longitud
          speed = resp.speed
          html = `
          <h1>MOTOCICLETA</h1>
          <p>IMEI: ${imei}</p>
          <p>Longitud: ${longitud}</p>
          <p>Latidus: ${latitud}</p>
          <p>Velocidad ${speed} km/h</p>
          `
          $('#info').html(html)
           console.log(resp);
        }
    })
  }
</script>
</html>








