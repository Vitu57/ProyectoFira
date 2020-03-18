<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/ajax.js"></script>
</head>
<body onload="modal(); modal2();">
<?php
include "../services/conexion.php";
include "../services/header.php";

//Pasamos el id del usuario desde el login
$id=$_SESSION['id'];

//consulta para saber los datos del usuario logeado y el tipo
$consulta="SELECT * FROM tbl_usuari INNER JOIN tbl_tipus_usuari ON tbl_usuari.id_tipus_usuari=tbl_tipus_usuari.id_tipus_usuari WHERE id_usuari='$id'";
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
?>

<!-- Trigger/Open The Modal -->
<button id='myBtn' style='padding: 75px; background-color:blue; width:200px;'>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
  
	
<?php
//ifs que según el tipo de usuario mostrará una tabla u otra
if ($tipus_user==1) {
    
?>
<a href="../vista/excursiones.php"><h2>Ver Excursiones</h2></a>

</div>
</div>
   <h2>Excursiones</h2>

</button><button id='myBtn2' style='padding: 75px; background-color:blue; width:200px;'>

<!-- The Modal -->
<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close2">&times;</span>
    <a href="../vista/usuarios.php"><h2>Ver Usuarios</h2></a>

</div>
</div>
      <h2>Usuarios</h2>

<?php
}else if($tipus_user==2){
		?>

<a href="../vista/excursiones_profesores.php"><h2>Ver Excursiones</h2></a>

</div>
</div>
       <h2>Excursiones</h2>
<?php
}else if($tipus_user==3){       
		?>
<a href="../vista/excursiones_secretaria.php"><h2>Ver Excursiones</h2></a>

</div>
</div>
    <h2>Excursiones</h2>
<?php
}else {
?>
<a href="../vista/excursiones.php"><h2>Ver Excursiones</h2></a>

</div>
</div>
    <h2>Excursiones</h2>
<?php
}

//fin de la tabla
echo "</button>";

?>

</body>
</html>

