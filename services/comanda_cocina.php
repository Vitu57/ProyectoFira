<?php
include "conexion.php";
  $id=$_REQUEST["id"];
  $estado=$_REQUEST["estado"];

if($estado==0){
    $sql= mysqli_query($conn, "UPDATE `tbl_sortida` SET `comanda_menu`=1 WHERE id_sortida=$id");
  }else{
    $sql= mysqli_query($conn, "UPDATE `tbl_sortida` SET `comanda_menu`=0 WHERE id_sortida=$id");
  }