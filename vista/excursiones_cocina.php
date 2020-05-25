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

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=4) {
  header("location: ../index.php");
}

//Comprueba si es la primera vez que entra el usuario
if ($_SESSION['cont_visitas']==1){

echo "<body class='home' style='text-align: center; padding: 5%; padding-top: 2%;'  onload='CrearTabla(); cocina_vis(); tutoriallogout(); tutorialreturn(); '>";

include "../services/tutorial.proc.php";

}else{

echo "<body class='home' style='text-align: center; padding: 5%; padding-top: 2%;'  onload='CrearTabla()'>";

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
    <h1 style="text-align: center; margin-bottom: 4%; font-size: 47px; margin-top: -2%;">Sortides Cuina</h1>
  </div></div>
<div class="header" style=" background-color: rgba(255,255,255,1);border-radius: 15px; border-bottom: 0px;">
<div style="padding: 3%;padding-top: 0%; padding-bottom: 0%;">
 

<?php

//Si es la primera visita carga los modales de esta
if ($_SESSION['cont_visitas']==1){
 ?>
  <button id='btn_filtro' class="btn btn-lg" style=" color: white; background-color:  #367cb3; " value='0' onclick='FiltroCocinaPrimeraVisita()'> Sortides d'avui</button>
<?php
}else{
  ?>
		 <button id='btn_filtro' class="btn btn-lg" style=" color: white; background-color:  #367cb3; " value='0' onclick='FiltroCocina()'> Sortides d'avui</button>
<?php
}
?>
	</form>


<div id="resultado" class="tablas" style="overflow-y:scroll; height: 28rem;position:relative; margin-top:3%; left: 50%; transform: translateX(-50%);z-index:0; background-color: #333;">
</div>
<br>

<!-- Exportar a CSV !-->
    <a href="../services/csv.php"><button class="btn btn-lg filtrado_admin">Exportar dades</button></a>

<div class="footer">
  <img src="../images/logo_fje.svg">
</div>
</div>
</body>
</html>