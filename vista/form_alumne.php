<?php
include "../services/conexion.php";
include "../services/header.php";
if (!$_SESSION['id']) {
	header("location:login.php");
}
$id_activitat=$_GET['id_actividad'];
$clase=$_GET['clase'];
$consultaexcursion="SELECT nom_clase FROM tbl_transport inner join tbl_nom_transport on tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport where tbl_transport.id_transport=$transport";
$consulta=mysqli_query($conn,$consultaexcursion);
?>
<!doctype html>
<html lang="en" style="overflow: hidden; position: fixed;">

<head>
<!-- js y css para el switch de siei -->

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/style_form.css">
  <link rel="stylesheet" type="text/css" href="../css/style_form_usuaris.css">
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap CSS -->
  <!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
  <title>Afegir Sortida</title>
<!--Enlace css para toastr-->
  <link rel="stylesheet" type="text/css" href="../plugin/toastr/toastr.css">
</head>
<!--Enlace js para toastr-->
 <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../plugin/toastr/toastr.min.js"></script>

<body class="body_design">
    <a href="pasarlista.php?id_actividad=<?php echo $id_activitat; ?>&clase=<?php echo $clase; ?>">
  <i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: 2%; color: white; position:absolute; margin-left:2%;" class="btn btn-secondary"></i>
</a>  
<div id="usuaris" class="text-center border border-light p-5 mt-5 div_form" style="display: block;">
<form class="text-center" action="#!">

<p class="h4 mb-4">Afegir Alumne</p>

<div class="form-row mb-1">
  <div class="col">
    <select class="browser-default custom-select mb-2">
        <option value="" selected disabled>Clase</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
  </div>
<!-- Password -->
<div class="col">
    <select class="browser-default custom-select mb-2">
        <option value="" selected disabled>Nom i Cognoms</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
  </div>
</div>

<!-- Sign up button -->
<button class="btn btn-info mt-4 btn-block" type="submit">Afegir</button>
</form>
<!-- Default form register -->
</div>
  <script type="text/javascript" src="../js/codigo.js"></script>
<div class="footer page-footer">
  <img src="../images/logo_fje.svg">
</div>
</body>
</html>