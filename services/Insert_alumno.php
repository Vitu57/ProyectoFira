<?php
include "../services/conexion.php";


$clase=$_REQUEST['clase'];
$nom=$_REQUEST['nom'];
$cognoms=$_REQUEST['cognom'];
if(str_word_count($cognoms, 0)==2){
        list($cognom1, $cognom2) = explode(' ', $cognoms);
        }else{
            $cognom1 = $cognoms;
            $cognom2 = "-";
        }

$consulta="INSERT INTO `tbl_alumnes`( `nom_alumne`, `cognom1_alumne`, `cognom2_alumne`, `id_clase`, `siei`) VALUES ('$nom','$cognom1','$cognom2',$clase,'no')";
$consulta2=mysqli_query($conn,$consulta);