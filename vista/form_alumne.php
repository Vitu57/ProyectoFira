<?php
include "../services/conexion.php";
include "../services/header.php";
if (!$_SESSION['id']) {
  header("location:login.php");
}
$id_activitat=$_GET['id_actividad'];
$clase=$_GET['clase'];
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
    <a href="pasarlista.php?id_actividad=<?php echo $id_activitat; ?>&clase=<?php echo $clase; ?>">
  <i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: 2%; color: white; position:absolute; margin-left:2%;" class="btn btn-secondary"></i>
</a>  
<?php
function isMobile() {
      return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
if (isMobile()) {
  ?>
  <div id="usuaris" class="text-center border border-light p-5 mt-5" style="display: block;background-color: rgba(255,255,255,0.9);border:1px solid rgba(255,255,255,0.9); border-radius: 5%;">
  <?php
}else{
  ?>
  <div id="usuaris" class="text-center border border-light p-5 mt-5 div_form" style="display: block;">
  <?php
}
?>
<form class="text-center" action="#">
<p class="h4 mb-4">Afegir Alumne</p>

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

<!-- Sign up button -->
<?php
echo '<button class="btn btn-info mt-4 btn-block" type="submit" id="anadir" onclick="anadirlista('.$id_activitat.');return false;">Afegir</button>'
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