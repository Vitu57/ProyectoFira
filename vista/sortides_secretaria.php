<!DOCTYPE html>
<html>
<head>
  <title>Sortides</title>
  <link rel="stylesheet" type="text/css" href="../css/tablesort.css">
  <script src='../plugin/tablesort/tablesort.js'></script>
    <script type="text/javascript" src="../js/primera_visita.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<?php
include "../services/conexion.php";
include "../services/header.php";

//Comprueba si es la primera vez que entra el usuario
if ($_SESSION['cont_visitas']==1) {
?>
<body class="home" style="text-align: center; padding-top: 2%; padding-left: 5%; padding-right: 5%;" onload="tutorialsecre(); tutorialCSV();">

<div id="resultadotut" class="modalmask" style="display:none; margin-top: -26.5%; width: 15%; margin-left: 63.5%;">

      <div class="modalbox movedown" id="resultadoContenttut">
        <a href="#" title="Close4" class="close" id="closetut" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadotut">TITULO</h2>
        <div id="contenidoResultadotut">contenido resultado</div>
      </div>
</div>

<div id="resultadoCSV" class="modalmask" style="display:none; margin-top: 0.9%; width: 18%; margin-left: 46%;">

      <div class="modalbox movedown" id="resultadoContentCSV">
        <a href="#" title="Close4" class="close" id="closeCSV" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoCSV">TITULO</h2>
        <div id="contenidoResultadoCSV">contenido resultado</div>
      </div>
</div>
<?php
}else{
?>
<body class="home" style="text-align: center; padding-top: 2%; padding-left: 5%; padding-right: 5%;"> 
<?php  
}

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=3) {
	header("location: ../index.php");
}

?>

<div class='header2'><div style='padding-top:2%; padding-right: 2%; padding-left: 2%; margin-bottom: -3%;'>
<a href="../vista/home.php">
	<i class="fas fa-arrow-circle-left fa-4x" title="Tornar" style="  margin-top:-1%;color: #071334; float:left;" class="btn btn-secondary"></i>
</a>
<a style='color:#d60909; float: right; margin-top: -0.5%;' title="Tanca la sessió" href='../services/logout.php'><i class='fas fa-power-off fa-3x'></i></a>

	<div style="padding: 1%; text-align: left;">
		<h1 style="text-align: center; margin-bottom: 4%; font-size: 47px; margin-top: -2%;">Sortides Secretaria</h1>
	</div></div>
<div class="header" style=" background-color: rgba(255,255,255,1);border-radius: 15px; border-bottom: 0px;">
<div style="padding: 3%;padding-top: 0%; padding-bottom: 0%;">
	
	<form action="#" method="POST" onsubmit="filtrar_secretaria();return false">
		<input type="text" class="espacio_filtros" name="codi" id="codi" placeholder="Codi...">
		<input type="date" class="espacio_filtros" name="fecha" id="fecha" placeholder="Data...">
		 <input type="text" name="profe" class="espacio_filtros" id="profe" placeholder="Professor...">
		<select name="etapa" id="etapa" class="espacio_filtros">
			<option value="" >Etapa</option>

		<?php

	$consulta="SELECT nom_etapa FROM tbl_etapa WHERE nom_etapa<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_etapa']."</option>";
}
?>
</select>
<select name="clase" class="espacio_filtros" id="clase" >
       		<option value="">Clase...</option>
			<?php

	$consulta="SELECT nom_classe FROM tbl_clase Where nom_classe<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_classe']."</option>";
}
?>
</select>

		
		<select name="jornada" class="espacio_filtros" id="jornada">
			<option value="">Jornada...</option>
			<?php

	$consulta="SELECT DISTINCT jornada_activitat FROM tbl_activitat";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['jornada_activitat']."</option>";
}
?>
</select>

		
		<input type="submit" class="btn btn-lg" style=" background-color: #367cb3; color: white; padding: 0.5%; margin: 1%; " name="submit" value="Filtrar">
		<input type="submit" class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " name="submit" value="Veure tots" onclick="vertodo_secretaria();return false">
	</form>
	
	<div id="resultado" class="tablas" style="overflow-y:scroll; height: 22rem;position:relative; margin-top:3%; left: 50%; transform: translateX(-50%);z-index:0; background-color: #333;">

  <?php
    include "tablasecretaria.php";
  ?>
  </div>
  </div>
   <br>
<!-- Exportar a CSV !-->
   <form action="../services/csv_secretaria.php" method="POST">
  	<input class="btn btn-lg filtrado_admin" style="margin-bottom: 2.5%" type="submit" name="exportarCSV" value="Exportar dades">
  </form>

  </div>
  <!-- Modal del contacto--> 
<div id="resultado2" class="modalmask" style="display:none;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Close" class="close" id="close">X</a>
        <h2 id="tituloResultado">TITULO</h2>
        <div id="contenidoResultado">contenido resultado</div>
      </div>
    </div>
</div>
<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</div>
</body>
</html>
