<?php

include "conexion.php";

if(isset($_REQUEST['dia']) && isset($_REQUEST['mes']) && isset($_REQUEST['anyo'])){


    $fechatotal = $_REQUEST['anyo']."-".$_REQUEST['mes']."-".$_REQUEST['dia'];
    //SELECT count(id_sortida) as result, id_sortida FROM tbl_sortida WHERE inici_sortida = '$fechatotal'

if (isset($_SESSION['id_pares'])) {
	$id_pares=$_SESSION['id_pares'];
    $sql = mysqli_query($conn, "SELECT id_sortida as result FROM tbl_sortida INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_alumnes ON tbl_alumnes.id_clase=tbl_clase.id_clase INNER JOIN tbl_pares_alumnes ON tbl_pares_alumnes.id_alumne=tbl_alumnes.id_alumne WHERE tbl_pares_alumnes.id_pares='$id_pares' AND tbl_sortida.inici_sortida = '$fechatotal'");

}else{
    $sql = mysqli_query($conn, "SELECT id_sortida as result FROM tbl_sortida WHERE inici_sortida = '$fechatotal'");
    //echo "SELECT id_sortida as result FROM tbl_sortida WHERE inici_sortida = '$fechatotal'";
    }

    $result=array();
    while($row = mysqli_fetch_assoc($sql)){
        $result[] = $row;
    }
    print json_encode($result);
}

?>