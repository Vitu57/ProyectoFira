<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<body class="home" style="text-align: center; padding: 2%;"> 

<?php
include "../services/conexion.php";
include "../services/header.php";

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=1) {
	header("location: ../index.php");
}

include "../vista/header_vista.php";

?>

<h1 style="text-align: center; margin-bottom: 4%; font-size: 47px; margin-top: -2%;">Administració Profesors</h1>

<div class="tablas" id="resultado" style="background-color: rgba(255,255,255,1); border-radius: 15px;">
	<div style="padding: 3%">

	<form action="#" method="POST" onsubmit="filtrar_secretaria();return false">
		Etapa: <select name="etapa" id="etapa" class="espacio_filtros">
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

Nom Profesor: <input type="text" name="nom_profe" class="espacio_filtros" id="profe">
Cognoms Profesor: <input type="text" name="cog_profe" class="espacio_filtros" id="profe">
		<input type="submit" class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " name="submit" value="Filtrar">
	</form>
	<br>
	<form action="#" method="POST" onsubmit="vertodo2();return false">
		<input type="submit" class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " name="submit" value="Veure tots">
	</form>


<br>
  <?php
    include "tabla_admin_profes.php";
  ?>
  <br>	

<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</div>
</body>
</html>