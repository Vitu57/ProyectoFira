<?php
include "../services/conexion.php";

$id=$_REQUEST['id_alumno'];

$consulta2="DELETE FROM `tbl_pares_alumnes` WHERE id_alumne=$id";
$consulta3="DELETE FROM `tbl_alumnes` WHERE id_alumne=$id";
$consulta="DELETE FROM `tbl_asistencia` WHERE id_usuario=$id";
echo $consulta;
	$exe=mysqli_query($conn,$consulta);
	$exe=mysqli_query($conn,$consulta2);
	$exe=mysqli_query($conn,$consulta3);