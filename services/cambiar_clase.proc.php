<?php
include "../services/conexion.php";

$id=$_REQUEST['id_alumno'];
$clase=$_REQUEST['clase'];
$nom=$_REQUEST['nom'];
$cognom=$_REQUEST['cognom'];
$siei=$_REQUEST['siei'];

$consulta="UPDATE `tbl_alumnes` SET `nom_alumne`=$nom,`cognom1_alumne`=$cognom,`cognom2_alumne`=$cognom2,`id_clase`=$clase,`siei`=$siei WHERE id_alumne=$id"