<?php
include "../services/conexion.php";
//Estos son los valores que tiene el filtro, si no los encuentra los pone vacios
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
if(isset($_REQUEST['etapa'])){
  $etapa=$_REQUEST['etapa'];
}else{
  $etapa="";
}

?>
  <table  class="table table-bordered" style="text-align:center"><thead>
  <tr>

   <th scope='col'>Nom</th>
   <th scope="col">Etapes</th>
   <th scope="col">Clases</th>
   <th scope='col'>Afegir clases</th>
   <th scope='col'>Eliminar clases</th>

  </tr>

<?php

    //consulta para saber los datos de las salidas, las actividades y el transporte
$consulta="SELECT DISTINCT tbl_usuari.id_usuari, tbl_usuari.nom_usuari, tbl_usuari.cognom_usuari FROM tbl_usuari INNER JOIN tbl_clase_user ON tbl_usuari.id_usuari=tbl_clase_user.id_usuari INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_clase_user.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa where tbl_clase.nom_classe like '%".$clase."%' and tbl_etapa.nom_etapa like '%".$etapa."%' AND tbl_usuari.nom_usuari like '%".$profe."%' and tbl_usuari.id_tipus_usuari=2";

/*
$consulta="SELECT * FROM tbl_usuari INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_usuari.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa where tbl_clase.nom_classe like '%".$clase."%' and tbl_etapa.nom_etapa like '%".$etapa."%' and tbl_usuari.id_tipus_usuari=2";

        $etapa=$casos['nom_etapa'];
        $clase=$casos['nom_classe'];
*/

	$exe=mysqli_query($conn,$consulta);

     while ($casos=mysqli_fetch_array($exe)){

        $nom=$casos['nom_usuari'];
        $cognom=$casos['cognom_usuari'];
        $id_profe=$casos['id_usuari'];

echo "<tr>";
  
       echo "<td>".$nom." ".$cognom."</td>";
       echo "<td>";

$consulta2="SELECT DISTINCT tbl_etapa.nom_etapa FROM tbl_clase_user INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_clase_user.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa WHERE tbl_clase_user.id_usuari='$id_profe'";

  $exe2=mysqli_query($conn,$consulta2);

     while ($casos2=mysqli_fetch_array($exe2)){
      
      $etapa=$casos2['nom_etapa'];
      echo $etapa."<br>";

}
       echo "</td><td>";

$consulta3="SELECT DISTINCT tbl_clase.nom_classe FROM tbl_clase_user INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_clase_user.id_clase WHERE tbl_clase_user.id_usuari='$id_profe'";

  $exe3=mysqli_query($conn,$consulta3);

     while ($casos3=mysqli_fetch_array($exe3)){
      
      $clase=$casos3['nom_classe'];
      echo $clase."<br>";

}

 ?>
       <td><a href="../vista/nueva_clase"><i class="fas fa-plus-circle fa-3x" style="color:#367cb3;"></i></td></a>
       <td><a href="../vista/borrar_clase"><i class="fas fa-times-circle fa-3x" style="color:#ba1004;"></i></td></a>

</tr>
<?php 
  
  }