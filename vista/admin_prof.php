<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <script type="text/javascript" src="../js/primera_visita.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<?php
include "../services/conexion.php";
include "../services/header.php";

if ($_SESSION['cont_visitas']==1){

echo "<body class='home' onload='admin_prof();' style='text-align: center; padding: 2%;'>";

//Modales de visita guiada
?>
<div id="resultado2" class="modalmask" style="display:none; margin-top: -32.5%; width: 28%; margin-left: 25%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Close" class="close" id="close" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button onclick="admin_prof3();" class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado">TITULO</h2>
        <div id="contenidoResultado">contenido resultado</div>
      </div>
</div>

<div id="resultado3" class="modalmask" style="display:none;  margin-top: -14%; width: 22%; margin-left: 39.5%;;">

      <div class="modalbox movedown" id="resultadoContent3">
        <a href="#close2" title="Close2" class="close" id="close2" style="color:black; background-color:#f1f1f1; margin-right:10%;  margin-top: 1.3%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado3">TITULO</h2>
        <div id="contenidoResultado3">contenido resultado</div>
      </div>
</div>

<div id="resultado4" class="modalmask" style="display:none;  margin-top: -22.5%; width: 34%; margin-left: 22.2%;">

      <div class="modalbox movedown" id="resultadoContent4">
       <a href="#close4" title="Close4" class="close" id="close4" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button onclick="admin_prof2(); admin_prof4();" class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado4">TITULO</h2>
        <div id="contenidoResultado4">contenido resultado</div>
      </div>
</div>


<div id="resultado5" class="modalmask" style="display:none;  margin-top: -14%; width: 22%; margin-left: 61.3%;;">

      <div class="modalbox movedown" id="resultadoContent3">
        <a href="#close5" title="Close5" class="close" id="close5" style="color:black; background-color:#f1f1f1; margin-right:10%;  margin-top: 1.3%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado5">TITULO</h2>
        <div id="contenidoResultado5">contenido resultado</div>
      </div>
</div>


<?php

}else{

echo "<body class='home' style='text-align: center; padding: 2%;'>";

}

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