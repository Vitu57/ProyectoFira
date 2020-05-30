<?php
include "../services/conexion.php";
if(isset($_REQUEST['accion'])){
	$accion=$_REQUEST['accion'];
	
	if($accion == "mostrar"){

echo "<select id='nombrealumno' class='browser-default custom-select mb-2' onchange='rellenar_datos();'>";
if ($id_clase=$_REQUEST['id_clase']) {
$consultalumnos="select id_alumne,nom_alumne from tbl_alumnes where id_clase='".$id_clase."'";
	$queryalumnos=mysqli_query($conn,$consultalumnos);	
	while ($alumnoclase=mysqli_fetch_array($queryalumnos)) {
	echo "<option value=".$alumnoclase[0].">".$alumnoclase[1]."</option>";
	}
}else{
echo "<option value='' selected disabled>Nom i Cognoms</option>";
}
echo "</select>";
	}

	if($accion =="ver_datos_alumno"){
		if(isset($_REQUEST['id_alumno'])){$id_alumno=$_REQUEST['id_alumno'];}

		$query = "SELECT * FROM tbl_alumnes WHERE id_alumne = ?";

                if ($stmt = mysqli_prepare($conn, $query)){
                    mysqli_stmt_bind_param($stmt, "s", $id_alumno);
                    mysqli_stmt_execute($stmt);
                    $res = mysqli_stmt_get_result($stmt);
                    $alumne=array();
                    while($row = mysqli_fetch_assoc($res)){
                    $alumne[]=$row;
                    }
                    print json_encode($alumne);
                    //echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
                }else{
					echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
                    echo "Error en la consulta";
                }
	}
}

?>    