<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	
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
	//Estos campos se necesitan en la consulta, asi que si no los recibe los pone vacios
	echo "<table  class='table table-bordered'>
		<thead class='thead-dark'>
		<tr><th>Codigo</th>
		<th scope='col'>Inicio</th>
		<th scope='col'>Fin</th>
		<th scope='col'>Clase</th>
		<th scope='col'>Etapa</th>
		<th scope='col'>Acompañantes</th>
		<th scope='col'>Alumnos</th>
		<th scope='col'>Profesor asignado</th>
		<th scope='col'>Vetlladors</th>
		<th scope='col'>SIEI</th>
		<th scope='col'>Profesores</th>
		<th scope='col'>Profesores Computables</th>
		<th scope='col'>Ver mas</th>
		</thead>
		";
	//Primero hacemos una consulta para saber las excursiones
	
	$consultaexcursion="select tbl_sortida.codi_sortida,tbl_sortida.inici_sortida,tbl_sortida.final_sortida,tbl_clase.nom_classe,tbl_etapa.nom_etapa,tbl_sortida.n_acompanyants,tbl_sortida.numero_alumnes,tbl_sortida.profesor_asignat,tbl_sortida.n_vetlladors,tbl_sortida.id_clase,tbl_sortida.id_sortida from tbl_etapa inner join tbl_clase on tbl_etapa.id_etapa=tbl_clase.id_etapa inner join tbl_sortida on tbl_clase.id_clase=tbl_sortida.id_clase where tbl_sortida.inici_sortida like '%".$fecha."%' and tbl_clase.nom_classe like '%".$clase."%' and tbl_sortida.profesor_asignat like '%".$profe."%'";
	//ejecutamos la consulta
	$consulta=mysqli_query($conn,$consultaexcursion);
	//Por cada resultado, metemos en una variable de tipo array
	
	while ($exe=mysqli_fetch_array($consulta)) {
		//Formamos la tabla
		echo "<tr>
			<td>".$exe[0]."</td>
			<td>".$exe[1]."</td>
			<td>".$exe[2]."</td>
			<td>".$exe[3]."</td>
			<td>".$exe[4]."</td>
			<td>".$exe[5]."</td>
			<td>".$exe[6]."</td>
			<td>".$exe[7]."</td>
			<td>".$exe[8]."</td>";
			//A continuacion veremos si hay algun niño especial en esa clase
			$csiei="select count(id_usuari) from tbl_usuari where computable='alumne' and id_clase='".$exe[9]."' and siei='si'";	
			$alusiei=mysqli_query($conn,$csiei);
			$nsiei=mysqli_fetch_array($alusiei);
			if ($nsiei[0]==0) {
				echo "<td>No</td>";
			}else{
				echo "<td>".$nsiei[0]."</td>";
			}
			//Ahora necesitamos saber el nombre de profesores que van a venir (Profesores de las clases que van a la salida)
			$conprof="select tbl_usuari.nom_usuari,tbl_usuari.cognom_usuari from tbl_lista_profesores inner join tbl_usuari on tbl_lista_profesores.id_profesor=tbl_usuari.id_usuari where tbl_lista_profesores.id_excursion='".$exe[10]."'";
			$qprof=mysqli_query($conn,$conprof);
			echo "<td>";
			while ($mprof=mysqli_fetch_array($qprof)) {
				echo $mprof[0]." ".$mprof[1]."<br>";	
			}
			echo "</td>";
			//Por ultimo, necesitamos saber que profesores de los anteriores son computables
			$conprof="select tbl_usuari.nom_usuari,tbl_usuari.cognom_usuari from tbl_lista_profesores inner join tbl_usuari on tbl_lista_profesores.id_profesor=tbl_usuari.id_usuari where tbl_lista_profesores.id_excursion='".$exe[10]."' and tbl_usuari.computable='si'";
			$qprof=mysqli_query($conn,$conprof);
			echo "<td>";
			while ($mprof=mysqli_fetch_array($qprof)) {
				echo $mprof[0]." ".$mprof[1]."<br>";	
			}
			?>
			<td>
				<?php
					echo $exe[10];
				?>
				<button style="margin-left: 10px;" id="myBtn" class="btn btn-info" onclick="abrirform1();">Ver actividades</button>
				<div id="myModal" class="modal">
					 <div class="modal-content">
					 	<span class="close">&times;</span>
					 	<?php

					 		$consultactividades="select tbl_activitat.nom_activitat,tbl_activitat.lloc_activitat,tbl_activitat.tipus_activitat,tbl_activitat.ambit_activitat,tbl_activitat.jornada_activitat,tbl_activitat.objectiu_activitat,tbl_contacte_activitat.persona_contacte,tbl_contacte_activitat.web_contacte,tbl_contacte_activitat.telefon_contacte,tbl_contacte_activitat.email_contacte from tbl_contacte_activitat inner join tbl_activitat on tbl_contacte_activitat.id_contacte_activitat=tbl_activitat.id_contacte_activitat where tbl_activitat.id_sortida='".$exe[10]."'";
					 		$queryactividades=mysqli_query($conn,$consultactividades);
					 			echo "<table>
										<tr>
											<th>Actividad</th>
											<th>Lugar</th>
											<th>Tipo</th>
											<th>Ambito</th>
											<th>Jornada</th>
											<th>Objetivo</th>
											<th>Persona de contacto</th>
											<th>Web</th>
											<th>Telefono</th>
											<th>Email</th>";
								echo "</tr>";
								
					 		while ($act=mysqli_fetch_array($queryactividades)) {
					 			echo "<tr>
									<td>".$act[0]."</td>
									<td>".$act[1]."</td>
									<td>".$act[2]."</td>
									<td>".$act[3]."</td>
									<td>".$act[4]."</td>
									<td>".$act[5]."</td>
									<td>".$act[6]."</td>
									<td>".$act[7]."</td>
									<td>".$act[8]."</td>
									<td>".$act[9]."</td>
									</tr>";
					 		}
					 		echo "</table>";
					 	?>
					</div>
				</div>
				<button style="margin-left: 24px; margin-top: 2px;" id="myBtn2" class="btn btn-info" onclick="abrirform2();">Ver precios</button>
				<div id="myModal2" class="modal">
					 <div class="modal-content">
					 	<span class="close2">&times;</span>
					 	<?php
					 		$consultaprecios="select tbl_preus.* from tbl_preus inner join tbl_sortida on tbl_sortida.id_precios=tbl_preus.id_preus where tbl_sortida.id_sortida='".$exe[10]."'";
					 		$queryprecios=mysqli_query($conn,$consultaprecios);
					 			echo "<table>
										<tr>
											<th>Coste Substitucion</th>
											<th>Coste Actividad individual</th>
											<th>Coste Extra Actividad Profe</th>
											<th>Coste Global Actividad</th>
											<th>Coste final</th>
											<th>Precio fijo</th>
											<th>Precio sin Topal</th>
											<th>^Precio Con Topal</th>
											<th>Precio de gestion</th>
											<th>Overhead</th>
											<th>Total a facturar</th>
											<th>Pago fraccionado</th>
											<th>Observaciones</th>";
								echo "</tr>";
								
					 		while ($pre=mysqli_fetch_array($queryprecios)) {
					 			echo "<tr>
									<td>".$pre[1]."</td>
									<td>".$pre[2]."</td>
									<td>".$pre[3]."</td>
									<td>".$pre[4]."</td>
									<td>".$pre[5]."</td>
									<td>".$pre[6]."</td>
									<td>".$pre[7]."</td>
									<td>".$pre[8]."</td>
									<td>".$pre[9]."</td>
									<td>".$pre[10]."</td>
									<td>".$pre[11]."</td>
									<td>".$pre[12]."</td>
									<td>".$pre[13]."</td>
									</tr>";
					 		}
					 		echo "</table>";
					 	?>
					</div>
				</div>
				<button style="margin-left: 24px; margin-top: 2px;" id="myBtn3" class="btn btn-info" onclick="abrirform3();">Ver transportes</button>
				<div id="myModal3" class="modal">
					 <div class="modal-content">
					 	<span class="close3">&times;</span>
					 	<?php
					 		$consultatransporte="select tbl_transport.hora_sortida,tbl_transport.hora_arribada,tbl_transport.cost_transport,tbl_transport.codi_contacte,tbl_transport.comentaris_transport,tbl_nom_transport.nom_transport from tbl_transport inner join tbl_nom_transport on tbl_nom_transport.id_nom_transport=tbl_transport.id_nom_transport where tbl_transport.id_transport='".$exe[10]."'";
					 		echo $consultatransporte;
					 		echo "<table>
										<tr>
											<th>Hora sortida</th>
											<th>Hora arribada</th>
											<th>Coste transporte</th>
											<th>Codigo contacto</th>
											<th>Comentarios</th>
											<th>Transporte</th>";
								echo "</tr>";
							$querytransporte=mysqli_query($conn,$consultatransporte);
							while ($tra=mysqli_fetch_array($querytransporte)) {
								echo "<tr>
									<td>".$tra[0]."</td>
									<td>".$tra[1]."</td>
									<td>".$tra[2]."</td>
									<td>".$tra[3]."</td>
									<td>".$tra[4]."</td>
									<td>".$tra[5]."</td>
								</tr>";
					 		}
					 		echo "</table>";
					 	?>
					</div>
				</div>
			</td>
		<?php
		echo "</tr>";
	}
	echo "</table>";
?>
</body>
</html>