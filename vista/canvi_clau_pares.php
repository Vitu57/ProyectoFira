<!DOCTYPE html>
<html>
<head>
  <title>Sortides</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--Calendario-->
  <link href="https://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="calendar/css/vanilla-calendar-min.css">
  <script src="calendar/js/vanilla-calendar-min.js"></script>
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<body class="home">

<?php

if (isset($_REQUEST['q4t5ywt62g'])) {

$id=$_REQUEST['q4t5ywt62g'];

?>	

<div class='header'>

   <a href="../vista/login_pares.php">
  <i class="fas fa-arrow-circle-left fa-3x btn-atras" title="Tornar"></i>
</a>
<h2 class="title_header">Restableix la clau</h2>
</div>

<div id="mensaje_pass" class="mensaje_pass">
  <h4 style="margin-top: -4%; float: center;">Introdueix les dades en el formulari per actualitzar la clau.</h4><br>
 <div id="mensaje" style="color: red; margin-bottom: 5%;"></div>
<form action="#" onsubmit="recuperar_pass_pares(<?php echo $id; ?>); return false" method="post">
  <h5>DNI</h5>
  <input type="text" id="dni" name="dni"><br><br>
    <h5>Nova clau</h5>
  <input type="password" id="pass1" name="pass1"><br><br>
    <h5>Confirmar nova clau</h5>
  <input type="password" id="pass2" name="pass2"><br><br>
  <input type="submit" class="btn btn-lg btn-par" name="enviar">
</form>
</div>

<div class="footer">
  <img src="../images/logo_fje.svg">
</div>

<?php
}else{
	header("location: ../vista/home_pares.php");
}
?>

</body>
</html>
