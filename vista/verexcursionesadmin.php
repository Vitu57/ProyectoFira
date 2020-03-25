<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="home">
  

<?php
include "../services/conexion.php";
include "../services/header.php";
?>
<div class="tablas" id="resultado" style="background-color: rgba(255,255,255,1);">
	<form action="#" method="POST" onsubmit="filtrar();return false">
		Fecha: <input type="text" name="fecha" id="fecha">
		Clase: <input type="text" name="clase" id="clase">
		Profesor: <input type="text" name="profe" id="profe">
		<input type="submit" name="submit" value="Filtrar">
	</form>
	<form action="#" method="POST" onsubmit="vertodo();return false">
		<input type="submit" name="submit" value="Ver todos">
	</form>
  <?php
    include "tabladmin.php";
  ?>
</div>
<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</body>
</html>

