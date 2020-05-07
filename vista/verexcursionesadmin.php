<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/tablesort.css">
    <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
  


</head>
<body class="home" style="text-align: center; padding: 2%;"> 
<!--Sweet alert cdn(s)-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">


<?php
include "../services/conexion.php";
include "../services/header.php";

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=1) {
	header("location: ../index.php");
}

?>

<div class="header" id="resultado" style=" border-radius: 15px;">
	<div style="padding: 3%">
	<a href="../vista/home.php">
	<i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: -1%; color: #071334;" class="btn btn-secondary"></i>
</a>
	<form action="#" method="POST" onsubmit="filtrar_secretaria();return false">
		Data: <input type="text" class="espacio_filtros" name="fecha" id="fecha">
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

Profesor: <input type="text" name="profe" class="espacio_filtros" id="profe">
		<input type="submit" class="btn btn-lg filtrado_admin"  name="submit" value="Filtrar">
		<button class="btn btn-lg filtrado_admin" name="submit" value="Veure tots" action="#" method="POST" onclick="vertodo();return false">
		Veure Tots</button>
	</form>
            <br><br><br><br>
  <div id="resultadohed" class="scrollhori">
  <?php
     include "tabladmin.php";
  ?> 
  </div>
<!-- Mostrar mas !-->
<div style="position: absolute; top: 22.5%; right:5.5%;">
    <button id="btn_profes" class="btn_mos" onclick="Mostrar_Profesores(<?php echo $cont; ?>); return false;" value="0">Profesors i Vetlladors</button>
<button id="btn_al" class="btn_mos" onclick="Mostrar_Alumnes(<?php echo $cont; ?>); return false;" value="0">Alumnes i Acompanyants</button>
<button id="btn_tipus"class="btn_mos" onclick="Mostrar_Tipus(<?php echo $cont; ?>); return false;" value="0">Tipus i Ambit</button>
</div>
  <br><br>
  
<!-- Exportar a CSV !-->
   <form action="../services/csv_admin.php" method="POST">
  	<input class="btn btn-lg filtrado_admin" type="submit" name="exportarCSV" value="Exportar dades">
  </form>
 

<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</div>
<script src='../plugin/tablesort/tablesort.js'></script>

<!-- Include sort types you need -->
<script src='../plugin/tablesort/sorts/tablesort.dotsep.js'></script>
<!--<script src='tablesort.date.js'></script>-->

<script>
  new Tablesort(document.getElementById('table-id'));
  const slider = document.querySelector('#resultadohed');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', () => {
  isDown = false;
});
slider.addEventListener('mouseup', () => {
  isDown = false;
});
slider.addEventListener('mousemove', (e) => {
  if(!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX) * 1; //scroll-fast
  slider.scrollLeft = scrollLeft - walk;
  console.log(walk);
});

$(function() {
  $('[data-toggle="popover"]').popover({
		html: true,
    content: function() {
      return $('#popover-content').html();
    }
  });
})
$(function() {
  $('[data-toggle="popover2"]').popover({
		html: true,
    content: function() {
      return $('#popover-content2').html();
    }
  });
})
</script>
</body>
</html>