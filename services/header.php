<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
    //Mantengo la sesion. Por ende puedo utilizar la variable $_SESSION anteriormente configurada
    session_start();
    if (isset($_SESSION['nombre'])) {
        $usernom=$_SESSION['nombre'];
    } else {
        header("Location: ../index.php");
    }
    ?>
	</div> 
</body>
</html>