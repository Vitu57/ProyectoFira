<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head>
  <title>Sortides</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="home" onload="CrearTablaProfes(1);">
<?php
include "../services/conexion.php";
include "../services/header.php";
?>
<div id="resultado2" class="modalmask" style="display:none;">
		
			<div class="modalbox movedown" id="resultadoContent">
				<a href="#close" title="Close" class="close" id="close">X</a>
				<h2 id="tituloResultado">TITULO</h2>
				<div id="contenidoResultado">contenido resultado</div>
			</div>
		</div>
    <!--<button class="btn" style="position: absolute; right: 5px;top:5px;"><a href="home.php">Tornar</a></button>-->
<!--Mover al css todo lo del style del div siguiente-->
<div class="header">
<form action="#" method="POST" onsubmit="CrearTablaProfes(2);return false">
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
	<form action="#" method="POST" onsubmit="CrearTablaProfes(1);return false">
		<input type="submit" name="submit" value="Veure Tots">
	</form>
</div>

<div id="resultado" class="tablas" style="overflow-y:auto; position:relative; background-color: rgba(255,255,255,1); width: 1200px; height: 600px; margin-top:100px; left: 50%; transform: translateX(-50%);z-index:9;">
</div>

    <button id='btn_filtro' class="btn btn-lg" style="position: absolute; right: 370px;top:750px;" value='0'><a href="#" onclick='FiltroProfes()'>Sortides d'avui</a></button>


    
<div class="footer">
  <img src="../images/logo_fje.svg">
</div>
</body>
</html>