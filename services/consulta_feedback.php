<?php
include "conexion.php";

 $id_sortida=$_REQUEST['id_sortida'];
 $stars=$_REQUEST['stars'];
 $comentaris=$_REQUEST['text'];
 $fecha=$_REQUEST['today'];
 $nom=$_REQUEST['nom'];
 $cognom=$_REQUEST['cognom'];
 $nomcogn=$nom." ".$cognom;
 
$consultafeedback="INSERT INTO `tbl_feedback`(`estrellas`, `usuario`, `comentarios`, `fecha`, `id_sortida`) VALUES (?, ?, ?, ?, ?)";
if($stmt = mysqli_prepare($conn, $consultafeedback)){
    mysqli_stmt_bind_param($stmt, "isssi", $stars, $nomcogn , $comentaris, $fecha, $id_sortida);
    mysqli_stmt_execute($stmt);
}
//
?>