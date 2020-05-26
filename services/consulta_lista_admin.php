<?php
include "conexion.php";
$id_activitat=$_REQUEST['id_activitat'];
$consultalista="select tbl_alumnes.cognom1_alumne,tbl_alumnes.cognom2_alumne,tbl_alumnes.nom_alumne,tbl_clase.nom_classe,tbl_asistencia.estado_asistencia from tbl_clase inner join tbl_alumnes on tbl_clase.id_clase=tbl_alumnes.id_clase inner join tbl_asistencia on tbl_alumnes.id_alumne=tbl_asistencia.id_usuario where tbl_asistencia.id_activitat='".$id_activitat."'";
$querylista=mysqli_query($conn,$consultalista);
$lista=array();
while($row = mysqli_fetch_assoc($querylista)){
    $lista[]=$row;
    
  }
 print json_encode($lista);
?>