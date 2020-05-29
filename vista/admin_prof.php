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

echo "<div id='resultado'>";

if ($_SESSION['cont_visitas']==1){

echo "<body class='home' onload='admin_prof(); admin_prof3(); tutoriallogout(); tutorialreturn(); ' style='text-align: center; padding: 5%; padding-top: 2%;'>";

//Modales de visita guiada
?>
<div id="resultadologout" class="modalmask" style="display:none; margin-top: -32%; width: 16%; margin-left: 62%;">

      <div class="modalbox movedown" id="resultadoContentlogout">
        <a href="#" title="Tancar" class="close" id="closelogout" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadologout">TITULO</h2>
        <div id="contenidoResultadologout">contenido resultado</div>
      </div>
</div>

<div id="resultadoreturn" class="modalmask" style="display:none; margin-top: -31.7%; width: 12%; margin-left: 2%;">

      <div class="modalbox movedown" id="resultadoContentreturn">
        <a href="#" title="Tancar" class="close" id="closereturn" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoreturn">TITULO</h2>
        <div id="contenidoResultadoreturn">contenido resultado</div>
      </div>
</div>

<div id="resultado2" class="modalmask" style="display:none; margin-top: -32.5%; width: 28%; margin-left: 26.1%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Tancar" class="close" id="close" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado">TITULO</h2>
        <div id="contenidoResultado">contenido resultado</div>
      </div>
</div>

<div id="resultado3" class="modalmask" style="display:none;  margin-top: -25%; width: 22%; margin-left: 38.5%;;">

      <div class="modalbox movedown" id="resultadoContent3">
        <a href="#close2" title="Tancar" class="close" id="close2" style="color:black; background-color:#f1f1f1; margin-right:10%;  margin-top: 1.3%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado3">TITULO</h2>
        <div id="contenidoResultado3">contenido resultado</div>
      </div>
</div>

<div id="resultado4" class="modalmask" style="display:none;  margin-top: -22.5%; width: 34%; margin-left: 22.2%;">

      <div class="modalbox movedown" id="resultadoContent4">
       <a href="#close4" title="Tancar" class="close" id="close4" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button onclick="admin_prof2(); admin_prof4();" class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado4">TITULO</h2>
        <div id="contenidoResultado4">contenido resultado</div>
      </div>
</div>


<div id="resultado5" class="modalmask" style="display:none;  margin-top: -25%; width: 22%; margin-left: 60.3%;;">

      <div class="modalbox movedown" id="resultadoContent3">
        <a href="#close5" title="Tancar" class="close" id="close5" style="color:black; background-color:#f1f1f1; margin-right:10%;  margin-top: 1.3%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
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


?>

<div class='header2'><div style='padding-top:2%; padding-right: 2%; padding-left: 2%; margin-bottom: -3%;'>
<a href="../vista/home.php">
  <i class="fas fa-arrow-circle-left fa-4x" title="Tornar" style="  margin-top:-1%;color: #071334; float:left;" class="btn btn-secondary"></i>
</a>
<?php
$id=$_SESSION['id'];
$conom="select usuari from tbl_usuari where id_usuari='".$id."'";
$query=mysqli_query($conn,$conom);
$nombre=mysqli_fetch_array($query);
?>
<a style=' float: right; margin-top: -0.5%;' title="Tanca la sessió" href='../services/logout.php'><img src='../images/icon-logout.svg' style='width: 3rem;margin-left:2%; margin-top:-1%;'></a>
<?php
  echo "<p style='position:relative; float:right; margin-right:2%;font-size:1.5rem;'>".$nombre[0]."</p>";
  ?>
<div style="margin-left: 80%;font-size:200%;margin-top: -0.5%;">
  
</div>

  <div style="padding: 1%; text-align: left;">
    <h1 style="text-align: center; margin-bottom: 4%; font-size: 47px; margin-top: -2%;">Administració Professors</h1>
  </div></div>
<div class="header" style=" background-color: rgba(255,255,255,1);border-radius: 15px; border-bottom: 0px;">
<div style="padding: 3%;padding-top: 0%; padding-bottom: 0%;">

	<form action="#" method="POST" onsubmit="filtrar_secretaria();return false">
    <input type="text" name="nom_profe" class="espacio_filtros" id="profe" placeholder="Nom Professor">
<input type="text" name="cog_profe" class="espacio_filtros" id="profe" placeholder="Cognom Professor">
		<select name="etapa" id="etapa" class="espacio_filtros">
			<option value="">Etapa...</option>

		<?php

	$consulta="SELECT nom_etapa FROM tbl_etapa WHERE nom_etapa<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_etapa']."</option>";
}
?>
</select>
        <select name="clase" class="espacio_filtros" id="clase">
       		<option value="">Clase...</option>
			<?php

	$consulta="SELECT nom_classe FROM tbl_clase Where nom_classe<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_classe']."</option>";
}
?>
</select>


		<input type="submit" class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " name="submit" value="Filtrar">
    <input type="submit" class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " name="submit" value="Veure tots" onload="vertodo2();return false">
	</form>


<br>
<div id="resultado" class="tablas" style="overflow-y:scroll; height: 22rem;position:relative; margin-top:3%; left: 50%; transform: translateX(-50%);z-index:0; background-color: #333;">
  <?php
    include "tabla_admin_profes.php";
  ?>
  </div>

<div class="footer">
 <img src="../images/logo_fje.svg">
</div>

</body>
</html>