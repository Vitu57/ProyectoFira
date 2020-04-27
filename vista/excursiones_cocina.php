<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head>
  <title>Sortides</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<body class="home" style="text-align: center; padding: 5%;"  onload="CrearTabla()">
<?php
include "../services/conexion.php";
include "../services/header.php";

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=4) {
	header("location: ../index.php");
}

?>

<!--Mover al css todo lo del style del div siguiente-->
<div class="header" style=" border-radius: 15px;">
<div style="padding: 3%">
	<a href="../vista/home.php">
	<i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: -2%; color: #071334;" class="btn btn-secondary"></i>
</a>	
		<a href="#" onclick='FiltroCocina()'> <button id='btn_filtro' class="btn btn-lg" style=" color: white; background-color:  #367cb3; padding: 0.5%; right: 42%; top:28.6%;" value='0'> Sortides d'avui</button></a>
	</form>

<div id="resultado" class="tablas" style="overflow-y:auto; position:relative; margin-top:6%; left: 50%; transform: translateX(-50%);z-index:9;">
</div>

<div class="footer">
  <img src="../images/logo_fje.svg">
</div>
</div>
</body>
</html>