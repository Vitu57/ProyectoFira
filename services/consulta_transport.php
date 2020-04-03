<?php
include "conexion.php";

 $transport=$_REQUEST['transport'];
$consultaexcursion="SELECT * FROM tbl_transport inner join tbl_nom_transport on tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport where tbl_transport.id_transport=$transport";
//ejecutamos la consulta
$consulta=mysqli_query($conn,$consultaexcursion);

$excursiones=array();
while($row = mysqli_fetch_assoc($consulta)){
    $excursiones[]=$row;
    
  }
 print json_encode($excursiones);
?>