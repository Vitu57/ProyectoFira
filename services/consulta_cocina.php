<?php
include "conexion.php";
//Primero hacemos una consulta para saber las excursiones
$consultaexcursion="select tbl_sortida.id_sortida,tbl_sortida.codi_sortida,tbl_activitat.nom_activitat,tbl_sortida.inici_sortida,tbl_sortida.final_sortida,tbl_sortida.comanda_menu,tbl_clase.nom_classe,tbl_etapa.nom_etapa,tbl_sortida.n_acompanyants,tbl_sortida.numero_alumnes,tbl_sortida.profesor_asignat,tbl_sortida.n_vetlladors,tbl_sortida.id_clase,tbl_sortida.id_sortida from tbl_etapa inner join tbl_clase on tbl_etapa.id_etapa=tbl_clase.id_etapa inner join tbl_sortida on tbl_clase.id_clase=tbl_sortida.id_clase inner join tbl_activitat on tbl_sortida.id_sortida=tbl_activitat.id_sortida";
//ejecutamos la consulta
$consulta=mysqli_query($conn,$consultaexcursion);

$excursiones=array();
while($row = mysqli_fetch_assoc($consulta)){
    $excursiones[]=$row;
    
  }
 print json_encode($excursiones);
?>