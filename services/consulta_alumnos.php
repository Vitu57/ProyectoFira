<?php
include "../services/conexion.php";
echo "<select id='nombrealumno' class='browser-default custom-select mb-2'>";
if ($id_clase=$_REQUEST['id_clase']) {
$consultalumnos="select id_usuari,nom_usuari from tbl_usuari where id_tipus_usuari='7' and id_clase='".$id_clase."'";
	$queryalumnos=mysqli_query($conn,$consultalumnos);	
	while ($alumnoclase=mysqli_fetch_array($queryalumnos)) {
	echo "<option value=".$alumnoclase[0].">".$alumnoclase[1]."</option>";
	}
}else{
echo "<option value='' selected disabled>Nom i Cognoms</option>";
}
echo "</select>";
?>    