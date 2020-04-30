<?php
include "conexion.php";

$consultaadmin="SELECT nom_classe FROM tbl_clase WHERE nom_classe!='personal'";
//ejecutamos la consulta
$consulta=mysqli_query($conn,$consultaadmin);

while($case = mysqli_fetch_assoc($consulta)){

$excursiones[]=$case['nom_classe'];    

}
 print json_encode($excursiones);
?>