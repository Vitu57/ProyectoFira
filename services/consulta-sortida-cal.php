<?php

include "conexion.php";

if(isset($_REQUEST['id_sortida'])){

    $id_sortida = $_REQUEST['id_sortida'];
    //SELECT count(id_sortida) as result, id_sortida FROM tbl_sortida WHERE inici_sortida = '$fechatotal'
    $sql = mysqli_query($conn, "SELECT tbl_sortida.codi_sortida, tbl_sortida.inici_sortida, tbl_sortida.numero_alumnes, tbl_sortida.profesor_asignat, tbl_clase.nom_classe FROM tbl_sortida INNER JOIN tbl_clase on tbl_sortida.id_clase = tbl_clase.id_clase WHERE tbl_sortida.id_sortida = '$id_sortida'");   
    $result=array();
    while($row = mysqli_fetch_assoc($sql)){
        $result = $row;
    }
    print json_encode($result);
}

?>