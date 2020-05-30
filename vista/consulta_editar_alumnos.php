<?php
include "../services/conexion.php";
echo "<select id='nombrealumno' class='browser-default custom-select mb-2'>";
if ($id_clase=$_REQUEST['id_clase']) {
$consultalumnos="select id_alumne,nom_alumne from tbl_alumnes where id_clase='".$id_clase."'";
	$queryalumnos=mysqli_query($conn,$consultalumnos);	
	while ($alumnoclase=mysqli_fetch_array($queryalumnos)) {
	echo "<option value=".$alumnoclase[0].">".$alumnoclase[1]."</option>";
	}
}else{
echo "<option value='' selected disabled>Nom i Cognoms</option>";
}
echo "</select>";
?>    
</div>
</div>
<p class="h4 mb-4">Noves Dades</p>

<select class="browser-default custom-select mb-2" id="clases2">
      <option value="" selected disabled>Clase</option>
      <?php
        $consultaclases="select tbl_clase.id_clase,tbl_clase.nom_classe from tbl_clase where nom_classe!='PERSONAL'";
        $queryclases=mysqli_query($conn,$consultaclases);
        while ($clase=mysqli_fetch_array($queryclases)) {
          echo " <option value=".$clase[0].">".$clase[1]."</option>";
        }
      ?>
    </select>

<div class="form-row mb-1">
    <div class="col">
        <!-- Nombre-->
        <?php
        $consultalumnos="select id_alumne,nom_alumne,cognom1_alumne,cognom2_alumne from tbl_alumnes where id_clase='".$id_clase."'";
		$queryalumnos=mysqli_query($conn,$consultalumnos);	
		while ($alumnoclase=mysqli_fetch_array($queryalumnos)) {
			?>
        <input type="text" id="nombreusu" class="form-control" placeholder="Nom *" autocomplete="off" value="<?php echo $alumnoclase[1] ?>">
    </div>
    <div class="col">
        <!-- Apellidos -->
        <input type="text" id="apellidosusu" class="form-control mb-4" placeholder="Cognoms *" autocomplete="off" value=" <?php echo $alumnoclase[2].' '.$alumnoclase[3] ?>">
        <small id="numapellidos" class="form-text text-danger d-none">
    Has de posar 2 cognoms com a máxim.
  </small>
    </div>
    
</div>
<?php
}
?>