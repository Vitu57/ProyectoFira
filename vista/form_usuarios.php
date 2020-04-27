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
   <a href="../vista/home.php">
  <i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: 2%; color: white; position:absolute; margin-left:2%;" class="btn btn-secondary"></i>
</a>  
<div id="usuaris" class="text-center border border-light p-5 mt-5 div_form" style="display: block;">
<form class="text-center" action="#!">

<p class="h4 mb-4">Afegir Usuaris</p>

<div class="form-row mb-4">
    <div class="col">
        <!-- First name -->
        <input type="text" id="Nombreusu" class="form-control" placeholder="Nom">
    </div>
    <div class="col">
        <!-- Last name -->
        <input type="text" id="apellidosusu" class="form-control" placeholder="Cognoms">
    </div>
</div>

<!-- E-mail -->
<div class="form-row mb-1">
  <div class="col">
    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">
  </div>
<!-- Password -->
<div class="col">
    <select class="browser-default custom-select mb-2">
        <option value="" selected disabled>Tipus Usuari</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
  </div>
</div>

<div class="form-row">
  <div class="col">
  <input type="password" id="passwd1" class="form-control" placeholder="Contrasenya" aria-describedby="defaultRegisterFormPasswordHelpBlock">
  <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
    Com a mínim 4 dígits.
  </small>
  </div>
<!-- Password -->
<div class="col">
<input type="password" id="passwd2" class="form-control" placeholder="Repeteix Contrasenya" aria-describedby="defaultRegisterFormPasswordHelpBlock">

  </div>
</div>



<div class="form-row mb-3>">
<!-- Siei si o no-->
  <div class="col">
  <label>Preparació Alumnes SIEI</label>
    <label class="switch">
      <input type="checkbox">
      <span class="slider round"></span>
    </label>
  </div>

  <div class="col">
  <label>Professor Computable</label>
    <label class="switch">
      <input type="checkbox">
      <span class="slider round"></span>
    </label>
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