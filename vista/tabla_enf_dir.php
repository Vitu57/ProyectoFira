
<?php
include "../services/conexion.php";
//Estos son los valores que tiene el filtro, si no los encuentra los pone vacios
if(isset($_REQUEST['fecha'])){
  $fecha=$_REQUEST['fecha'];
}else{
  $fecha="";
}
if(isset($_REQUEST['clase'])){
  $clase=$_REQUEST['clase'];
}else{
  $clase="";
}
if(isset($_REQUEST['profe'])){
  $profe=$_REQUEST['profe'];
}else{
  $profe="";
}
if(isset($_REQUEST['jornada'])){
  $jornada=$_REQUEST['jornada'];
}else{
  $jornada="";
}


$fecha_actual = date('Y-m-d');

?>
  <table  class='table table-bordered'>
  <thead>
      <tr>
   <th scope="col">Codi sortida</th>     
   <th scope="col">Clase</th>
   <th scope="col">Inici de la sortida</th>
   <th scope="col">Final de la sortida</th>
   <th scope='col'>Hora de sortida</th>
   <th scope='col'>Hora d'arribada</th>
   <th scope='col'>Activitat</th>
   <th scope='col'>Profesor asignat</th>
   <th scope='col'>Numero de vetlladors</th>
   <th scope='col'>Numero de profesors</th>
   <th scope='col'>Numero d'alumnes</th>
   <th scope="col">Jornada</th>

  </tr>

<?php

    //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase where tbl_sortida.inici_sortida > '$fecha_actual' and tbl_sortida.inici_sortida like '%".$fecha."%' and tbl_clase.nom_classe like '%".$clase."%' and tbl_sortida.profesor_asignat like '%".$profe."%' and tbl_sortida.profesor_asignat like '%".$profe."%'and tbl_activitat.jornada_activitat like '%".$jornada."%' ORDER BY tbl_sortida.inici_sortida";
      $exe=mysqli_query($conn,$consulta);
     while ($casos=mysqli_fetch_array($exe)){

        $codi=$casos['codi_sortida'];
        $nomClase=$casos['nom_classe'];
        $vetlladors=$casos['n_vetlladors'];
        $profesor_asignat=$casos['profesor_asignat'];
        $activitat=$casos['nom_activitat'];
        $profe=$casos['profes_a_part'];
        $alumnes=$casos['numero_alumnes'];
        $inici=$casos['inici_sortida'];
        $final=$casos['final_sortida'];
        $horaSortida=$casos['hora_sortida'];
        $horaArribada=$casos['hora_arribada'];
        $nomClase=$casos['nom_classe'];
        $jornada=$casos['jornada_activitat'];

echo "<tr>";
       echo "<td>".$codi."</td>";
       echo "<td>".$nomClase."</td>";
       echo "<td>".$inici."</td>";
       echo "<td>".$final."</td>";
       echo "<td>".$horaSortida."</td>";
       echo "<td>".$horaArribada."</td>";
       echo "<td>".$activitat."</td>";
       echo "<td>".$profesor_asignat."</td>";
       echo "<td>".$vetlladors."</td>";
       echo "<td>".$profe."</td>";
       echo "<td>".$alumnes."</td>";
       echo "<td>".$jornada."</td>";
       echo "</tr>";
}

   
    ?>


</table>