<?php
//Si la sesión está iniciada redirigirá al home
session_start();
if(isset($_SESSION['nombre'])){
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="../images/logo_pag.ico">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="../css/style_login.css">

</head>
<body>
  <script src="../js/code_login.js"></script>
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

   
    <form action="../services/index.proc.php" method="POST" onsubmit="return validar_login();">
      <input type="text" id="username" class="fadeIn second" placeholder="Usuari" name="username" value="<?php 
      if (isset($_REQUEST['us'])) {
          $user=$_REQUEST['us'];
          echo $user;
      }
  ?>">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contrasenya">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
<!--Si está definido el nombre de usuario significa que se ha equivocado de contraseña, por lo cual, se marcará en rojo-->
    <?php
if(isset($_REQUEST['us'])){
    echo "<script type='text/javascript'>error_pass();</script>";
    
}
?>
    <!-- Texto Extra -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Si no t'enrecordes de la contrasenya, contacta amb administració</a>
    </div>

  </div>
</div>

</body>
</html>

