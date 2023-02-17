
<?php
 
$valores = array();
$max_num = 10;

for ($i=0; $i < 99 ; $i++) { 
  if ($i < 10) {
    echo `<h3 style="padding: 10px; marging: 10px; border: 1px solid; ">0$i</h3>`;
  }else{
    echo `<h3 style="padding: 10px; marging: 10px; border: 1px solid; ">$i</h3>`;
  }
}
 
for ($x=0;$x<$max_num;$x++) {
  $num_aleatorio = rand(1,10);
  array_push($valores,$num_aleatorio);
  $max=max($valores);
  // echo $valores[$x]."<br/>";
}
// echo "El número mayor es: ".$max."</br>";
 
 
?>







