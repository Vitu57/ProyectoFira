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
  <table  class="table table-bordered" style="text-align:center; background-color: rgba(255,255,255,1);"><thead>
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

     while ($row=mysqli_fetch_array($exe)){
  
       echo "<tr><td>".$row['codi_sortida']."</td>
            <td>".$row['nom_activitat']."</td>
            <td>".$row['nom_etapa']."</td>
            <td>".$row['nom_classe']."</td>
            <td>".$row['inici_sortida']."</td>
            <td>".$row['final_sortida']."</td>
            <td>".$row['profesor_asignat']."</td>
            <td>".$row['n_vetlladors']."</td>
            <td>".$row['profes_a_part']."</td>
            <td>".$row['numero_alumnes']."</td>";  
 ?>

 <!-- Botón para la modal de Activitat-->      
<td><a href="#"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;" id="modal_secretaria2" onclick="modal_secretaria2('<?php echo $row['nom_activitat']; ?>','<?php echo $row['lloc_activitat']; ?>','<?php echo $row['tipus_activitat']; ?>','<?php echo $row['ambit_activitat']; ?>','<?php echo $row['jornada_activitat']; ?>','<?php echo $row['objectiu_activitat']; ?>');"></i></a>

</td>

<!-- Botón para la modal de Transporte-->      
<td><a href="#"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;" id="modal_secretaria3" onclick="modal_secretaria3('<?php echo $row['nom_transport']; ?>','<?php echo $row['hora_sortida']; ?>','<?php echo $row['hora_arribada']; ?>','<?php echo $row['comentaris_transport']; ?>');"></i></a>

</td>

<td>
 <!-- Botón para la modal de contacto-->      
<a href="#"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;" id="modal_secretaria" onclick="modal_secretaria('<?php echo $row['persona_contacte']; ?>','<?php echo $row['web_contacte']; ?>','<?php echo $row['telefon_contacte'];; ?>','<?php echo $row['email_contacte'];; ?>');"></i></a>

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