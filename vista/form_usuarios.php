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

<body class="body_design" onload="select_tipus_usuari();">
   <a href="../vista/home.php">
  <i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: 2%; color: white; position:absolute; margin-left:2%;" class="btn btn-secondary"></i>
</a>  
<div id="usuaris" class="text-center border border-light p-5 mt-5 div_form" style="display: block;">
<form class="text-center" action="#" autocomplete="off" onsubmit="return validar_form_users();" >

<p class="h4 mb-4">Afegir Usuaris</p>

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

<!-- E-mail/user -->
<div class="form-row mb-1">
  <div class="col">
    <input type="text" id="mailusu" class="form-control mb-4" placeholder="Usuari *" autocomplete="off">
    <small id="usuarioexistente" class="form-text text-danger d-none">
    Aquest usuari ja existeix.
  </small>
  </div>
<!-- Tipo usuario -->
<div class="col d-none" id="divclass">
    <select class="browser-default custom-select mb-2" id="selectclass">
    </select>
  </div>
<div class="col">
    <select class="browser-default custom-select mb-2" id="tipususu">
    </select>
  </div>
</div>

<div class="form-row">
<!-- Contraseña -->

  <div class="col">
  <input type="password" id="passwd1" class="form-control" placeholder="Contrasenya *" aria-describedby="defaultRegisterFormPasswordHelpBlock" autocomplete="off">
  <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
    Com a mínim 4 dígits.
  </small>
  </div>
<!-- Confirmación Contraseña -->
<div class="col">
<input type="password" id="passwd2" class="form-control" placeholder="Repeteix Contrasenya *" aria-describedby="defaultRegisterFormPasswordHelpBlock" autocomplete="off">
<small id="passdiferente" class="form-text mb-4 text-danger d-none">
    La contrasenya no es la mateixa.
  </small>
  </div>
</div>

<div class="form-row mb-3>">
<!-- Siei si o no-->
  <div class="col">
  <label>Preparació Alumnes SIEI/Alumne SIEI</label>
    <label class="switch">
      <input type="checkbox" id="sieiusu" value="1">
      <span class="slider round"></span>
    </label>
  </div>

  <div class="col">
  <label>Professor Computable</label>
    <label class="switch">
      <input type="checkbox" id="computableusu" value="1">
      <span class="slider round"></span>
    </label>
  </div>
</div>
<input type="hidden" value="ok" id="okusuario"/>
<!-- Sign up button -->
<button class="btn btn-info mt-4 btn-block" type="submit">Afegir</button>
</form>
<!-- Default form register -->
</div>
  <script type="text/javascript" src="../js/codigo2.js"></script>
<div class="footer page-footer">
  <img src="../images/logo_fje.svg">
</div>
</body>
</html>