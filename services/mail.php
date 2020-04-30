<?php
// Multiple recipients
$to = 'proyectesortidesdaw2@gmail.com'; // note the comma

// Subject
$subject = 'Ja estan disponibles les fotos de la sortida';

// Message
$message = '
<html>
<head>
  <title>Ja estan disponibles les fotos de la sortida a (nombre_salida)</title>
</head>
<body>
  <p>Ja estan disponibles les fotos de la sortida (nombre_salida) del seu fill/a!</p>
  <p>Podeu veure-les clicant al següent enllaç: (link)</p>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: Prueba <proyectesortidesdaw2@gmail.com>';
$headers[] = 'From: Administració sortides <proyectesortidesdaw2@gmail.com>';
$headers[] = 'Cc:';
$headers[] = 'Bcc:';

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
?>