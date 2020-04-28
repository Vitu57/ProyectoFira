<?php
include '../services/conexion.php';
$alumno=$_REQUEST['id_alumno'];
$activitat=$_REQUEST['id_activitat'];
$consultaporsiacaso="select id_usuario,id_activitat from tbl_asistencia where id_usuario='".$alumno."' and id_activitat='".$activitat."'";
$valor=0;
$queryporsiacaso=mysqli_query($conn,$consultaporsiacaso);
while ($porsiacaso=mysqli_fetch_array($queryporsiacaso)) {
	$valor=1;
}
if ($valor==1) {
	echo "El usuario ya esta metido";
}else{
	$insert="insert into tbl_asistencia (estado_asistencia,id_usuario,id_activitat) values ('Present','".$alumno."','".$activitat."')";
	if ($insert=mysqli_query($conn,$insert)) {
		echo "Alumno insertado correctamente";
	}else{
		echo "No se ha podido insertar el alumno";
	}
}
?>