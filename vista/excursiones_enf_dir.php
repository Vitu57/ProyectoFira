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
<body class="home" style="text-align: center; padding: 2.7%;"> 

<?php
include "../services/conexion.php";
include "../services/header.php";

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=5 AND $tipo!=6) {
  header("location: ../index.php");
}


?>

<div class="header" id="resultado" style="border-radius: 20px; padding: 2%;">

  <a href="../vista/home.php">
  <i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-left: 2%; color: #071334;" class="btn btn-secondary"></i>
</a>
  <br><br>
  <form action="#" method="POST" onsubmit="filtrar_enf_dir();return false">
    
    Data: <input class="espacio_filtros" type="text" name="fecha" id="fecha">
   
Clase: <select class="espacio_filtros" name="clase" id="clase">
          <option value=""></option>
      <?php

  $consulta="SELECT nom_classe FROM tbl_clase Where nom_classe<>'PERSONAL'";
  $exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

  echo "<option>".$casos['nom_classe']."</option>";
}
?>
</select>

    
    Jornada: <select class="espacio_filtros" name="jornada" id="jornada">
      <option value=""></option>
      <?php

  $consulta="SELECT DISTINCT jornada_activitat FROM tbl_activitat";
  $exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

  echo "<option>".$casos['jornada_activitat']."</option>";
}
?>
</select>

Profesor: <input class="espacio_filtros" type="text" name="profe" id="profe">
    <input type="submit" class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " name="submit" value="Filtrar">
  </form>
  <form action="#" method="POST" onsubmit="vertodo_enf_dir();return false">
    <br>
    <input type="submit" class="btn btn-lg" style="margin-right:4%; padding: 0.5%; color: white; background-color: #367cb3; " name="submit" value="Veure tots">
    <br>
  </form>
<br>
<br>
  <?php
    include "tabla_enf_dir.php";
  ?>
  <br>
 
<!-- Exportar a CSV !-->
   <form action="../services/csv_enf_dir.php" method="POST">
    <input class="btn btn-lg filtrado_admin" type="submit" name="exportarCSV" value="Exportar dades">
  </form>

  </div>

<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</body>
</html>