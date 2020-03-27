<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body style="background-color: white;" class="home">
  

<?php
include "../services/conexion.php";
include "../services/header.php";
?>
<div class="tablas" id="resultado">
	<form style="text-align: center;background-color: rgba(255,255,255,1); padding-bottom: 10px;" action="#" method="POST" onsubmit="filtrar();return false">
		Fecha: <input type="text" name="fecha" id="fecha">
		Clase: <input type="text" name="clase" id="clase">
		Profesor: <input type="text" name="profe" id="profe">
		<input type="submit" class="btn btn-secondary" name="submit" value="Filtrar">
	</form>
	<form style="text-align: center;" action="#" method="POST" onsubmit="vertodo();return false">
		<input style="margin-bottom: 10px;" type="submit" class="btn btn-secondary" name="submit" value="Ver todos">
	</form>
	<div style="margin-left: 15px; margin-right: 15px;">
  <?php
    include "tabladmin.php";
  ?>
</div>
</div>
<br><br><br>
<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</body>
</html>

