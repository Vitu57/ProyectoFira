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
if(isset($_REQUEST['etapa'])){
  $etapa=$_REQUEST['etapa'];
}else{
  $etapa="";
}
if(isset($_REQUEST['codi'])){
  $codi=$_REQUEST['codi'];
}else{
  $codi="";
}

?>
  <table  class="table table-bordered" style="text-align:center"><thead>
  <tr>
  
   <th scope='col'>Codi Sortida</th>
   <th scope='col'>Nom Sortida</th>
   <th scope="col">Etapa</th>
   <th scope="col">Clase</th>
   <th scope="col">Inici</th>
   <th scope="col">Final</th>
   <th scope='col'>Profesor assignat</th>
   <th scope='col'>Vetlladors</th>
   <th scope='col'>Profesors</th>
   <th scope='col'>Alumnes</th>
   <th scope='col'>Activitat</th>
   <th scope='col'>Transport</th>
   <th scope='col'>Contacte</th>


  </tr>

<?php

    //consulta para saber los datos de las salidas, las actividades y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_contacte_activitat ON tbl_contacte_activitat.id_contacte_activitat=tbl_activitat.id_contacte_activitat INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa where tbl_sortida.inici_sortida like '%".$fecha."%' and tbl_clase.nom_classe like '%".$clase."%' and tbl_sortida.profesor_asignat like '%".$profe."%' and tbl_sortida.codi_sortida like '%".$codi."%' and tbl_etapa.nom_etapa like '%".$etapa."%' and tbl_sortida.profesor_asignat like '%".$profe."%'and tbl_activitat.jornada_activitat like '%".$jornada."%' ";
	$exe=mysqli_query($conn,$consulta);

     while ($casos=mysqli_fetch_array($exe)){

        $etapa=$casos['nom_etapa'];
		$nomActivitat=$casos['nom_activitat'];
        $clase=$casos['nom_classe'];
        $profeA=$casos['profesor_asignat'];
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
        $comentari=$casos['comentaris_transport'];
        $nomAct=$casos['nom_activitat'];
        $llocAct=$casos['lloc_activitat'];
        $ambitAct=$casos['ambit_activitat'];
        $jorAct=$casos['jornada_activitat'];
        $objAct=$casos['objectiu_activitat'];
        $tipusAct=$casos['tipus_activitat'];
        $personaContacte=$casos['persona_contacte'];
        $webContacte=$casos['web_contacte'];
        $telfContacte=$casos['telefon_contacte'];
        $emailContacte=$casos['email_contacte'];


echo "<tr>";
  
       echo "<td>".$codi_sortida."</td>";
	   echo "<td>".$nomActivitat."</td>";
       echo "<td>".$etapa."</td>";
       echo "<td>".$clase."</td>";
       echo "<td>".$inici."</td>";
       echo "<td>".$final."</td>";
       echo "<td>".$profeA."</td>";
       echo "<td>".$vetlladors."</td>";
       echo "<td>".$profe."</td>";
       echo "<td>".$alumnes."</td>";   
 ?>

 <!-- Botón para la modal de Activitat-->      
<td><a href="#"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;" id="modal_secretaria2" onclick="modal_secretaria2('<?php echo $nomAct; ?>','<?php echo $llocAct; ?>','<?php echo $tipusAct; ?>','<?php echo $ambitAct; ?>','<?php echo $jorAct; ?>','<?php echo $objAct; ?>');"></i></a>

</td>

<!-- Botón para la modal de Transporte-->      
<td><a href="#"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;" id="modal_secretaria3" onclick="modal_secretaria3('<?php echo $nomTransport; ?>','<?php echo $horaSortida; ?>','<?php echo $horaArribada; ?>','<?php echo $comentari; ?>');"></i></a>

</td>

<td>
 <!-- Botón para la modal de contacto-->      
<a href="#"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;" id="modal_secretaria" onclick="modal_secretaria('<?php echo $personaContacte; ?>','<?php echo $webContacte; ?>','<?php echo $telfContacte; ?>','<?php echo $emailContacte; ?>');"></i></a>

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