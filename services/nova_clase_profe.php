<?php
include "../services/conexion.php";

$id=$_REQUEST['id_user'];
$nombre = $_REQUEST['clase'];

$consulta="SELECT id_clase FROM tbl_clase WHERE nom_classe='$nombre'";

	$exe=mysqli_query($conn,$consulta);

    $casos=mysqli_fetch_array($exe);

       $id_clase=$casos['id_clase'];




$consulta="SELECT id_clase_usuari FROM tbl_clase_user WHERE id_usuari='$id' AND id_clase='$id_clase'";

	$exe=mysqli_query($conn,$consulta);

    $casos=mysqli_fetch_array($exe);

    $id_clase_user=$casos['id_clase_usuari'];


 if ($id_clase_user=="") {

$consulta="INSERT INTO tbl_clase_user (id_clase, id_usuari) VALUES ('$id_clase', '$id')";

	$exe=mysqli_query($conn,$consulta);
}	

	header("location: ../vista/admin_prof.php");