<?php
	//Estos campos se necesitan en la consulta, asi que si no los recibe los pone vacios

	//$clase=$_REQUEST['clase'];
	//$profe=$_REQUEST['profes'];
	//Creamos la tabla
	echo "<table>
		<tr><th>Codigo</th>
		<th>Inicio</th>
		<th>Fin</th>
		<th>Clase</th>
		<th>Etapa</th>
		<th>Acompañantes</th>
		<th>Alumnos</th>
		<th>Profesor asignado</th>
		<th>Vetlladors</th>
		<th>SIEI</th>
		<th>Profesores</th>
		<th>Profesores Computables</th>
		";
	//Primero hacemos una consulta para saber las excursiones
	
	$consultaexcursion="select tbl_sortida.codi_sortida,tbl_sortida.inici_sortida,tbl_sortida.final_sortida,tbl_clase.nom_classe,tbl_etapa.nom_etapa,tbl_sortida.n_acompanyants,tbl_sortida.numero_alumnes,tbl_sortida.profesor_asignat,tbl_sortida.n_vetlladors,tbl_sortida.id_clase,tbl_sortida.id_sortida from tbl_etapa inner join tbl_clase on tbl_etapa.id_etapa=tbl_clase.id_etapa inner join tbl_sortida on tbl_clase.id_clase=tbl_sortida.id_clase";
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
			$conprof="select nombre_profesor from tbl_lista_profesores where id_excursion='".$exe[10]."'";
			$qprof=mysqli_query($conn,$conprof);
			echo "<td>";
			while ($mprof=mysqli_fetch_array($qprof)) {
				echo $mprof[0]."<br>";	
			}
			echo "</td>";
			//Por ultimo, necesitamos saber que profesores de los anteriores son computables

		echo "</tr>";
		
	}
	echo "</table>";
?>