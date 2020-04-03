<?php
include "conexion.php";

 $actividad=$_REQUEST['actividad'];
$consultaexcursion="SELECT * FROM tbl_activitat where id_activitat=$actividad";
//ejecutamos la consulta
$consulta=mysqli_query($conn,$consultaexcursion);

$excursiones=array();
while($row = mysqli_fetch_assoc($consulta)){
    $excursiones[]=$row;
    
  }
 print json_encode($excursiones);
?>