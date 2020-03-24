<?php
include "conexion.php";
//Primero hacemos una consulta para saber las excursiones

$consultaexcursion="SELECT * FROM `tbl_sortida` inner join tbl_activitat on tbl_sortida.id_sortida=tbl_activitat.id_sortida inner join tbl_transport on tbl_transport.id_transport=tbl_sortida.id_transport inner join tbl_nom_transport on tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport inner join tbl_clase on tbl_sortida.id_clase=tbl_clase.id_clase inner join tbl_etapa on tbl_etapa.id_etapa=tbl_clase.id_etapa ";
//ejecutamos la consulta
$consulta=mysqli_query($conn,$consultaexcursion);

$excursiones=array();
while($row = mysqli_fetch_assoc($consulta)){
    $excursiones[]=$row;
    
  }
 print json_encode($excursiones);
?>