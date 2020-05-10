<?php
include "../services/conexion.php";
//Estos son los valores que tiene el filtro, si no los encuentra los pone vacios
$cont=0;
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
	//Estos campos se necesitan en la consulta, asi que si no los recibe los pone vacios
	echo "<table id='table-id' class='table table-bordered text-center' style='background-color: rgba(255,255,255,1);'>
	<thead class='thead-dark'>
		<tr><th data-sort-method='none' scope='col'>Opcions</th>
		<th scope='col'>Codi</th>
		<th scope='col'>Sortida</th>
		<th scope='col'>Inici</th>
		<th scope='col'>Final</th>
		<th scope='col'>Classe</th>
		<th scope='col'>Etapa</th>
        <th scope='col'>Jornada</th>
		<th id='acompanyants' style='display:none;' scope='col'>Acompanyants</th>
		<th id='alumnes' style='display:none;' scope='col' >Alumnes</th>
		<th id='proasignat' style='display:none;' scope='col'>Professor assignat</th>
		<th id='vetllador' style='display:none;' scope='col'>Vetlladors</th>
		<th id='siei' style='display:none;' scope='col'>SIEI</th>
		<th id='profesors' style='display:none;' scope='col'>Professors</th>
		<th id='profesors_comp' style='display:none;' scope='col'>Professors Computables</th>
		<th id='lloc' scope='col'>Lloc</th>
		<th id='tipus' style='display:none;' scope='col'>Tipus</th>
		<th id='ambit' style='display:none;' scope='col'>Àmbit</th>
		
		<th id='objectiu' scope='col'>Objectiu</th>
		<th data-sort-method='none' scope='col'>Mostrar més</th>
		</thead>
		";
	//Primero hacemos una consulta para saber las excursiones
	
	$consultaexcursion="select tbl_sortida.codi_sortida,tbl_sortida.inici_sortida,tbl_sortida.final_sortida,tbl_clase.nom_classe,tbl_etapa.nom_etapa,tbl_sortida.n_acompanyants,tbl_sortida.numero_alumnes,tbl_sortida.profesor_asignat,tbl_sortida.n_vetlladors,tbl_sortida.id_clase,tbl_sortida.id_sortida,tbl_activitat.nom_activitat,tbl_activitat.lloc_activitat,tbl_activitat.tipus_activitat,tbl_activitat.ambit_activitat,tbl_activitat.jornada_activitat,tbl_activitat.objectiu_activitat,tbl_activitat.id_activitat,tbl_sortida.id_precios,tbl_activitat.id_contacte_activitat,tbl_sortida.id_transport from tbl_etapa inner join tbl_clase on tbl_etapa.id_etapa=tbl_clase.id_etapa inner join tbl_sortida on tbl_clase.id_clase=tbl_sortida.id_clase inner join tbl_activitat on tbl_sortida.id_sortida=tbl_activitat.id_sortida where tbl_sortida.inici_sortida like '%".$fecha."%' and tbl_clase.nom_classe like '%".$clase."%' and tbl_sortida.profesor_asignat like '%".$profe."%'";
	//ejecutamos la consulta
	$consulta=mysqli_query($conn,$consultaexcursion);
	//Por cada resultado, metemos en una variable de tipo array
	
	while ($exe=mysqli_fetch_array($consulta)) {
		
		//Formamos la tabla
		echo "<tr>
			<td style='width: 5%;'>
			<button type='button' class='btn btn-info' data-trigger='focus' data-toggle='popover' title='Opcions'><i class='fas fa-plus-square fa-2x'></i></button>
			<div id='popover-content' class='list-group' style='display: none;'>";
			?>
			<a class="list-group-item" title='Eliminar Sortida' href="#"><i class="fas fa-trash-alt fa-2x" id="modal_secretaria" style="color:#c4081b; margin-left: 2px;" onclick="delete_confirm('<?php echo $exe[10]; ?>','<?php echo $exe[17]; ?>','<?php echo $exe[18]; ?>','<?php echo $exe[19]; ?>','<?php echo $exe[20]; ?>');"></i></a>
			<?php  echo 
			"<a class='list-group-item' title='Modificar Sortida' href='form_update_excursiones.php?id_excursion=".$exe[10]."'><i class='fas fa-pencil-alt fa-2x' id='modificar' style='color:#3F7FBF;'></i></a>
			<a class='list-group-item' title='Copiar Sortida' href='form_copy_excursiones.php?id_excursion=".$exe[10]."'><i class='fas fa-copy fa-2x' id='copiar' style='color:#3F7FBF;'></i></a>";
                        ?>
                        <a class="list-group-item" title='Valoració' href='#' onclick="abrirform4('<?php echo $exe[10]; ?>', '<?php echo $exe[11]; ?>', '<?php echo $nom; ?>', '<?php echo $cognom; ?>')"><i class='fas fa-star fa-2x' id='modificar' style='color:#FF8C00;'></i></a>
						<?php echo "
						</div>
			</td>
			<td style='width: 6%;'>".$exe[0]."</td>
			<td style='width: 12%;'>".$exe[11]."</td>
			<td style='width: 7%;'>".$exe[1]."</td>
			<td style='width: 7%;'>".$exe[2]."</td>
			<td style='width: 7%;'>".$exe[3]."</td>
			<td style='width: 7%;'>".$exe[4]."</td>
                        <td style='width: 8%;'>".$exe[15]."</td>
			<td id='acom".$cont."' style='display:none;'>".$exe[5]."</td>
			<td id='al".$cont."' style='display:none;'>".$exe[6]."</td>
			<td id='profas".$cont."' style='display:none;'>".$exe[7]."</td>
			<td id='vet".$cont."' style='display:none;'>".$exe[8]."</td>";
			//A continuacion veremos si hay algun niño especial en esa clase
			$csiei="select count(tbl_alumnes.id_alumne) from tbl_alumnes inner join tbl_clase ON tbl_clase.id_clase=tbl_alumnes.id_alumne where tbl_alumnes.id_clase='".$exe[9]."' and siei='si'";	
			$alusiei=mysqli_query($conn,$csiei);
			$nsiei=mysqli_fetch_array($alusiei);
			if ($nsiei[0]==0) {
				echo "<td id='siei".$cont."' style='display:none;'>No</td>";
			}else{
				echo "<td id='siei".$cont."' style='display:none;'>".$nsiei[0]."</td>";
			}
			//Ahora necesitamos saber el nombre de profesores que van a venir (Profesores de las clases que van a la salida)
			$conprof="select tbl_usuari.nom_usuari,tbl_usuari.cognom_usuari from tbl_lista_profesores inner join tbl_usuari on tbl_lista_profesores.id_profesor=tbl_usuari.id_usuari where tbl_lista_profesores.id_excursion='".$exe[10]."'";
			$qprof=mysqli_query($conn,$conprof);
			echo "<td id='prof".$cont."' style='display:none;'>";
			while ($mprof=mysqli_fetch_array($qprof)) {
				echo $mprof[0]." ".$mprof[1]."<br>";	
			}
			echo "</td>";
			//Por ultimo, necesitamos saber que profesores de los anteriores son computables
			$conprof="select tbl_usuari.nom_usuari,tbl_usuari.cognom_usuari from tbl_lista_profesores inner join tbl_usuari on tbl_lista_profesores.id_profesor=tbl_usuari.id_usuari where tbl_lista_profesores.id_excursion='".$exe[10]."' and tbl_usuari.computable='si'";
			$qprof=mysqli_query($conn,$conprof);
			echo "<td id='prof_comp".$cont."' style='display:none;'>";
			while ($mprof=mysqli_fetch_array($qprof)) {
				echo $mprof[0]." ".$mprof[1]."<br>";	
			}
			
				echo "<td id='lloc".$cont."'>".$exe[12]."</td>
				<td id='tipus".$cont."' style='display:none;'>".$exe[13]."</td>
				<td id='ambit".$cont."' style='display:none;'>".$exe[14]."</td>
				<td id='obj".$cont."'>".$exe[16]."</td>";
			?>
			<td style="width: 5%;">
			<button type='button' class='btn btn-info' data-trigger='focus' data-toggle='popover2' title='Opcions'><i class='fas fa-plus-square fa-2x'></i></button>
			<div id='popover-content2' class='list-group' style='display: none'>
				<?php
				$consultacontacto="select tbl_contacte_activitat.persona_contacte,tbl_contacte_activitat.web_contacte,tbl_contacte_activitat.telefon_contacte,tbl_contacte_activitat.email_contacte from tbl_contacte_activitat inner join tbl_activitat on tbl_contacte_activitat.id_contacte_activitat=tbl_activitat.id_contacte_activitat where tbl_activitat.id_activitat='".$exe[17]."'";
				$querycontacto=mysqli_query($conn,$consultacontacto);
				$con=mysqli_fetch_array($querycontacto);

				?>

				<a class='list-group-item' href="#" onclick="abrirform1('<?php echo $con[0]; ?>','<?php echo $con[1]; ?>','<?php echo $con[2]; ?>','<?php echo $con[3]; ?>');"><i class="fas fa-address-book fa-2x" style="color: #634d0f;  margin: 15%;" id="modal_secretaria"></i></a>

				<?php
					 $consultaprecios="select tbl_preus.* from tbl_preus inner join tbl_sortida on tbl_sortida.id_precios=tbl_preus.id_preus where tbl_sortida.id_sortida='".$exe[10]."'";
					 $queryprecios=mysqli_query($conn,$consultaprecios);
					 $pre=mysqli_fetch_array($queryprecios);

				?>

			<a class='list-group-item' href="#"  onclick="abrirform2('<?php echo $pre[1]; ?>','<?php echo $pre[2]; ?>','<?php echo $pre[3]; ?>','<?php echo $pre[4]; ?>','<?php echo $pre[5]; ?>','<?php echo $pre[6]; ?>','<?php echo $pre[7]; ?>','<?php echo $pre[8]; ?>','<?php echo $pre[9]; ?>','<?php echo $pre[10]; ?>','<?php echo $pre[11]; ?>','<?php echo $pre[12]; ?>','<?php echo $pre[13]; ?>');"><i class="fas fa-money-bill-wave fa-2x" style="color: darkgreen; margin: 15%; margin-left: 0px;" id="myBtn2"></i></a>

				<?php
					 		$consultatransporte="select tbl_transport.hora_sortida,tbl_transport.hora_arribada,tbl_transport.cost_transport,tbl_transport.codi_contacte,tbl_transport.comentaris_transport,tbl_nom_transport.nom_transport from tbl_transport inner join tbl_nom_transport on tbl_nom_transport.id_nom_transport=tbl_transport.id_nom_transport where tbl_transport.id_transport='".$exe[10]."'";
					 		$querytransporte=mysqli_query($conn,$consultatransporte);
					 		$tra=mysqli_fetch_array($querytransporte);
				?>
				
				<a class='list-group-item' href="#" onclick="abrirform3('<?php echo $tra[0]; ?>','<?php echo $tra[1]; ?>','<?php echo $tra[2]; ?>','<?php echo $tra[3]; ?>','<?php echo $tra[4]; ?>','<?php echo $tra[5]; ?>');"><i class="fas fa-plane fa-2x" style="color: black; margin: 15%;" id="myBtn3"></i></a>
			</div>
			</td>
			<div id="resultado2" class="modalmask" style="display:none;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Close" class="close" id="close" style="color:black; background-color:#f1f1f1; margin-right:2%;">X</a>
        <h2 id="tituloResultado">TITULO</h2>
        <div id="contenidoResultado">contenido resultado</div>
      </div>
</div>
		<?php
		echo "</tr>";
                $cont++;
	}
	echo "</table>";
?>