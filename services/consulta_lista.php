<?php
include "conexion.php";

$nlistas=0;
$id_activitat=$_REQUEST['id_activitat'];
$clase=$_REQUEST['clase'];
$comprobarlista="select * from tbl_asistencia where id_activitat='".$id_activitat."'";
$querycomprobarlista=mysqli_query($conn,$comprobarlista);
while ($listas=mysqli_fetch_array($querycomprobarlista)) {
	$nlistas=1;
}
if ($nlistas==0) {
//Si no esta creada, hay que cerearla y mostrarla
	$usuariosdeclase="select tbl_usuari.id_usuari from tbl_usuari inner join tbl_clase on tbl_usuari.id_clase=tbl_clase.id_clase where tbl_clase.nom_classe='".$clase."' and tbl_usuari.id_tipus_usuari=7";
	$queryalumnos=mysqli_query($conn,$usuariosdeclase);
	while ($alumno=mysqli_fetch_array($queryalumnos)) {
		$insert="insert into tbl_asistencia (estado_asistencia,id_usuario,id_activitat) values ('Present',".$alumno[0].",".$id_activitat.")";
		$queryinsert=mysqli_query($conn,$insert);
	}
}
$lista="select tbl_usuari.id_usuari, tbl_usuari.cognom_usuari,tbl_usuari.nom_usuari,tbl_asistencia.estado_asistencia from tbl_usuari inner join tbl_asistencia on tbl_usuari.id_usuari=tbl_asistencia.id_usuario where tbl_asistencia.id_activitat='".$id_activitat."'";
$querylista=mysqli_query($conn,$lista);

$lista=array();
while($row = mysqli_fetch_assoc($querylista)){
    $lista[]=$row;
    
  }
 print json_encode($lista);
?>