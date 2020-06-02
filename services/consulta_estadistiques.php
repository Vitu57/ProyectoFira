<?php
include("conexion.php");
//Si la variable "accion" está definida, continuará con el código. Si no, no utilizará nada.
if(isset($_REQUEST['accion'])){
    $accion=$_REQUEST['accion'];
//--------------------------Para sacar todos los usuarios que hay------------------------------//

if($accion == "veure"){
$query = "SELECT tbl_clase.nom_classe, count(id_sortida) AS vegades FROM tbl_sortida INNER JOIN tbl_clase ON tbl_sortida.id_clase = tbl_clase.id_clase GROUP BY tbl_sortida.id_clase";

if ($stmt = mysqli_prepare($conn, $query)){
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $estad=array();
    while($row = mysqli_fetch_assoc($res)){
    $estad[]=$row;
     }
    print json_encode($estad);
    
}else{
    echo "Error en la consulta";
}
}

}
   	?>