<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
    //Mantengo la sesion. Por ende puedo utilizar la variable $_SESSION anteriormente configurada
    session_start();
    if (isset($_SESSION['id_pares'])) {
        $usernom=$_SESSION['nombre'];
		$usercognom=$_SESSION['cognom'];
    } else {
        header("Location: ../vista/login_pares.php");
    }
    ?>
	</div> 
</body>
</html>