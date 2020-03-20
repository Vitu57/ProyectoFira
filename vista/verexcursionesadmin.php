<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="home" onload="modal(); modal2();">
  

<?php
include "../services/conexion.php";
include "../services/header.php";
?>
<div class="tablas" style="background-color: rgba(255,255,255,1);">
  <?php
    include "tabladmin.php";
  ?>
</div>
<div class="footer">
  <img src="../img/logo-centro-footer.svg">
</div>
</body>
</html>

