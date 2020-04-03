
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

<?php

    //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa where tbl_sortida.inici_sortida > '$fecha_actual' and tbl_sortida.inici_sortida like '%".$fecha."%' and tbl_clase.nom_classe like '%".$clase."%' and tbl_sortida.profesor_asignat like '%".$profe."%' and tbl_sortida.profesor_asignat like '%".$profe."%'and tbl_activitat.jornada_activitat like '%".$jornada."%' ORDER BY tbl_sortida.inici_sortida";
      $exe=mysqli_query($conn,$consulta);
     while ($casos=mysqli_fetch_array($exe)){

        $codi=$casos['codi_sortida'];
		$nomActivitat=$casos['nom_activitat'];
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
        $etapa=$casos['nom_etapa'];
        $transport=$casos['nom_transport'];

echo "<tr>";
       echo "<td>".$codi."</td>";
	   echo "<td>".$nomActivitat."</td>";
	   echo "<td>".$etapa."</td>";
       echo "<td>".$nomClase."</td>";
       echo "<td>".$inici."</td>";
       echo "<td>".$final."</td>";
       echo "<td>".$horaSortida."</td>";
       echo "<td>".$horaArribada."</td>";
       echo "<td>".$vetlladors."</td>";
       echo "<td>".$profe."</td>";
       echo "<td>".$alumnes."</td>";
?>

<td>
 <!-- Botón para la modal de contacto-->      
<i class="fas fa-plus-circle fa-2x" style="color:#367cb3;" id="modal_secretaria" onclick="modal_enf_dir('<?php echo $activitat; ?>','<?php echo $profesor_asignat; ?>','<?php echo $transport; ?>','<?php echo $jornada; ?>');"></i>

<!-- Modal del contacto--> 
<div id="resultado2" class="modalmask" style="display:none;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Close" class="close" id="close">X</a>
        <h2 id="tituloResultado">TITULO</h2>
        <div id="contenidoResultado">contenido resultado</div>
      </div>
    </div>
</td>
</tr>

<?php
}
?>

</table>