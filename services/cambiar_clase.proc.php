<?php
include "../services/conexion.php";

$id=$_REQUEST['id_alumno'];
$clase=$_REQUEST['id_clase'];
$nom=$_REQUEST['nom'];
$cognoms=$_REQUEST['cognom'];
$cognom1="pepe";
$cognom2="pepe";

$consulta="UPDATE `tbl_alumnes` SET `nom_alumne`='$nom',`cognom1_alumne`='$cognom1',`cognom2_alumne`='$cognom2',`id_clase`=$clase WHERE id_alumne=$id";
$consulta2=mysqli_query($conn,$consulta);