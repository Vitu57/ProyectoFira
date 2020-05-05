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
  
  <link rel="stylesheet" href="calendar/css/vanilla-calendar-min.css">
  <script src="calendar/js/vanilla-calendar-min.js"></script>
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<body class="home">

<?php
include "../services/conexion.php";
include "../services/header_pares.php";


//Pasamos el id del usuario desde el login
$id=$_SESSION['id_pares'];
$cognom=$_SESSION['cognom'];
$nom=$_SESSION['nombre'];

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

<h1 style='text-align: left; float:left; width:45%;'></h1><h2 style='text-align: center; float:left; width:10%; color:#0062ae;'>Sortides de <?php echo $nom_fill; ?></h1>

<?php
echo "<h3 class='txthead'>".$nom." ".$cognom."<a href='../services/logout_pares.php' style='text-decoration:none;'><img src='../images/icon-logout.svg' style='margin-left:2%; margin-top:-1%;'></a></h3></div>";



//consulta para mostrar las sortides de su hijo



//!!!!!!!!!!!Falta mostrar solo las que tienen fotos!!!!!!!!!!!!!!!!!!!!!

$consulta="SELECT tbl_activitat.nom_activitat, tbl_sortida.inici_sortida, tbl_sortida.final_sortida FROM tbl_activitat INNER JOIN tbl_sortida ON tbl_sortida.id_sortida=tbl_activitat.id_sortida INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_alumnes ON tbl_alumnes.id_clase=tbl_clase.id_clase WHERE tbl_alumnes.id_alumne='$id_fill' ORDER BY tbl_sortida.final_sortida DESC";
      $exe=mysqli_query($conn,$consulta);
     while ($casos=mysqli_fetch_array($exe)){

echo "<div class='pares_sortides'>";

      echo "<h3>".$casos[0]."</h3><br>";
      echo "<h5>".$casos[1];
    //Si la fecha de salida es la misma solo la muestra una vez
      if ($casos[1]!=$casos[2]) {
       echo " - ".$casos[2];
      }

      echo "</h5></div>";
}


?>

 </div>

<div class="footer">
  <img src="../images/logo_fje.svg">
</div>
</body>
</html>
