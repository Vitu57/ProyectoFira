<?php

include "conexion.php";

if(isset($_REQUEST['dia']) && isset($_REQUEST['mes']) && isset($_REQUEST['anyo'])){

    $fechatotal = $_REQUEST['anyo']."-".$_REQUEST['mes']."-".$_REQUEST['dia'];
    //SELECT count(id_sortida) as result, id_sortida FROM tbl_sortida WHERE inici_sortida = '$fechatotal'
    $sql = mysqli_query($conn, "SELECT id_sortida as result FROM tbl_sortida WHERE inici_sortida = '$fechatotal'");
    //echo "SELECT id_sortida as result FROM tbl_sortida WHERE inici_sortida = '$fechatotal'";
    
    $result=array();
    while($row = mysqli_fetch_assoc($sql)){
        $result = $row;
    }
    print json_encode($result);
}

?>