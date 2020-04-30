<?php
include "conexion.php";

 $user=$_REQUEST['user'];
$consultaadmin="SELECT DISTINCT tbl_clase.id_clase, tbl_clase.nom_classe FROM tbl_clase_user INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_clase_user.id_clase WHERE tbl_clase_user.id_usuari='$user'";
//ejecutamos la consulta
$consulta=mysqli_query($conn,$consultaadmin);
$excursiones=array();
while($row = mysqli_fetch_assoc($consulta)){


$consultaadmin2="SELECT tbl_clase.id_clase FROM tbl_clase";
//ejecutamos la consulta
$consulta2=mysqli_query($conn,$consultaadmin2);


while($case = mysqli_fetch_assoc($consulta2)){
    
if ($case['id_clase']==$row['id_clase']) {

$excursiones[]=$row['nom_classe'];
}    
}
}
 print json_encode($excursiones);
?>