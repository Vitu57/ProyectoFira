<?php
include "conexion.php";
//Primero hacemos una consulta para saber las excursiones
	if(isset($_REQUEST['fecha'])){
	$fecha=$_REQUEST['fecha'];
}else{
	$fecha="";
}
if(isset($_REQUEST['clase'])){
	$clase=$_REQUEST['clase'];
}else{
	$clase="";
}
if(isset($_REQUEST['profe'])){
	$profe=$_REQUEST['profe'];
}else{
	$profe="";
}
if(isset($_REQUEST['jornada'])){
  $jornada=$_REQUEST['jornada'];
}else{
  $jornada="";
}
if(isset($_REQUEST['etapa'])){
  $etapa=$_REQUEST['etapa'];
}else{
  $etapa="";
}
if(isset($_REQUEST['codi'])){
  $codi=$_REQUEST['codi'];
}else{
  $codi="";
}

$consultaexcursion="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_contacte_activitat ON tbl_contacte_activitat.id_contacte_activitat=tbl_activitat.id_contacte_activitat INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa where tbl_sortida.inici_sortida like '%".$fecha."%' and tbl_clase.nom_classe like '%".$clase."%' and tbl_sortida.profesor_asignat like '%".$profe."%' and tbl_sortida.codi_sortida like '%".$codi."%' and tbl_etapa.nom_etapa like '%".$etapa."%'and tbl_activitat.jornada_activitat like '%".$jornada."%' ";
//ejecutamos la consulta
?><?php
$consulta=mysqli_query($conn,$consultaexcursion);

$excursiones=array();
while($row = mysqli_fetch_assoc($consulta)){
    $excursiones[]=$row;
    
  }
 print json_encode($excursiones);
?>