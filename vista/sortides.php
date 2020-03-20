<!DOCTYPE html>
<html>
<head>
  <title>Excursions</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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


echo "<div class='header'>";
echo "<h3 class='txthead'><a href='../services/logout.php'>Tanca la sessió</a></h3>";

//logout
echo "<h3 class='txthead2'>Benvingut ".$nom." ".$cognom."</h3>";

echo "<h1 style='text-align: center;'>".$nom_tipus."</h1>";
?>
</div>

<table id="sortidesTable" class="table">
   <thead>
  <tr>
    <?php
     if ($tipus_user==1 || $tipus_user==3 || $tipus_user==6) {
       echo "<th scope='col'>Codi Sortida</th>";
       echo "<th scope='col'>Vetlladors</th>";
       echo "<th scope='col'>Profesors</th>";
     }

    ?>
    <th scope="col">Inici</th>
    <th scope="col">Final</th>
    <th scope="col">Nom Activitat</th>
    <th scope="col">Lloc</th>
    <th scope="col">Jornada</th>

    <?php
    if ($tipus_user<4 || $tipus_user==6) {   
    echo "<th scope='col'>Tipus</th>";
    echo "<th scope='col'>Ambit</th>";
    echo "<th scope='col'>Objectiu</th>";
    echo "<th scope='col'>Transport</th>";
    echo "<th scope='col'>Observacions</th>";
     }
    ?>
  </tr>

<?php

    //consulta para saber los datos de las salidas
$consulta="SELECT * FROM tbl_sortida";
      $exe=mysqli_query($conn,$consulta);
     while ($casos=mysqli_fetch_array($exe)){

        $id_sortida=$casos['id_sortida'];
        $codi_sortida=$casos['codi_sortida'];
        $vetlladors=$casos['n_vetlladors'];
        $profe=$casos['profes_a_part'];
        $inici=$casos['inici_sortida'];
        $final=$casos['final_sortida'];
        $observacions=$casos['observacions_sortida'];
        $id_transport=$casos['id_transport'];

echo "<tr>";
      
    if ($tipus_user==1 || $tipus_user==3 || $tipus_user==6) {
       echo "<td>".$codi_sortida."</td>";
       echo "<td>".$vetlladors."</td>";
       echo "<td>".$profe."</td>";
     }

   echo " <td>".$inici."</td>";
   echo " <td>".$final."</td>";


$cont=0;

    //consulta para saber los datos de las actividades de cada salida
$consulta="SELECT * FROM tbl_activitat WHERE id_sortida='$id_sortida'";
      $exe=mysqli_query($conn,$consulta);
     while ($casos=mysqli_fetch_array($exe)){
       
       //Se utiliza el $cont para saber cuantas actividades hay en esa salida
        $cont=$cont+1;
        
       //Se guarda la actividad en un ArrayList según su número 
        $nomAct[$cont]=$casos['nom_activitat'];
        $llocAct[$cont]=$casos['lloc_activitat'];
        $jorAct[$cont]=$casos['jornada_activitat'];
        $tipAct[$cont]=$casos['tipus_activitat'];
        $ambAct[$cont]=$casos['ambit_activitat'];
        $objectiu[$cont]=$casos['objectiu_activitat'];
        

      }

    
    //Se utilizan los for para mostrar el número de actividades que hay en la salida 
    echo "<td>";
    for ($i=1; $i <= $cont ; $i++) { 
     echo $nomAct[$i]."<br>";
    }
    echo "</td><td>";
    for ($i=1; $i <= $cont ; $i++) { 
     echo $llocAct[$i]."<br>";
    }
    echo "</td><td>";
    for ($i=1; $i <= $cont ; $i++) { 
     echo $jorAct[$i]."<br>";
    }
    echo "</td><td>";

//se mira que tipo de usuario es 
     if ($tipus_user<4 || $tipus_user==6) { 


     for ($i=1; $i <= $cont ; $i++) { 
     echo $tipAct[$i]."<br>";
    }
    echo "</td><td>";
    for ($i=1; $i <= $cont ; $i++) { 
     echo $ambAct[$i]."<br>";
    }
    echo "</td><td>";
    for ($i=1; $i <= $cont ; $i++) { 
     echo $objectiu[$i]."<br>";
    }
    echo "</td>";

 //consulta para saber el nombre del transporte
$consulta="SELECT * FROM tbl_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport WHERE tbl_transport.id_transport='$id_transport'";
      $exe=mysqli_query($conn,$consulta);
     $casos=mysqli_fetch_array($exe);

    $nomTransport=$casos['nom_transport'];
        

    echo "<td>".$nomTransport."</td>";
    echo "<td>".$observacions."</td>";
    
     }

echo "</tr>";
   }

    ?>


</table>

<div class="footer">
  <img src="../img/logo-centro-footer.svg">
</div>
</body>
</html>