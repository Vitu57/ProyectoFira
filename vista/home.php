<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

<?php
include "../services/conexion.php";
include "../services/header.php";

//consulta para saber los datos del usuario logeado y el tipo
$consulta="SELECT * FROM tbl_usuari INNER JOIN tbl_tipus_usuari ON tbl_usuari.id_tipus_usuari=tbl_tipus_usuari.id_tipus_usuari WHERE id_usuari=1";
			$exe=mysqli_query($conn,$consulta);
			$casos=mysqli_fetch_array($exe);
		    $nom=$casos['nom_usuari'];
		    $cognom=$casos['cognom_usuari'];	
		    $tipus_user=$casos['id_tipus_usuari'];
		    $nom_tipus=$casos['nom_tipus'];	

echo "<h3>Benvingut ".$nom." ".$cognom."</h3>";

//logout
echo "<a href='../services/logout.php'><h3>Tanca la sessió</h3></a>";

echo "<h1 style='text-align: center;'>".$nom_tipus."</h1>";


//inicio de tabla
echo"<div style='padding: 75px; background-color:blue; width:200px;'>";

//switch que según el tipo de usuario mostrará una tabla u otra
switch ($tipus_user) {
	case '1':
		
     echo "Excursiones";

echo "</div><div style='padding: 75px; background-color:blue; width:200px;'>";
      echo "Usuarios";

		break;
	
	case '2':
		
       echo "Excursiones";

		break;

    case '3':
		
		    echo "Excursiones";

		break;

    case '4':
		
    echo "Excursiones";

		break;

    case '5':
		
    echo "Excursiones";

		break;
	
}

//fin de la tabla
echo "</div>";

?>

</body>
</html>

