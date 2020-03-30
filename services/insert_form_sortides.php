<?php
include("conexion.php");
//$accion = $_REQUEST['accion'];

//-------------------tbl_activitat_contacte--------------------
   $persona_contacte = $_REQUEST['persona_contacte'];
   $web_contacte = $_REQUEST['web_contacte'];
   $tlf_contacte = $_REQUEST['tlf_contacte'];
   $email_contacte = $_REQUEST['email_contacte'];
   $query_act_cont = "INSERT INTO `tbl_contacte_activitat` (`persona_contacte`, `web_contacte`, `telefon_contacte`, `email_contacte`) VALUES (?, ?, ?, ?)";
   
      if ($stmt = mysqli_prepare($conn, $query_act_cont)){
         mysqli_stmt_bind_param($stmt, "ssss", $persona_contacte, $web_contacte, $tlf_contacte, $email_contacte);
         mysqli_stmt_execute($stmt);
         $res = mysqli_stmt_get_result($stmt);
         $act_cont_id = mysqli_insert_id($conn);
      
      }else{
         echo "Error en la consulta preus";
      }

//-------------------tbl_costos--------------------
$cost_substitucio = $_REQUEST['cost_substitucio'];
$cost_act_ind = $_REQUEST['cost_act_ind'];
$cost_ext_act_prof = $_REQUEST['cost_ext_act_prof'];
$cost_glob_act = $_REQUEST['cost_glob_act'];
$cost_final = $_REQUEST['cost_final'];
$preu_fixe = $_REQUEST['preu_fixe'];
$preu_sense_topal = $_REQUEST['preu_sense_topal'];
$preu_amb_topal = $_REQUEST['preu_amb_topal'];
$preu_gestio = $_REQUEST['preu_gestio'];
$overhead = $_REQUEST['overhead'];
$total_facturar = $_REQUEST['total_facturar'];
$pagament_fraccionat = $_REQUEST['pagament_fraccionat'];
$observacio_fraccionat = $_REQUEST['observacions_fraccionat'];

$query_preus = "INSERT INTO `tbl_preus` (`cost_substitucio`, `cost_activitat_individual`, `cost_extra_activitat_profe`, `cost_global_activitat`, `cost_final`, `preu_fixe`, `preu_sense_topal`, `preu_amb_topal`, `preu_gestio`, `overhead`, `total_facturar`, `pagament_fraccionat`, `observacio_fraccionat`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = mysqli_prepare($conn, $query_preus)){
   mysqli_stmt_bind_param($stmt, "sssssssssssss", $cost_substitucio, $cost_act_ind, $cost_ext_act_prof, $cost_glob_act, $cost_final, $preu_fixe, $preu_sense_topal, $preu_amb_topal, $preu_gestio, $overhead, $total_facturar, $pagament_fraccionat, $observacio_fraccionat);
   mysqli_stmt_execute($stmt);
   $res = mysqli_stmt_get_result($stmt);
   $preus_id = mysqli_insert_id($conn);

}else{
   echo "Error en la consulta preus";
}
//-------------------tbl_transport------------------

$hora_sortida = $_REQUEST['hora_sortida'];
$hora_arribada = $_REQUEST['hora_arribada'];
$cost_transport = $_REQUEST['cost_transport'];
$codi_contacte = $_REQUEST['codi_contacte'];
$comentaris_transport = $_REQUEST['comentaris_transport'];
$id_transport = $_REQUEST['tipus_transport'];
$query_transport = "INSERT INTO `tbl_transport` (`hora_sortida`, `hora_arribada`, `cost_transport`, `codi_contacte`, `comentaris_transport`, `id_nom_transport`) VALUES (?, ?, ?, ?, ?, ?)";
if ($stmt = mysqli_prepare($conn, $query_transport)){
   mysqli_stmt_bind_param($stmt, "ssssss", $hora_sortida, $hora_arribada, $cost_transport, $codi_contacte, $comentaris_transport, $id_transport);
   mysqli_stmt_execute($stmt);
   $res = mysqli_stmt_get_result($stmt);
   $transport_id = mysqli_insert_id($conn);
  
}else{
   echo "Error en la consulta sortida";
}

//-------------------tbl_sortida--------------------
$codi_sortida = $_REQUEST['codi_sortida'];
$inici_sortida = $_REQUEST['inici_sortida'];
$final_sortida = $_REQUEST['final_sortida'];
$comentaris_sort = $_REQUEST['comentaris_sort'];
$num_alumnes = $_REQUEST['num_alumnes'];
$num_vetlladors = $_REQUEST['num_vetlladors'];
$num_acomp = $_REQUEST['num_acomp'];
$prof_apart = $_REQUEST['prof_apart'];
$prof_asignat = $_REQUEST['prof_asignat'];
$id_clase = $_REQUEST['id_clase'];
$query_sortida = "INSERT INTO `tbl_sortida` ( `codi_sortida`, `inici_sortida`, `final_sortida`, `observacions_sortida`, `numero_alumnes`, `n_vetlladors`, `n_acompanyants`, `profes_a_part`, `profesor_asignat`, `id_clase`, `id_transport`, `id_precios`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
if ($stmt = mysqli_prepare($conn, $query_sortida)){
   mysqli_stmt_bind_param($stmt, "ssssssssssss", $codi_sortida, $inici_sortida, $final_sortida, $comentaris_sort, $num_alumnes, $num_vetlladors, $num_acomp, $prof_apart, $prof_asignat, $id_clase, $transport_id, $preus_id);
   mysqli_stmt_execute($stmt);
   $res = mysqli_stmt_get_result($stmt);
   $sortida_id = mysqli_insert_id($conn);
  
}else{
   echo "Error en la consulta sortida";
}

//-------------------tbl_lista_profes--------------------

$profes= json_decode($_REQUEST['profes']);

$query_profes = "INSERT INTO `tbl_lista_profesores` (`id_profesor`, `id_excursion`) VALUES (?,?)";

   if ($stmt = mysqli_prepare($conn, $query_profes)){
      foreach($profes as $profe){
         $stmt->bind_param('ss', $profe, $sortida_id);
         $stmt->execute();
      }
      $res = mysqli_stmt_get_result($stmt);
   
   }else{
      echo "Error en la consulta preus";
   }

   
//-------------------tbl_activitat--------------------

      $nom_activitat = $_REQUEST['nom_activitat'];
      $lloc_activitat = $_REQUEST['lloc_activitat'];
      $tipus_activitat = $_REQUEST['tipus_activitat'];
      $ambit_activitat = $_REQUEST['ambit_activitat'];
      $jornada_activitat = $_REQUEST['jornada_activitat'];
      $objectiu_activitat = $_REQUEST['objectiu_activitat'];
   
   
   $query_activitat = "INSERT INTO `tbl_activitat` (`nom_activitat`, `lloc_activitat`, `tipus_activitat`, `ambit_activitat`, `jornada_activitat`, `objectiu_activitat`, `id_contacte_activitat`, `id_sortida`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
   
      if ($stmt = mysqli_prepare($conn, $query_activitat)){
         mysqli_stmt_bind_param($stmt, "ssssssss", $nom_activitat, $lloc_activitat, $tipus_activitat, $ambit_activitat, $jornada_activitat, $objectiu_activitat, $act_cont_id, $sortida_id);
         mysqli_stmt_execute($stmt);
         $res = mysqli_stmt_get_result($stmt);
         $preus_id = mysqli_insert_id($conn);
      
      }else{
         echo "Error en la consulta preus";
      }
 

   
?>