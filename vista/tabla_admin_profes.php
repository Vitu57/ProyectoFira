<?php
include "../services/conexion.php";
//Estos son los valores que tiene el filtro, si no los encuentra los pone vacios
if(isset($_REQUEST['clase'])){
	$clase=$_REQUEST['clase'];
}else{
	$clase="";
}
if(isset($_REQUEST['nom_profe'])){
	$nom_profe=$_REQUEST['nom_profe'];
}else{
	$nom_profe="";
}
if(isset($_REQUEST['cog_profe'])){
  $cog_profe=$_REQUEST['cog_profe'];
}else{
  $cog_profe="";
}
if(isset($_REQUEST['etapa'])){
  $etapa=$_REQUEST['etapa'];
}else{
  $etapa="";
}


//Comprueba que no hay errores
if (isset($_REQUEST['error'])) {
  if ($_REQUEST['error']==1) {
   echo "<p style='margin-top:1%; color:red;'>El profesor ha de tenir com a minim una clase</p>";
  }else{
   echo "<p style='margin-top:1%; color:red;'>El profesor ja está asignat a la clase</p>";
  }
}

?>
  <table id="admin_profe_table" class="table table-bordered" style="text-align:center; background-color: rgba(255,255,255,1);"><thead class="thead-dark">
  <tr>

   <th scope='col'>Professors</th>
   <th scope="col">Etapes</th>
   <th scope="col">Clases</th>
   <th scope='col'>Afegir clase a professor</th>
   <th scope='col'>Eliminar clase de professor</th>

  </tr>
</thead>
<?php

    //consulta para saber los datos de las salidas, las actividades y el transporte
$consulta="SELECT DISTINCT tbl_usuari.id_usuari, tbl_usuari.nom_usuari, tbl_usuari.cognom_usuari FROM tbl_usuari INNER JOIN tbl_clase_user ON tbl_usuari.id_usuari=tbl_clase_user.id_usuari INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_clase_user.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa where tbl_clase.nom_classe like '%".$clase."%' and tbl_etapa.nom_etapa like '%".$etapa."%' AND tbl_usuari.nom_usuari like '%".$nom_profe."%' AND tbl_usuari.cognom_usuari like '%".$cog_profe."%' and tbl_usuari.id_tipus_usuari=2 ORDER BY tbl_usuari.id_usuari";

	$exe=mysqli_query($conn,$consulta);

     while ($casos=mysqli_fetch_array($exe)){

        $nom=$casos['nom_usuari'];
        $cognom=$casos['cognom_usuari'];
        $id_profe=$casos['id_usuari'];

echo "<tr>";
  
       echo "<td>".$nom." ".$cognom."</td>";
       echo "<td>";

$consulta2="SELECT DISTINCT tbl_etapa.nom_etapa FROM tbl_clase_user INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_clase_user.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa WHERE tbl_clase_user.id_usuari='$id_profe' ORDER BY tbl_etapa.id_etapa";

  $exe2=mysqli_query($conn,$consulta2);

     while ($casos2=mysqli_fetch_array($exe2)){
      
      $etapa=$casos2['nom_etapa'];
      echo $etapa."<br>";

}
       echo "</td><td>";

$consulta3="SELECT DISTINCT tbl_clase.nom_classe FROM tbl_clase_user INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_clase_user.id_clase WHERE tbl_clase_user.id_usuari='$id_profe' ORDER BY tbl_clase.id_clase";

  $exe3=mysqli_query($conn,$consulta3);

     while ($casos3=mysqli_fetch_array($exe3)){
      
      $clase=$casos3['nom_classe'];
      echo $clase."<br>";

}

 ?>
       <td style="width: 25%;">
       

  <form action="#add" onsubmit="nova_clase_profe(<?php echo $id_profe; ?>); return false" method="POST">


<?php

echo "<select class='form_admin_profes' id='clase_profe".$id_profe."' name='clase'>";

$consultaadmin="SELECT nom_classe FROM tbl_clase WHERE nom_classe!='personal'";

//ejecutamos la consulta
$consulta=mysqli_query($conn,$consultaadmin);

while($rows = mysqli_fetch_assoc($consulta)){



echo "<option>".$rows['nom_classe']."</option>";

}    


echo "</select>";

?>   
          
   <input type="image" src="../images/plus_circle.png" class="img_form" name="añadir">
       
             </form></td>

      <td style="width: 25%;">
        
  <form action="#elim" onsubmit="eliminar_clase_profe(<?php echo $id_profe; ?>); return false" method="POST">

<?php
echo "<select class='form_admin_profes' id='elim_clase_profe".$id_profe."' name='clase'>";

 $consultaadmin="SELECT DISTINCT tbl_clase.id_clase, tbl_clase.nom_classe FROM tbl_clase_user INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_clase_user.id_clase INNER JOIN tbl_etapa ON tbl_etapa.id_etapa=tbl_clase.id_etapa WHERE tbl_clase_user.id_usuari='$id_profe' ORDER BY tbl_etapa.id_etapa";
//ejecutamos la consulta
$consulta4=mysqli_query($conn,$consultaadmin);
while($rows = mysqli_fetch_array($consulta4)){


$consultaadmin2="SELECT tbl_clase.id_clase FROM tbl_clase";
//ejecutamos la consulta
$consulta5=mysqli_query($conn,$consultaadmin2);


while($case = mysqli_fetch_array($consulta5)){
    
if ($case['id_clase']==$rows['id_clase']) {

echo "<option>".$rows['nom_classe']."</option>";
}    
}
}


?>   
          
   <input type="image" src="../images/mal_check.png" class="img_form" name="añadir">
       
             </form></td>

</tr>

<?php 
  


  }
  ?>
  </table>