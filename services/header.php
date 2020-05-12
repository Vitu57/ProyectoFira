<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
    //Mantengo la sesion. Por ende puedo utilizar la variable $_SESSION anteriormente configurada
    session_start();
    if (isset($_SESSION['id'])) {
        $usernom=$_SESSION['nombre'];
		$usercognom=$_SESSION['cognom'];
        $FechaActual=date("Y-m-d");
    } else {
        header("Location: ../index.php");
    }
    ?>
	</div> 
</body>
</html>