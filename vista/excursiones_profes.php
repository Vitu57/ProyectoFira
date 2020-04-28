<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head>
  <title>Sortides</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<body class="home"  style="text-align: center; padding: 5%;" onload="CrearTablaProfes(1);">
<?php
include "../services/conexion.php";
include "../services/header.php";

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=2) {
	header("location: ../index.php");
}

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
<div class="header" style=" border-radius: 15px;">
<div style="padding: 3%">
	<a href="../vista/home.php">
	<i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: -2%; color: #071334;" class="btn btn-secondary"></i>
</a>	

<form action="#" method="POST" onsubmit="CrearTablaProfes(2);return false">
		Codi: <input class="espacio_filtros" type="text" name="codi" id="codi">
		Data: <input class="espacio_filtros" type="text" name="fecha" id="fecha">
		Etapa: <select class="espacio_filtros" name="etapa" id="etapa">
			<option value=""></option>

		<?php

	$consulta="SELECT nom_etapa FROM tbl_etapa WHERE nom_etapa<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_etapa']."</option>";
}
?>
</select>
Clase: <select class="espacio_filtros" name="clase" id="clase">
       		<option value=""></option>
			<?php

	$consulta="SELECT nom_classe FROM tbl_clase Where nom_classe<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_classe']."</option>";
}
?>
</select>

		
		Jornada: <select class="espacio_filtros" name="jornada" id="jornada">
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
		<input class="btn btn-lg" style="background-color: #367cb3; color: white; padding: 0.5%; margin: 2%; " type="submit" name="submit" value="Filtrar">
	</form>
	<br>

	<form action="#" method="POST" onsubmit="CrearTablaProfes(1);return false">
		<input class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " type="submit" name="submit" value="Veure Tots">

		<a href="#" onclick='FiltroProfes()'> <button id='btn_filtro' class="btn btn-lg" style=" color: white; background-color:  #367cb3; padding: 0.5%; right: 42%; top:28.6%;" value='0'> Sortides d'avui</button></a>
	</form>

<div id="resultado" class="tablas" style="overflow-y:auto; position:relative; margin-top:6%; left: 50%; transform: translateX(-50%);z-index:9;">
</div>
<br>
<!-- Exportar a CSV !-->
   <form action="../services/csv_profes.php" method="POST">
  	<input class="btn btn-lg filtrado_admin" type="submit" name="exportarCSV" value="Exportar dades">
  </form>

<div class="footer">
  <img src="../images/logo_fje.svg">
</div>
</div>
</body>
</html>