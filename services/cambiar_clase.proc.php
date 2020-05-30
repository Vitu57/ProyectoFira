<?php
include "../services/conexion.php";

$id=$_REQUEST['id_alumno'];
$clase=$_REQUEST['id_clase'];
$nom=$_REQUEST['nom'];
$cognoms=$_REQUEST['cognom'];
if(str_word_count($cognoms, 0)==2){
        list($cognom1, $cognom2) = explode(' ', $cognoms);
        }else{
            $cognom1 = $cognoms;
            $cognom2 = "-";
        }

$consulta="UPDATE `tbl_alumnes` SET `nom_alumne`='$nom',`cognom1_alumne`='$cognom1',`cognom2_alumne`='$cognom2',`id_clase`=$clase WHERE id_alumne=$id";
$consulta2=mysqli_query($conn,$consulta);