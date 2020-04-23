<?php
include "../services/conexion.php";

$id=$_REQUEST['id_user'];
$nombre = $_REQUEST['clase'];

$consulta="SELECT tbl_clase_user.id_clase_usuari FROM tbl_clase_user INNER JOIN tbl_clase ON tbl_clase_user.id_clase=tbl_clase.id_clase WHERE tbl_clase.nom_classe='$nombre' AND tbl_clase_user.id_usuari='$id'";

	$exe=mysqli_query($conn,$consulta);

    $casos=mysqli_fetch_array($exe);

       $id_clase=$casos['id_clase_usuari'];


$consulta="DELETE FROM tbl_clase_user WHERE id_clase_usuari='$id_clase'";

	$exe=mysqli_query($conn,$consulta);

	header("location: ../vista/admin_prof.php");