<?php
include "conexion.php";
$id_sortida=$_REQUEST['id'];
$consultafeed="select * FROM tbl_feedback WHERE id_sortida=$id_sortida";
//ejecutamos la consulta
$consulta=mysqli_query($conn,$consultafeed);

$feed=array();
while($row = mysqli_fetch_assoc($consulta)){
    $feed[]=$row;
    
  }
 print json_encode($feed);
?>