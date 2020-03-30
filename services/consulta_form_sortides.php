<?php
include("conexion.php");
$accion=$_REQUEST['accion'];

if($accion == "etapa"){
   $query = "SELECT * FROM `tbl_etapa`";
        //Ejecutar consulta segura
        if ($stmt = mysqli_prepare($conn, $query)){
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $etapa=array();
            while($row = mysqli_fetch_assoc($res)){
            $etapa[]=$row;
             }
            print json_encode($etapa);
            
        }else{
            echo "Error en la consulta";
        }

}elseif($accion == "curso"){
   $id_etapa=$_REQUEST['nom_etapa'];
   $query = "SELECT * FROM `tbl_clase` WHERE id_etapa = ?";
        //Ejecutar consulta segura
        if ($stmt = mysqli_prepare($conn, $query)){
         mysqli_stmt_bind_param($stmt, "s", $id_etapa);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $curs=array();
            while($row = mysqli_fetch_assoc($res)){
            $curs[]=$row;
             }
            print json_encode($curs);
            
        }else{
            echo "Error en la consulta";
        }
}elseif($accion == "1" || $accion == "2" || $accion == "3"){
$table_name = "tbl_activitat";
$column_name = $_REQUEST['column'];
$result = mysqli_query($conn,'SHOW COLUMNS FROM '.$table_name.' WHERE field="'.$column_name.'"');
$select=[];
    while ($row = mysqli_fetch_row($result)) {
        
            foreach(explode("','",substr($row[1],6,-2)) as $option) {
                array_push($select,$option);
            }
        }
        print json_encode($select);
}elseif($accion == "professor"){
$query = "SELECT `nom_usuari`, `cognom_usuari`, `id_usuari` FROM `tbl_usuari` WHERE `id_tipus_usuari`= 2 ORDER BY `cognom_usuari`";
 if ($stmt = mysqli_prepare($conn, $query)){
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $professor=array();
            while($row = mysqli_fetch_assoc($res)){
            $professor[]=$row;
             }
            print json_encode($professor);
            
        }else{
            echo "Error en la consulta";
        }
}elseif($accion == "transport"){
$query = "SELECT * FROM `tbl_nom_transport`";
 if ($stmt = mysqli_prepare($conn, $query)){
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $transport=array();
            while($row = mysqli_fetch_assoc($res)){
            $transport[]=$row;
             }
            print json_encode($transport);
            
        }else{
            echo "Error en la consulta";
        }

}else{
   echo "ninguna opcion selecionada";
}
   	?>