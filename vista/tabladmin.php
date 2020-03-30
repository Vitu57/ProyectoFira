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
	echo "<table  class='table table-bordered text-center' style='background-color: rgba(255,255,255,1);'>
	<thead class='thead-dark'>
		<tr><th scope='col'>Opciones</th>
		<th scope='col'>Codigo</th>
		<th scope='col'>Salida</th>
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
		<th scope='col'>Lugar</th>
		<th scope='col'>Tipo</th>
		<th scope='col'>Ambito</th>
		<th scope='col'>Jornada</th>
		<th scope='col'>Objetivo</th>
		<th scope='col'>Ver mas</th>
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
			<td>";
			?>
			<button class="btn btn-info" style="margin-bottom: 7%;" id="modal_secretaria" onclick="eliminar('<?php echo $exe[10]; ?>','<?php echo $exe[17]; ?>','<?php echo $exe[18]; ?>','<?php echo $exe[19]; ?>','<?php echo $exe[20]; ?>');">Eliminar</button>
			<?php  echo "</td>
			<td>".$exe[0]."</td>
			<td>".$exe[11]."</td>
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
			
				echo "<td>".$exe[12]."</td>
				<td>".$exe[13]."</td>
				<td>".$exe[14]."</td>
				<td>".$exe[15]."</td>
				<td>".$exe[16]."</td>";
			?>
			<td style="text-align: left;" class="float-left">

				<?php
				$consultacontacto="select tbl_contacte_activitat.persona_contacte,tbl_contacte_activitat.web_contacte,tbl_contacte_activitat.telefon_contacte,tbl_contacte_activitat.email_contacte from tbl_contacte_activitat inner join tbl_activitat on tbl_contacte_activitat.id_contacte_activitat=tbl_activitat.id_contacte_activitat where tbl_activitat.id_activitat='".$exe[17]."'";
				$querycontacto=mysqli_query($conn,$consultacontacto);
				$con=mysqli_fetch_array($querycontacto);

				?>

				<button class="btn btn-info" style="margin-bottom: 7%;" id="modal_secretaria" onclick="abrirform1('<?php echo $con[0]; ?>','<?php echo $con[1]; ?>','<?php echo $con[2]; ?>','<?php echo $con[3]; ?>');">Veure contacte</button>

				<?php
					 $consultaprecios="select tbl_preus.* from tbl_preus inner join tbl_sortida on tbl_sortida.id_precios=tbl_preus.id_preus where tbl_sortida.id_sortida='".$exe[10]."'";
					 $queryprecios=mysqli_query($conn,$consultaprecios);
					 $pre=mysqli_fetch_array($queryprecios);

				?>

				<button class="btn btn-info" style="margin-bottom: 7%;" id="myBtn2" onclick="abrirform2('<?php echo $pre[1]; ?>','<?php echo $pre[2]; ?>','<?php echo $pre[3]; ?>','<?php echo $pre[4]; ?>','<?php echo $pre[5]; ?>','<?php echo $pre[6]; ?>','<?php echo $pre[7]; ?>','<?php echo $pre[8]; ?>','<?php echo $pre[9]; ?>','<?php echo $pre[10]; ?>','<?php echo $pre[11]; ?>','<?php echo $pre[12]; ?>','<?php echo $pre[13]; ?>');">Ver precios</button>

				<?php
					 		$consultatransporte="select tbl_transport.hora_sortida,tbl_transport.hora_arribada,tbl_transport.cost_transport,tbl_transport.codi_contacte,tbl_transport.comentaris_transport,tbl_nom_transport.nom_transport from tbl_transport inner join tbl_nom_transport on tbl_nom_transport.id_nom_transport=tbl_transport.id_nom_transport where tbl_transport.id_transport='".$exe[10]."'";
					 		$querytransporte=mysqli_query($conn,$consultatransporte);
					 		$tra=mysqli_fetch_array($querytransporte);
				?>
				
				<button class="btn btn-info" style="margin-bottom: 7%;" id="myBtn3" onclick="abrirform3('<?php echo $tra[0]; ?>','<?php echo $tra[1]; ?>','<?php echo $tra[2]; ?>','<?php echo $tra[3]; ?>','<?php echo $tra[4]; ?>','<?php echo $tra[5]; ?>');">Ver transportes</button>
				
			</td>
			<div id="resultado2" class="modalmask" style="display:none;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Close" class="close" id="close">X</a>
        <h2 id="tituloResultado">TITULO</h2>
        <div id="contenidoResultado">contenido resultado</div>
      </div>
</div>
		<?php
		echo "</tr>";
	}
	echo "</table>";
?>
</body>
</html>