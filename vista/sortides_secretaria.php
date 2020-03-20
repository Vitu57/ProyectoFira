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

//evita que entre alguien que no sea de secretaria o el admin
if ($tipus_user!=3 AND $tipus_user!=1) {

header("location: home.php");

}else{

echo "<div class='header'>";
echo "<h3 class='txthead'><a href='../services/logout.php'>Tanca la sessió</a></h3>";

//logout
echo "<h3 class='txthead2'>Benvingut ".$nom." ".$cognom."</h3>";

echo "<h1 style='text-align: center;'>".$nom_tipus."</h1>";


//Tabla con todas las salidas y actividades
?>
</div>
<table style="color: white; text-align: center;" class="table">
   <thead>
  <tr>
  
   <th scope='col'>Codi Sortida</th>
   <th scope="col">Inici</th>
   <th scope="col">Final</th>
   <th scope='col'>Hora sortida</th>
   <th scope='col'>Hora arribada</th>
   <th scope='col'>Transport</th>
   <th scope='col'>Vetlladors</th>
   <th scope='col'>Profesors</th>
   <th scope='col'>Alumnes</th>
   <th scope="col">Nom Activitat</th>
   <th scope="col">Lloc</th>
   <th scope="col">Jornada</th>
   <th scope='col'>Ambit</th>


  </tr>

<?php

    //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport ";
      $exe=mysqli_query($conn,$consulta);
     while ($casos=mysqli_fetch_array($exe)){

        $id_sortida=$casos['id_sortida'];
        $codi_sortida=$casos['codi_sortida'];
        $vetlladors=$casos['n_vetlladors'];
        $profe=$casos['profes_a_part'];
        $alumnes=$casos['numero_alumnes'];
        $inici=$casos['inici_sortida'];
        $final=$casos['final_sortida'];
        $id_transport=$casos['id_transport'];
        $nomTransport=$casos['nom_transport'];
        $horaSortida=$casos['hora_sortida'];
        $horaArribada=$casos['hora_arribada'];

echo "<tr>";
  
       echo "<td>".$codi_sortida."</td>";
       echo " <td>".$inici."</td>";
       echo " <td>".$final."</td>";
       echo "<td>".$nomTransport."</td>";
       echo "<td>".$horaSortida."</td>";
       echo "<td>".$horaArribada."</td>";
       echo "<td>".$vetlladors."</td>";
       echo "<td>".$profe."</td>";
       echo "<td>".$alumnes."</td>";
 


$cont=0;

    //consulta para saber los datos de las actividades de cada salida
$consulta2="SELECT * FROM tbl_activitat WHERE id_sortida='$id_sortida'";
      $exe2=mysqli_query($conn,$consulta2);
     while ($casos2=mysqli_fetch_array($exe2)){
       
       //Se utiliza el $cont para saber cuantas actividades hay en esa salida
        $cont=$cont+1;
        
       //Se guarda la actividad en un ArrayList según su número 
        $nomAct[$cont]=$casos2['nom_activitat'];
        $llocAct[$cont]=$casos2['lloc_activitat'];
        $jorAct[$cont]=$casos2['jornada_activitat'];
        $ambAct[$cont]=$casos2['ambit_activitat'];

      }



    //Si hay mas de una se utilizan los for para mostrar el número de actividades que hay en la salida 
    echo "<td>";
    for ($i=1; $i <= $cont ; $i++) {
    
    //Comprueba si hay más de una actividad
      if ($cont>1) {   
    echo $i."- ".$nomAct[$i]."<br>";
     }else{
     echo $nomAct[$i];
   }
    }
    echo "</td><td>";
    for ($i=1; $i <= $cont ; $i++) { 
          if ($cont>1) {   
    echo $i."- ".$llocAct[$i]."<br>";
     }else{
     echo $llocAct[$i];
   }
    }
    echo "</td><td>";
    for ($i=1; $i <= $cont ; $i++) { 
           if ($cont>1) {   
    echo $i."- ".$jorAct[$i]."<br>";
     }else{
     echo $jorAct[$i];
   }
    }

    echo "</td><td>";
    for ($i=1; $i <= $cont ; $i++) { 
           if ($cont>1) {   
    echo $i."- ".$ambAct[$i]."<br>";
     }else{
     echo $ambAct[$i];
   }
 }
    echo "</td>";


    
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