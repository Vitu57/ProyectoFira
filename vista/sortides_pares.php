<!DOCTYPE html>
<html>
<head>
  <title>Sortides</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <script type="text/javascript" src="../js/ajax.js"></script>
        <script type="text/javascript" src="../js/primera_visita.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--Calendario-->
  <link href="https://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
  
  <link rel="stylesheet" href="calendar/css/vanilla-calendar-min.css">
  <script src="calendar/js/vanilla-calendar-min.js"></script>
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>

<?php
include "../services/conexion.php";
include "../services/header_pares.php";


//Pasamos el id del usuario desde el login
$id=$_SESSION['id_pares'];
$cognom=$_SESSION['cognom'];
$nom=$_SESSION['nombre'];


//mostrará el tutorial si es la primera visita
if ($_SESSION['cont_visitas']==1) {
  echo "<body class='home' onload='tutorial_sortides_pares();'>";


//Modal de visita guiada
?>
<div id="resultado4" class="modalmask" style="display:none; margin-top: -9%; width: 32%; margin-left: 23%; height: 25%;">

      <div class="modalbox movedown" id="resultadoContent4">
        <a href="#" title="Close4" class="close" id="close4" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado4">TITULO</h2>
        <div id="contenidoResultado4">contenido resultado</div>
      </div>
</div>
<?php

}else{
  echo "<body class='home'>";
}


//Comprueba que llega el id del hijo
if (isset($_REQUEST['fill'])) {
   $id_fill=$_REQUEST['fill'];
}else{
  header("location: home_pares.php");
}

//consulta para comprobar si es su hijo realmente y saber su nombre
$consulta="SELECT tbl_alumnes.nom_alumne FROM tbl_alumnes INNER JOIN tbl_pares_alumnes ON tbl_alumnes.id_alumne=tbl_pares_alumnes.id_alumne INNER JOIN tbl_pares ON tbl_pares_alumnes.id_pares=tbl_pares.id_pares WHERE tbl_pares_alumnes.id_pares='$id' AND tbl_pares_alumnes.id_alumne='$id_fill'";

  $exe=mysqli_query($conn,$consulta);    

if (mysqli_num_rows($exe)!=0){

     $casos=mysqli_fetch_array($exe);
     
     $nom_fill=$casos[0];

}else{

//Si no es su hijo reenvia a home
  header("location: home_pares.php");
}


?>

<div class='header'>

<h1 style='text-align: left; float:left; width:39%;'></h1><h2 style='text-align: center; width: 12%; margin-left: 4%; float:left; color:#0062ae;'>Sortides de <?php echo $nom_fill; ?></h2>

<?php
echo "<h3 class='txthead'>".$nom." ".$cognom."<a href='../services/logout_pares.php' style='text-decoration:none;'><img src='../images/icon-logout.svg' style='margin-left:2%; margin-top:-1%;'></a></h3>";

?>

  <a href="../vista/home_pares.php">
  <i class="fas fa-arrow-circle-left fa-3x" title="Tornar" style="float: left; margin-top: -3.5%; margin-left: 1.3%;  margin-right:80%; color: #071334;" class="btn btn-secondary"></i>
</a>
</div>
<?php

//consulta para mostrar las sortides de su hijo
$consulta="SELECT tbl_activitat.nom_activitat, tbl_sortida.inici_sortida, tbl_sortida.final_sortida, tbl_sortida.id_sortida FROM tbl_activitat INNER JOIN tbl_sortida ON tbl_sortida.id_sortida=tbl_activitat.id_sortida INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_alumnes ON tbl_alumnes.id_clase=tbl_clase.id_clase INNER JOIN tbl_galeria ON tbl_galeria.id_sortida=tbl_sortida.id_sortida WHERE tbl_alumnes.id_alumne='$id_fill' AND tbl_galeria.cont_subidas=1 ORDER BY tbl_sortida.final_sortida DESC";
     
     if ($exe=mysqli_query($conn,$consulta)){
       
        if (mysqli_num_rows($exe)==0) {

        echo "<div class='div-fotos-pares'><h1 class='nofotos'>No hi han fotos de les sortides</h1>
        <a href='home_pares.php'><button class='btn btn-lg btn-fotos-pares'>Tornar</button></a></div>";

        }else{

     while ($casos=mysqli_fetch_array($exe)){

echo "<a title='Veure Fotos de ".$casos[0]."' style='color:white; text-decoration:none;' href='../vista/galeria_fotos.php?id_exc=".$casos[3]."&accion=ver_img'><button class='myBtn_sortides_pares'>";

$newDate = date("d/m/Y", strtotime($casos[1]));

      echo "<i class='far fa-image fa-3x' style='float:left; margin-top:-11%; margin-left:4%;'></i><h3>".$casos[0]."</h3><br>";
      echo "<h5>".$newDate;
    //Si la fecha de salida es la misma solo la muestra una vez
      if ($casos[1]!=$casos[2]) {
$newDate = date("d/m/Y", strtotime($casos[2]));        
       echo " - ".$newDate;
      }

      echo "</h5></div></a>";
}
}

 echo "</button>";

}else{
  echo "Error en la consulta";
}

?>

<div class="footer">
  <img src="../images/logo_fje.svg">
</div>
</body>
</html>
