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
<body class="home"  style="text-align: center; padding: 5%; padding-top: 2%;" onload="CrearTablaProfes(1);">
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
<div class='header2'><div style='padding-top:2%; padding-right: 2%; padding-left: 2%; margin-bottom: -3%;'>
<a href="../vista/home.php">
	<i class="fas fa-arrow-circle-left fa-4x" title="Tornar" style="  margin-top:-1%;color: #071334; float:left;" class="btn btn-secondary"></i>
</a>
<a style='color:#d60909; float: right; margin-top: -0.5%;' title="Tanca la sessió" href='../services/logout.php'><i class='fas fa-power-off fa-3x'></i></a>

	<div style="padding: 1%; text-align: left;">
		<h1 style="text-align: center; margin-bottom: 4%; font-size: 47px; margin-top: -2%;">Sortides Professors</h1>
	</div></div>
<div class="header" style=" background-color: rgba(255,255,255,1);border-radius: 15px; border-bottom: 0px;">
<div style="padding: 3%;padding-top: 0%; padding-bottom: 0%;">
		

<form action="#" method="POST" onsubmit="CrearTablaProfes(2);return false" style="">
		 <input style="width: 5%;" class="espacio_filtros" type="text" name="codi" id="codi" placeholder="Codi...">
		 <input style="width: 9%;" class="espacio_filtros" type="text" name="fecha" id="fecha" placeholder="Data...">
		 <input type="text" class="espacio_filtros" name="profe" id="profe" placeholder="Professor...">
		<select class="espacio_filtros" name="etapa" id="etapa" >
			<option value="" class="placeholder_select"  selected>Etapa...</option>

		<?php

	$consulta="SELECT nom_etapa FROM tbl_etapa WHERE nom_etapa<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_etapa']."</option>";
}
?>
</select>
<select class="espacio_filtros" name="clase" id="clase">
       		<option class="placeholder_select" value=""  selected>Clase...</option>
			<?php

	$consulta="SELECT nom_classe FROM tbl_clase Where nom_classe<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_classe']."</option>";
}
?>
</select>

		
		<select class="espacio_filtros" name="jornada" id="jornada" >
			<option value="" class="placeholder_select" selected>Jornada...</option>
			<?php

	$consulta="SELECT DISTINCT jornada_activitat FROM tbl_activitat";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['jornada_activitat']."</option>";
}
?>
</select>


		<input class="btn btn-lg" style="background-color: #367cb3; color: white; padding: 0.5%; margin: 1%; " type="submit" name="submit" value="Filtrar">
		<input class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " type="submit" name="submit" value="Veure Tots" onclick="CrearTablaProfes(1);return false">
	</form>
	<br>

	
		

		<a href="#" onclick='FiltroProfes()' style="float: right;"> <button id='btn_filtro' class="btn btn-lg" style="color: white; background-color:  #367cb3;    padding: 5px;" value='0'> Sortides d'avui</button></a>
	

<div id="resultado" class="tablas" style="overflow-y:scroll; height: 22rem;position:relative; margin-top:3%; left: 50%; transform: translateX(-50%);z-index:0;">
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
</div>
</body>
</html>