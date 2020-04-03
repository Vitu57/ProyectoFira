<?php
include "../services/conexion.php";
$id_sortida=$_REQUEST['id_s'];
$id_activitat=$_REQUEST['id_a'];
$id_precios=$_REQUEST['id_p'];
$id_contacte=$_REQUEST['id_c'];
$id_transport=$_REQUEST['id_t'];

//eliminamos primero la asistencia
$e_asistencia="delete from tbl_asistencia where id_activitat='".$id_activitat."'";
mysqli_query($conn,$e_asistencia);
//ahora eliminamos la actividad
$e_actividad="delete from tbl_activitat where id_sortida='".$id_sortida."'";
mysqli_query($conn,$e_actividad);
//Ahora el contacto
$e_contacto="delete from tbl_contacte_activitat where id_contacte_activitat='".$id_contacte."'";
mysqli_query($conn,$e_contacto);
//Eliminamos la lista de profesores que van
$e_lista="delete from tbl_lista_profesores where id_excursion='".$id_sortida."'";
mysqli_query($conn,$e_lista);
//Por último, la sortida
$e_sortida="delete from tbl_sortida where id_sortida='".$id_sortida."'";
mysqli_query($conn,$e_sortida);
//Luego el transporte
$e_transporte="delete from tbl_transport where id_transport='".$id_transport."'";
mysqli_query($conn,$e_transporte);
//Seguidamente los precios
$e_precios="delete from tbl_preus where id_preus='".$id_precios."'";
mysqli_query($conn,$e_precios);


header("location:../vista/verexcursionesadmin.php");

?>