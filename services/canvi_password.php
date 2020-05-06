<?php
include "conexion.php";

if (isset($_REQUEST['email'])) {
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$id=$_REQUEST['id'];
}else{
	header("location: ../vista/home.php");
}

//consulta para saber si es el padre correcto
$consulta="SELECT usuari, nom_usuari, cognom_usuari FROM tbl_usuari WHERE usuari='$email' AND id_usuari='$id'";

  $exe=mysqli_query($conn,$consulta);    

if (mysqli_num_rows($exe)!=0){

     $casos=mysqli_fetch_array($exe);
     
     $email=$casos[0];
     $nom=$casos[1];
     $cognoms=$casos[2];


   //Si es el padre correcto cambia la contraseña

$pass=md5($pass);

$consulta="UPDATE tbl_usuari SET contrasenya = '$pass' WHERE id_usuari = '$id'";

  $exe=mysqli_query($conn,$consulta);

?>

<h4>S'ha canviat la clau correctament,<br> prova a tornar a <a href="../vista/login.php">iniciar sessió.</a><h4>

<?php

//Envia mail conforme se ha cambiado la contraseña

// Multiple recipients
$to = $email;

// Subject
$subject = "S'ha canviat la vostra clau";

// Message
$message = "
<html>
<body>
  <p>La seva clau s'ha canviat correctament.</p>
  <p>La seva contrasenya ha estat canviada correctament.</p>
  <p>Ja pots <a href='http://localhost/daw/ProyectoFira/vista/login.php'>inicar sessió</a> amb la teva nova contrasenya.</p>
  <p>Si no has estat tu, siusplau contacta amb administració immediatament.</p>
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: '.$nom.' '.$cognoms.'  <'.$email.'>';
$headers[] = 'From: Administració sortides <proyectesortidesdaw2@gmail.com>';
$headers[] = 'Cc:';
$headers[] = 'Bcc:';

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));


}else{
	?>
  <h4 style="margin-top: -4%; float: center;">Introdueix les dades en el formulari per actualitzar la clau.</h4><br>
 <div id="mensaje" style="color: red; margin-bottom: 5%;"></div>
<form action="#" onsubmit="recuperar_pass(<?php echo $id; ?>); return false" method="post">
  <p style="color: red;">El email introduït no correspon amb el teu usuari</p>
  <h5>Email</h5>
  <input type="email" class='email_style' id="email" name="email"><br><br>
    <h5>Nova clau</h5>
  <input type="password" class='email_style' id="pass1" name="pass1"><br><br>
    <h5>Confirmar nova clau</h5>
  <input type="password" class='email_style' id="pass2" name="pass2"><br><br>
  <input type="submit" class="btn btn-lg btn-par" name="enviar">
</form>

<?php
}     
?>