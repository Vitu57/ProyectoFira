<?php
include "conexion.php";

if (isset($_REQUEST['dni'])) {
	$dni=$_REQUEST['dni'];
	$pass=$_REQUEST['pass'];
	$id=$_REQUEST['id'];
}else{
	header("location: ../vista/home_pares.php");
}

//consulta para saber si es el padre correcto
$consulta="SELECT email_pares, nom_pares, cognoms_pares FROM tbl_pares WHERE usuari_pares='$dni' AND id_pares='$id'";

  $exe=mysqli_query($conn,$consulta);    

if (mysqli_num_rows($exe)!=0){

     $casos=mysqli_fetch_array($exe);
     
     $email=$casos[0];
     $nom=$casos[1];
     $cognoms=$casos[2];


   //Si es el padre correcto cambia la contraseña

$pass=md5($pass);

$consulta="UPDATE tbl_pares SET password_pares = '$pass' WHERE id_pares='$id'";

  $exe=mysqli_query($conn,$consulta);

?>

<h4>S'ha canviat la clau correctament,<br> prova a tornar a <a href="../vista/login_pares.php">iniciar sessió.</a><h4>

<?php

//Envia mail conforme se ha cambiado la contraseña

// Multiple recipients
$to = $email;

// Subject
$subject = "S'ha canviat la vostra clau";

// Message
$message = "
<html>
<head>
  <title>La seva clau s'ha canviat correctament.</title>
</head>
<body>
  <p>La seva contrasenya ha estat canviada correctament.</p>
  <p>Ja pots <a href='http://localhost/daw/ProyectoFira/vista/login_pares.php'>inicar sessió</a> amb la teva nova contrasenya.</p>
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
   <h4 style="color: white;"> El DNI introduït no correspon amb el teu usuari, proba de nou<h4>
<form action="#" onsubmit="canvi_password_pares(<?php echo $id; ?>); return false" method="post">
  <h3 style="color: white;">DNI</h3>
  <input type="text" id="dni" name="dni"><br>
    <h3 style="color: white;">Nova clau</h3>
  <input type="pass1" id="pass1" name="pass1"><br>
    <h3 style="color: white;">Confirmar nova clau</h3>
  <input type="pass2" id="pass2" name="pass2"><br>
  <input type="submit" name="enviar">
</form>

<?php
}     
?>