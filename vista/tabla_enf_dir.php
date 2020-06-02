
<?php
include "../services/conexion.php";
//Estos son los valores que tiene el filtro, si no los encuentra los pone vacios
if(isset($_REQUEST['fecha'])){
  $fecha=$_REQUEST['fecha'];
}else{
  $fecha="";
}
if(isset($_REQUEST['etapa'])){
  $etapa=$_REQUEST['etapa'];
}else{
  $etapa="";
}

if ($etapa=="") {
  $clase="";

}else{

if(isset($_REQUEST['clase'])){
  $clase=$_REQUEST['clase'];
}else{
  $clase="";
}
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

  <table id="enfermerias" class="table table-bordered" style="text-align:center; background-color: rgba(255,255,255,1);"><thead class="thead-dark">
      <tr>
   <th scope="col">Codi</th>
	<th scope="col">Nom Sortida</th>
   <th scope="col">Etapa</th>    
   <th scope="col">Clase</th>
   <th scope="col">Inici</th>
   <th scope="col">Final</th>
   <th scope='col'>Hora de sortida</th>
   <th scope='col'>Hora d'arribada</th>
   <th scope='col'>Vetlladors</th>
   <th scope='col'>Profesors</th>
   <th scope='col'>Alumnes</th>
   <th scope="col">+ Info</th>

  </tr>
</thead>
<?php

    //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa where tbl_sortida.inici_sortida > '$fecha_actual' and tbl_sortida.inici_sortida like '%".$fecha."%'  and tbl_etapa.nom_etapa like '%".$etapa."%' and tbl_clase.nom_classe like '%".$clase."%' and tbl_sortida.profesor_asignat like '%".$profe."%' and tbl_sortida.profesor_asignat like '%".$profe."%'and tbl_activitat.jornada_activitat like '%".$jornada."%' ORDER BY tbl_sortida.inici_sortida";
      $exe=mysqli_query($conn,$consulta);
     while ($row=mysqli_fetch_array($exe)){

  //Poner las fechas en formato            
$data_inici = date("d/m/Y", strtotime($row['inici_sortida']));
$data_final = date("d/m/Y", strtotime($row['final_sortida']));

       echo "<tr><td>".$row['codi_sortida']."</td>
	     <td>".$row['nom_activitat']."</td>
	     <td>".$row['nom_etapa']."</td>
       <td>".$row['nom_classe']."</td>
       <td>".$data_inici."</td>
       <td>".$data_final."</td>
       <td>".$row['hora_sortida']."</td>
       <td>".$row['hora_arribada']."</td>
       <td>".$row['n_vetlladors']."</td>
       <td>".$row['profes_a_part']."</td>
       <td>".$row['numero_alumnes']."</td>";
?>

<td>
 <!-- Botón para la modal de contacto-->      
<i class="fas fa-plus-circle fa-2x" style="color:#367cb3;" id="modal_secretaria" onclick="modal_enf_dir('<?php echo $row['nom_activitat']; ?>','<?php echo $row['profesor_asignat']; ?>','<?php echo $row['nom_transport']; ?>','<?php echo $row['jornada_activitat']; ?>');"></i>

<!-- Modal del contacto--> 

</td>
</tr>

<?php
}
?>

</table>