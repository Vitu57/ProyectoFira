<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head>
  <title>Sortides</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
     <script type="text/javascript" src="../js/primera_visita.js"></script>
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

echo "<body class='home' style='text-align: center; padding: 5%;'  onload='CrearTabla(); cocina_vis();'>";

?>

<div id="resultado2" class="modalmask" style="display:none; margin-top: -29%; width: 40%; margin-left: 19%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Close" class="close" id="close" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button onclick="cocina_vis2(); cocina_vis3();" class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado">TITULO</h2>
        <div id="contenidoResultado">contenido resultado</div>
      </div>
</div>

<div id="resultado3" class="modalmask" style="display:none; margin-top: -16%; width: 24%; margin-left: 3%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close3" title="Close3" class="close" id="close3" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style=" padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado3">TITULO</h2>
        <div id="contenidoResultado3">contenido resultado</div>
      </div>
</div>

<div id="resultado4" class="modalmask" style="display:none; margin-top: -16%; width: 25%; margin-left: 52%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close4" title="Close4" class="close" id="close4" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado4">TITULO</h2>
        <div id="contenidoResultado4">contenido resultado</div>
      </div>
</div>

<?php

}else{

echo "<body class='home' style='text-align: center; padding: 5%;'  onload='CrearTabla()'>";

}


include "../vista/header_vista.php";

?>

<h1 style="text-align: center; margin-bottom: 3%; font-size: 47px; margin-top: -2%;">Sortides Cuina</h1>


<!--Mover al css todo lo del style del div siguiente-->

<div style="padding: 3%">
 <table style="margin-left: 39%;">
 <tr>
 <td> 

<?php

//Si es la primera visita carga los modales de esta
if ($_SESSION['cont_visitas']==1){
 ?>
  <a href="#" onclick='FiltroCocinaPrimeraVisita()'> <button id='btn_filtro' class="btn btn-lg" style=" color: white; background-color:  #367cb3; padding: 5.8%; margin-left: -10%;" value='0'> Sortides d'avui</button></a>
<?php
}else{
  ?>
		<a href="#" onclick='FiltroCocina()'> <button id='btn_filtro' class="btn btn-lg" style=" color: white; background-color:  #367cb3; 
    padding: 5.8%; margin-left: -10%;" value='0'> Sortides d'avui</button></a>
<?php
}
?>
	</form>
</td>
<td style="width: 9%;"></td>
<td>      
<!-- Exportar a CSV !-->
   <form action="../services/csv_cocina.php" method="POST">
    <input class="btn btn-lg filtrado_admin" type="submit" name="exportarCSV" value="Exportar dades">
  </form>
</td></tr></table>

<div id="resultado" class="tablas" style="overflow-y:auto; position:relative; margin-top:6%; left: 50%; transform: translateX(-50%);z-index:9;">
</div>
<br>

<div class="footer">
  <img src="../images/logo_fje.svg">
</div>
</div>
</body>
</html>