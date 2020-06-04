<?php
include "../services/conexion.php";

if (isset($_REQUEST['etapa'])) {
	$etapa=$_REQUEST['etapa'];
	echo "<select name='clase' class='espacio_filtros' id='clase' >";
	if ($_REQUEST['tipo']==2) {
		echo "<option value='' selected disabled>Clase...</option>";

	}else if ($_REQUEST['etapa']=="") {
		echo "<option value='' selected disabled>Clase...</option>";

	}else{
	?>
       		<option value="">Clase...</option>
			<?php

	$consulta="SELECT tbl_clase.nom_classe FROM tbl_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa  Where tbl_clase.nom_classe<>'PERSONAL' AND tbl_etapa.nom_etapa='$etapa'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos[0]."</option>";
}
?>
</select>
<?php
}
}
?>