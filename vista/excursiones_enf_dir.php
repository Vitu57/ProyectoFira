<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head>
  <title>Sortides</title>
  <link rel="stylesheet" type="text/css" href="../css/tablesort.css">
  <script src='../plugin/tablesort/tablesort.js'></script>
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
if ($_SESSION['cont_visitas']==1){

echo "<body class='home' style='text-align: center; padding-top: 2%; padding-left: 5%; padding-right: 5%;'  onload='dir_enf_vis(); tutoriallogout(); tutorialreturn();'>";

include "../services/tutorial.proc.php";

}else{

echo "<body class='home' style='text-align: center; padding-top: 2%; padding-left: 5%; padding-right: 5%;'>";

}

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=5 AND $tipo!=6) {
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

  <div style="padding: 1%; text-align: left;">
  <h1 style="text-align: center; margin-bottom: 4%; font-size: 47px; margin-top: -2%;">Sortides
  <?php
  if ($tipo==5) {
  	echo "Enfermeria";
  }else{
    echo "Dirección";
  }
  ?>
</h1>
  </div></div>
<div class="header" style=" background-color: rgba(255,255,255,1);border-radius: 15px; border-bottom: 0px;">
<div style="padding: 3%;padding-top: 0%; padding-bottom: 0%;">
  <br><br>

  <form action="#"  onchange="filtrar_enf_dir();return false">
    
    <input class="espacio_filtros" type="date" name="fecha" id="fecha" placeholder="Data...">
    <input class="espacio_filtros" type="text" name="profe" id="profe" placeholder="Professor...">
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
          <option selected disabled value="">Clase...</option>
</select>


    
   <select class="espacio_filtros" name="jornada" id="jornada">
      <option value="">Jornada...</option>
      <?php

  $consulta="SELECT DISTINCT jornada_activitat FROM tbl_activitat";
  $exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

  echo "<option>".$casos['jornada_activitat']."</option>";
}
?>
</select>

    <input type="submit" class="btn btn-lg" style="margin-right:4%; margin-left: 1.5%; padding: 0.5%; color: white; background-color: #367cb3; " name="submit" value="Veure tots" onclick="vertodo(); return false;">
  </form>
  
    
    
  </form>
 <div id="resultado" class="tablas" style="overflow-y:scroll; height: 22rem;position:relative; margin-top:3%; left: 50%; transform: translateX(-50%);z-index:0; background-color: #333;">
  <?php
    include "tabla_enf_dir.php";
  ?>
 </div>
  <br>
 
<!-- Exportar a CSV !-->
    <a href="../services/csv.php"><button class="btn btn-lg filtrado_admin">Exportar dades</button></a>

  </div>
<div id="resultado2" class="modalmask" style="display:none;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Close" class="close" id="close">X</a>
        <h2 id="tituloResultado">TITULO</h2>
        <div id="contenidoResultado">contenido resultado</div>
      </div>
    </div>
<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</body>
</html>