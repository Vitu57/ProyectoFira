<!DOCTYPE html>
<html>
<head>
  <title>Excursions</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="home">
  

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

//evita que entre alguien que no sea de administración, enfermería o el admin
if ($tipus_user!=5 AND $tipus_user!=6 AND $tipus_user!=1) {

header("location: home.php");

}else{

echo "<div class='header'>";
echo "<h3 class='txthead'><a href='../services/logout.php'>Tanca la sessió</a></h3>";

//logout
echo "<h3 class='txthead2'>Benvingut ".$nom." ".$cognom."</h3>";

echo "<h1 style='text-align: center;'>".$nom_tipus."</h1>";


//Tabla con todas las salidas
?>
</div>
<table style="color: white; text-align: center;" class="table">
   <thead>
  <tr>
   <th scope="col">Etapa</th>
   <th scope="col">Clase</th>
   <th scope="col">Inici de la sortida</th>
   <th scope="col">Final de la sortida</th>
   <th scope='col'>Hora de sortida</th>
   <th scope='col'>Hora d'arribada</th>
   <th scope='col'>Numero de vetlladors</th>
   <th scope='col'>Numero de profesors</th>
   <th scope='col'>Numero d'alumnes</th>

  </tr>

<?php

$fecha_actual = date('Y-m-d');

    //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_clase=tbl_etapa.id_etapa where tbl_sortida.inici_sortida > '$fecha_actual' ORDER BY tbl_sortida.inici_sortida";
      $exe=mysqli_query($conn,$consulta);
     while ($casos=mysqli_fetch_array($exe)){

        $vetlladors=$casos['n_vetlladors'];
        $profe=$casos['profes_a_part'];
        $alumnes=$casos['numero_alumnes'];
        $inici=$casos['inici_sortida'];
        $final=$casos['final_sortida'];
        $horaSortida=$casos['hora_sortida'];
        $horaArribada=$casos['hora_arribada'];
        $nomClase=$casos['nom_classe'];
        $nomEtapa=$casos['nom_etapa'];

echo "<tr>";
       echo "<td>".$nomEtapa."</td>";
       echo "<td>".$nomClase."</td>";
       echo "<td>".$inici."</td>";
       echo "<td>".$final."</td>";
       echo "<td>".$horaSortida."</td>";
       echo "<td>".$horaArribada."</td>";
       echo "<td>".$vetlladors."</td>";
       echo "<td>".$profe."</td>";
       echo "<td>".$alumnes."</td>";
}
echo "</tr>";
   
    ?>


</table>

<div class="footer">
  <img src="../img/logo-centro-footer.svg">
</div>

<?php
}
?>

</body>
</html>