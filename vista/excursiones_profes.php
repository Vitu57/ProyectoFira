<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head>
  <title>Sortides</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="home" onload="CrearTablaProfes()">
<?php
include "../services/conexion.php";
include "../services/header.php";
?>
    <button class="btn" style="position: absolute; right: 5px;top:5px;"><a href="home.php">Tornar</a></button>
<!--Mover al css todo lo del style del div siguiente-->
<div id="resultado" class="tablas" style="overflow-y:auto; position:relative; background-color: rgba(255,255,255,1); width: 1000px; height: 600px; margin-top:100px; left: 50%; transform: translateX(-50%);">
</div>
    <button id='btn_filtro' class="btn btn-lg" style="position: absolute; right: 470px;top:750px;" value='0'><a href="#" onclick='FiltroProfes()'>Sortides d'avui</a></button>
<div class="footer">
  <img src="../images/logo_fje.svg">
</div>
</body>
</html>