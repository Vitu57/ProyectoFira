<!DOCTYPE html>
<html>
<head>
  <title>Sortides</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<body class="home" style="text-align: center; padding: 5%;"> 

<?php
include "../services/conexion.php";
include "../services/header.php";

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=3) {
	header("location: ../index.php");
}

?>

<div class="tablas" id="resultado" style="background-color: rgba(255,255,255,1); border-radius: 15px;">
	<div style="padding: 3%">
	<a href="../vista/home.php">
	<i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: -1%; color: #071334;" class="btn btn-secondary"></i>
</a>
	<form action="#" method="POST" onsubmit="filtrar_secretaria();return false">
		Codi: <input type="text" class="espacio_filtros" name="codi" id="codi">
		Data: <input type="text" class="espacio_filtros" name="fecha" id="fecha">
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
Clase: <select name="clase" class="espacio_filtros" id="clase">
       		<option value=""></option>
			<?php

	$consulta="SELECT nom_classe FROM tbl_clase Where nom_classe<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_classe']."</option>";
}
?>
</select>

		
		Jornada: <select name="jornada" class="espacio_filtros" id="jornada">
			<option value=""></option>
			<?php

	$consulta="SELECT DISTINCT jornada_activitat FROM tbl_activitat";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['jornada_activitat']."</option>";
}
?>
</select>

Profesor: <input type="text" name="profe" class="espacio_filtros" id="profe">
		<input type="submit" class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " name="submit" value="Filtrar">
	</form>
	<br>
	<form action="#" method="POST" onsubmit="vertodo_secretaria();return false">
		<input type="submit" class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " name="submit" value="Veure tots">
	</form>

<br>
  <?php
    include "tablasecretaria.php";
  ?>
  <br>
  </div>
<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</div>
</body>
</html>

