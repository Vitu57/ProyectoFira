<?php
include "../services/conexion.php";
include "../services/header.php";
if (!$_SESSION['id']) {
  header("location:login.php");
}

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
<!--Enlace js para ajax.js-->
<script type="text/javascript" src="../js/ajax.js"></script>

<body class="body_design">
    <a href="../home.php">
  <i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: 2%; color: white; position:absolute; margin-left:2%;" class="btn btn-secondary"></i>
</a>  


  <div id="usuaris" class="text-center border border-light p-5 mt-5 div_form" style="display: block;">

<form class="text-center" action="#">
<p class="h4 mb-4">Editar Alumne</p>

<div class="form-row mb-1">
  <div class="col">
    <select class="browser-default custom-select mb-2" id="clases" onchange="mostraralumnos();">
      <option value="" selected disabled>Clase</option>
      <?php
        $consultaclases="select tbl_clase.id_clase,tbl_clase.nom_classe from tbl_clase where nom_classe!='PERSONAL'";
        $queryclases=mysqli_query($conn,$consultaclases);
        while ($clase=mysqli_fetch_array($queryclases)) {
          echo " <option value=".$clase[0].">".$clase[1]."</option>";
        }
      ?>
    </select>
  </div>
<!-- Password -->
<div class="col" id="alumnos_clase">
  <?php
    include '../services/consulta_alumnos.php';
  ?>
</div>
</div>
<p class="h4 mb-4">Noves Dades</p>

<select class="browser-default custom-select mb-2" id="clases2" onchange="mostraralumnos();">
      <option value="" selected disabled>Clase</option>
      <?php
        $consultaclases="select tbl_clase.id_clase,tbl_clase.nom_classe from tbl_clase where nom_classe!='PERSONAL'";
        $queryclases=mysqli_query($conn,$consultaclases);
        while ($clase=mysqli_fetch_array($queryclases)) {
          echo " <option value=".$clase[0].">".$clase[1]."</option>";
        }
      ?>
    </select>

<div class="form-row mb-1">
    <div class="col">
        <!-- Nombre-->
        <input type="text" id="nombreusu" class="form-control" placeholder="Nom *" autocomplete="off">
    </div>
    <div class="col">
        <!-- Apellidos -->
        <input type="text" id="apellidosusu" class="form-control mb-4" placeholder="Cognoms *" autocomplete="off">
        <small id="numapellidos" class="form-text text-danger d-none">
    Has de posar 2 cognoms com a máxim.
  </small>
    </div>
    
</div>

<!-- Sign up button -->
<?php
echo '<button class="btn btn-info mt-4 btn-block" type="submit" id="anadir" onclick="cambiarClase();return false;">Eliminar</button>'
?>
<div id="mensaje">
  
</div>
</form>
<!-- Default form register -->
</div>
  <script type="text/javascript" src="../js/codigo.js"></script>
<div class="footer page-footer">
  <img src="../images/logo_fje.svg">
</div>
</body>
</html>
