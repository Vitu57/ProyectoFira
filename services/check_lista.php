<?php
include "conexion.php";
  $id=$_REQUEST["id"];
  $estado=$_REQUEST["estado"];

if($estado=="Absent"){
    $sql= mysqli_query($conn, "UPDATE `tbl_asistencia` SET `estado_asistencia`='Present' WHERE id_usuario=$id");
  }else{
    $sql= mysqli_query($conn, "UPDATE `tbl_asistencia` SET `estado_asistencia`='Absent' WHERE id_usuario=$id");
  }