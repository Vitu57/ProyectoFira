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
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<body class="home" style="text-align: center; padding: 2%;"> 
<!--Sweet alert cdn(s)-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">


<?php
include "../services/conexion.php";
include "../services/header.php";

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=1) {
	header("location: ../index.php");
}

?>

<div class="header" id="resultado" style=" border-radius: 15px;">
	<div style="padding: 3%">
	<a href="../vista/home.php">
	<i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: -1%; color: #071334;" class="btn btn-secondary"></i>
</a>
	<form action="#" method="POST" onsubmit="filtrar_secretaria();return false">
		Data: <input type="text" class="espacio_filtros" name="fecha" id="fecha">
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

Profesor: <input type="text" name="profe" class="espacio_filtros" id="profe">
		<input type="submit" class="btn btn-lg filtrado_admin"  name="submit" value="Filtrar">
	</form>
	<br>
	<form action="#" method="POST" onsubmit="vertodo();return false">
		<input type="submit" class="btn btn-lg filtrado_admin" name="submit" value="Veure tots">
	</form>

<br>
  <div class="scrollhori">
  <?php
     include "tabladmin.php";
  ?> 
  </div>
  <br><br>
   
<!-- Exportar a CSV !-->
   <form action="../services/csv_admin.php" method="POST">
  	<input class="btn btn-lg filtrado_admin" type="submit" name="exportarCSV" value="Exportar dades">
  </form>

  </div>
<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</div>
</body>
</html>