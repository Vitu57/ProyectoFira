<?php
include "conexion.php";

if (isset($_REQUEST['dni'])) {
	$dni=$_REQUEST['dni'];
}else{
	header("location: ../vista/home_pares.php");
}

//consulta para saber el email del padre
$consulta="SELECT email_pares, nom_pares, cognoms_pares, id_pares FROM tbl_pares WHERE usuari_pares=?";


if ($stmt = mysqli_prepare($conn, $consulta)){
            mysqli_stmt_bind_param($stmt, "s", $dni);
            mysqli_stmt_execute($stmt);
            $exe = mysqli_stmt_get_result($stmt);  

if (mysqli_num_rows($exe)!=0){

     $casos=mysqli_fetch_array($exe);
     
     $email=$casos[0];
     $nom=$casos[1];
     $cognoms=$casos[2];
     $id=$casos[3];


// Multiple recipients
$to = $email;

// Subject
$subject = 'Has oblidat la clau?';

// Message
$message = "
<html>
<head>
  <title>Ha sigut sol·licitat el canvi de clau per al seu usuari.</title>
</head>
<body>
  <p>Ha sigut sol·licitat el canvi de clau per al seu usuari.</p>
  <p>Si vols cambiar la clau fes click al següent enllaç y actualitza la teva contrasenya <a href='http://localhost/daw/ProyectoFira/vista/canvi_clau_pares.php?q4t5ywt62g=".$id."'>Canviar la contrasenya</a>.</p>
  <p>Si no has sol·licitat el canvi de clau, ignora aquest missatge.</p>
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

  echo "<h3>S'ha enviat l'adreça per fer el canvi de clau al vostre correu electrònic.</h3><br>";

}else{
	?>
<form action="#" onsubmit="recuperar_password_pares(); return false" method="post">
  <h5>El DNI introduït no correspon a cap usuari, proba de nou.</h5><br>
<input type="text" id="dni" name="dni" placeholder="DNI" required><br><br>
  <input type="submit" class="btn btn-par"  name="enviar">
</form>

<?php
}    
}else{
  echo "Error en la consulta";
} 
?>