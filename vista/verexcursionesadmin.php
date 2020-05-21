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

//Comprueba si es la primera vez que entra el usuario
if ($_SESSION['cont_visitas']==1) {
?>
<body class="home" style="text-align: center; padding: 5%; padding-top: 2%;" onload="tutorialadmin(); tutorialadmin2(); tutorialCSV(); tutoriallogout(); tutorialreturn();">
<?php

include "../services/tutorial.proc.php";

}else{
?>
<body class="home" style="text-align: center; padding: 5%; padding-top: 2%;"> 
<?php  
}

//Pasamos el id del usuario desde el login
$id=$_SESSION['id'];

//consulta para saber los datos del usuario logeado y el tipo
$consulta="SELECT * FROM tbl_usuari INNER JOIN tbl_tipus_usuari ON tbl_usuari.id_tipus_usuari=tbl_tipus_usuari.id_tipus_usuari WHERE id_usuari='$id'";
      $exe=mysqli_query($conn,$consulta);
      $casos=mysqli_fetch_array($exe);
        $nom=$casos['nom_usuari'];
        $cognom=$casos['cognom_usuari'];
        
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
<a style='color:#d60909; float: right; margin-top: -0.5%;' title="Tanca la sessió" href='../services/logout.php'><i class='fas fa-power-off fa-3x'></i></a>

  <div style="padding: 1%; text-align: left;">
    <h1 style="text-align: center; margin-bottom: 4%; font-size: 47px; margin-top: -2%;">Sortides Administrador</h1>
  </div></div>
<div class="header" style=" background-color: rgba(255,255,255,1);border-radius: 15px; border-bottom: 0px;">
<div style="padding: 3%;padding-top: 0%; padding-bottom: 0%;">
	
	<form action="#" method="POST" onsubmit="return false;">
		<input type="date" class="espacio_filtros" name="fecha" id="fecha" placeholder="Data">
    <select name="clase" class="espacio_filtros" id="clase">
       		<option value="">Clase</option>
			<?php

	$consulta="SELECT nom_classe FROM tbl_clase Where nom_classe<>'PERSONAL'";
	$exe=mysqli_query($conn,$consulta);
    while ($casos=mysqli_fetch_array($exe)){

	echo "<option>".$casos['nom_classe']."</option>";
}
?>
</select>

<input type="text" name="profe" class="espacio_filtros" id="profe" placeholder="Professor">
		<input type="submit" class="btn btn-lg filtrado_admin"  name="submit" value="Filtrar" onclick="filtrar();return false;">
		<button class="btn btn-lg filtrado_admin" name="submit" value="Veure tots" action="#" method="POST" onclick="vertodo();return false">
		Veure Tots</button>
	</form>
           
  <div id="resultado" class="scrollhori" style="overflow-y:scroll; height: 22rem;position:relative; margin-top:5%; left: 50%; transform: translateX(-50%);z-index:0;">
  <?php
     include "tabladmin.php";
  ?> 
  </div>
<!-- Mostrar mas !-->
<div style="position: absolute; top: 27.5%; right:8.5%;">
    <button id="btn_profes" class="btn_mos" onclick="Mostrar_Profesores(<?php echo $cont; ?>); return false;" value="0">Profesors i Vetlladors</button>
<button id="btn_al" class="btn_mos" onclick="Mostrar_Alumnes(<?php echo $cont; ?>); return false;" value="0">Alumnes i Acompanyants</button>
<button id="btn_tipus"class="btn_mos" onclick="Mostrar_Tipus(<?php echo $cont; ?>); return false;" value="0">Tipus i Ambit</button>
</div>
  <br>
  
<!-- Exportar a CSV !-->
   <form action="../services/csv_admin.php" method="POST">
  	<a href="../services/csv_admin.php"><input class="btn btn-lg filtrado_admin" type="submit" name="exportarCSV" value="Exportar dades">
  </form>
 

<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</div>
<script src='../plugin/tablesort/tablesort.js'></script>

<script>
  new Tablesort(document.getElementById('table-id'));

const slider = document.querySelector('#resultado');
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
<div id="resultado2" class="modalmask" style="display:none;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Close" class="close" id="close" style="color:black; background-color:#f1f1f1; margin-right:2%;">X</a>
        <h2 id="tituloResultado">TITULO</h2>
        <div id="contenidoResultado">contenido resultado</div>
      </div>
</div>
</body>
</html>