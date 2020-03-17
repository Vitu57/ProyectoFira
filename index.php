<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="css/style_login.css">

</head>
<body>
  <script src="/js/code_login.js"></script>
<link href="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
     <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    -->
  <h3>Login Sortides</h3>
  </div>

    <!-- Formulario login -->
    <form action="services/index.proc.php" method="POST">
      <input type="text" id="username" class="fadeIn second" placeholder="Usuari" name="username" value="<?php 
      if (isset($_GET['us'])) {
          $user=$_GET['us'];
          echo $user;
      }
  ?>">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contrasenya">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Texto Extra -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Si no t'enrecordes de la contrasenya, contacta amb administració</a>
    </div>

  </div>
</div>

</body>
</html>