<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style_form.css">
    <link rel="stylesheet" type="text/css" href="../css/style_form_usuaris.css">
    <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <script type="text/javascript" src="../js/ajax.js"></script>
  


  <!--Bootstrap css y Jquery-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!--Popper y Fontawesome-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<body class="home" style="text-align: center; padding: 2%;" onload="ver_usuarios(); select_tipus_usuari();">

<!--Sweet alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script type="text/javascript" src="../js/veure_usuaris.js"></script>

<?php
include "../services/conexion.php";
include "../services/header.php";

//Comprobar que solo puedan entrar los usuarios designados
$tipo=$_SESSION['tipo'];

if ($tipo!=1) {
	header("location: ../index.php");
}

?>

<div class="header" id="resultado"  style="border-radius: 15px;">
	<div style="padding: 3%">
	<a href="../vista/home.php">
	<i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: -1%; color: #071334;" class="btn btn-secondary"></i>
</a>
<h2 class="text-center">Veure Usuaris</h2>


    <form action="#" method ="POST">
    <input type="text" id="user_filtre" placeholder="Usuario">
    <input type="text" id="nom_filtre" placeholder="Nom">
    <input type="text" id="cognom_filtre" placeholder="Cognom">
    <select id="tipus_filtre">
      <option selected disabled value="0" class="browser-default custom-select mb-2">Tipus d'usuari</option>
</select>
</form>

  <div id="resultado_users" class="">

  </div>
  </div>
  </div>
<!---------------------------------------------Form de modificar-------------------------------------->
  <div id="form_modificar" class="d-none">
  <div id="usuaris" class="text-center border border-light p-5 mt-5 div_form" style="display: block;">
<form class="text-center" action="#" autocomplete="off" onsubmit="return validar_form_users2();" >

<p class="h4 mb-4">Editar L'usuari X</p>

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
<input type="hidden" value="" id="id_usu"/>
<!-- Sign up button -->
<button class="btn btn-info mt-4 btn-block" type="submit">Afegir</button>
</form>
<!-- Default form register -->
<script type="text/javascript" src="../js/codigo2.js"></script>
</div>
<!-- Mostrar mas !-->

</div>
<div class="footer">
 <img src="../images/logo_fje.svg">
</div>
</div>
</body>
</html>