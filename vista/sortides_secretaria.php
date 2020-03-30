<!DOCTYPE html>
<html>
<head>
  <title>Sortides</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="home" style="text-align: center; padding: 3%;"> 

<?php
include "../services/conexion.php";
include "../services/header.php";
?>
<div class="tablas" id="resultado" style="background-color: rgba(255,255,255,1);">
	<br><br>
	<form action="#" method="POST" onsubmit="filtrar_secretaria();return false">
		Codi: <select name="codi" id="codi">

				<option value=""></option>
			<?php

	$consulta="SELECT codi_sortida FROM tbl_sortida";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['codi_sortida']."</option>";
}
?>
</select>
		Data: <input type="text" name="fecha" id="fecha">
		Etapa: <select name="etapa" id="etapa">
			<option value=""></option>

		<?php

	$consulta="SELECT nom_etapa FROM tbl_etapa WHERE nom_etapa<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_etapa']."</option>";
}
?>
</select>
Clase: <select name="clase" id="clase">
       		<option value=""></option>
			<?php

	$consulta="SELECT nom_classe FROM tbl_clase Where nom_classe<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_classe']."</option>";
}
?>
</select>

		
		Jornada: <select name="jornada" id="jornada">
			<option value=""></option>
			<?php

	$consulta="SELECT DISTINCT jornada_activitat FROM tbl_activitat";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['jornada_activitat']."</option>";
}
?>
</select>

Profesor: <input type="text" name="profe" id="profe">
		<input type="submit" name="submit" value="Filtrar">
	</form>
	<br>
	<form action="#" method="POST" onsubmit="vertodo_secretaria();return false">
		<input type="submit" name="submit" value="Veure Tots">
	</form>
<br>
<br>
  <?php
    include "tablasecretaria.php";
  ?>
  <br>
  </div>
<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</body>
</html>

