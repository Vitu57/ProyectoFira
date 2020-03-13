<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
    //Mantengo la sesion. Por ende puedo utilizar la variable $_SESSION anteriormente configurada
    session_start();
    if (isset($_SESSION['iduser'])) {
        $userid=$_SESSION['iduser'];
        $nombre=$_SESSION['nombre'];
        include 'services/conexion.php';
    } else {
        header("Location: index.php");
    }
    ?>
	</div> 
</body>
</html>