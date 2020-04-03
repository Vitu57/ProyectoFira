<?php
include "conexion.php";

 $contacte=$_REQUEST['contacte'];
$consultaexcursion="SELECT * FROM tbl_contacte_activitat where id_contacte_activitat=$contacte";
//ejecutamos la consulta
$consulta=mysqli_query($conn,$consultaexcursion);

$excursiones=array();
while($row = mysqli_fetch_assoc($consulta)){
    $excursiones[]=$row;
    
  }
 print json_encode($excursiones);
?>