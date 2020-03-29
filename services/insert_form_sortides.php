<?php
include("conexion.php");
$accion = $_REQUEST['accion'];

if ($accion = "tbl_act_cont"){
   $cost_substitucio = $_REQUEST['cost_substitucio'];
   $cost_substitucio = $_REQUEST['cost_substitucio'];
   $cost_substitucio = $_REQUEST['cost_substitucio'];
   $cost_substitucio = $_REQUEST['cost_substitucio'];
   $query_preus = "INSERT INTO `tbl_contacte_activitat` (`persona_contacte`, `web_contacte`, `telefon_contacte`, `email_contacte`) VALUES (?, ?, ?, ?)";
   
      if ($stmt = mysqli_prepare($conn, $query_preus)){
         mysqli_stmt_bind_param($stmt, "ssss", $myusername, $pass);
         mysqli_stmt_execute($stmt);
         $res = mysqli_stmt_get_result($stmt);
         $act_cont_id = mysqli_insert_id();
      
      }else{
         echo "Error en la consulta preus";
      }
   }

if ($accion = "preus"){
   $cost_substitucio = $_REQUEST['cost_substitucio'];
   $cost_activitat_individual = $_REQUEST['cost_activitat_individual'];
   $cost_extra_activitat_profe = $_REQUEST['cost_extra_activitat_profe'];
   $cost_global_activitat = $_REQUEST['cost_global_activitat'];
   $cost_final = $_REQUEST['cost_final'];
   $preu_fixe = $_REQUEST['preu_fixe'];
   $preu_sense_topal = $_REQUEST['preu_sense_topal'];
   $preu_amb_topal = $_REQUEST['preu_amb_topal'];
   $preu_gestio = $_REQUEST['preu_gestio'];
   $overhead = $_REQUEST['overhead'];
   $total_facturar = $_REQUEST['total_facturar'];
   $pagament_fraccionat = $_REQUEST['pagament_fraccionat'];
   $observacio_fraccionat = $_REQUEST['observacio_fraccionat'];

$query_preus = "INSERT INTO `tbl_preus` (`cost_substitucio`, `cost_activitat_individual`, `cost_extra_activitat_profe`, `cost_global_activitat`, `cost_final`, `preu_fixe`, `preu_sense_topal`, `preu_amb_topal`, `preu_gestio`, `overhead`, `total_facturar`, `pagament_fraccionat`, `observacio_fraccionat`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

   if ($stmt = mysqli_prepare($conn, $query_preus)){
      mysqli_stmt_bind_param($stmt, "sssssssssssss", $myusername, $pass);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
      $preus_id = mysqli_insert_id();
   
   }else{
      echo "Error en la consulta preus";
   }
}

   if ($accion = "sortida"){
      $codi_sortida = $_REQUEST['codi_sortida'];
      $inici_sortida = $_REQUEST['inici_sortida'];
      $final_sortida = $_REQUEST['final_sortida'];
      $observacions_sortida = $_REQUEST['observacions_sortida'];
      $num_alumnes = $_REQUEST['num_alumnes'];
      $num_vetlladors = $_REQUEST['num_vetlladors'];
      $num_acomp = $_REQUEST['num_acomp'];
      $profes_apart = $_REQUEST['profes_apart'];
      $nom_clase = $_REQUEST['nom_clase'];
      $nom_transport = $_REQUEST['nom_transport'];
      $query_sortida = "INSERT INTO `tbl_sortida` ( `codi_sortida`, `inici_sortida`, `final_sortida`, `observacions_sortida`, `numero_alumnes`, `n_vetlladors`, `n_acompanyants`, `profes_a_part`, `profesor_asignat`, `id_clase`, `id_transport`, `id_precios`, `comanda_menu`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL)";
      if ($stmt = mysqli_prepare($conn, $query_sortida)){
         mysqli_stmt_bind_param($stmt, "sssssssssssss", $myusername, $pass);
         mysqli_stmt_execute($stmt);
         $res = mysqli_stmt_get_result($stmt);
         $sortida_id = mysqli_insert_id();
        
     }else{
         echo "Error en la consulta sortida";
    }
   }

   if ($accion = "activitat"){
      $nom_activitat = $_REQUEST['nom_activitat'];
      $lloc_activitat = $_REQUEST['lloc_activitat'];
      $tipus_activitat = $_REQUEST['tipus_activitat'];
      $ambit_activitat = $_REQUEST['ambit_activitat'];
      $jornada_activitat = $_REQUEST['jornada_activitat'];
      $objectiu_activitat = $_REQUEST['objectiu_activitat'];
      $id_contacte_activitat = $_REQUEST['id_contacte_activitat'];
      $id_sortida = $_REQUEST['id_sortida'];
   
   
   $query_preus = "INSERT INTO `tbl_activitat` (`nom_activitat`, `lloc_activitat`, `tipus_activitat`, `ambit_activitat`, `jornada_activitat`, `objectiu_activitat`, `id_contacte_activitat`, `id_sortida`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
   
      if ($stmt = mysqli_prepare($conn, $query_preus)){
         mysqli_stmt_bind_param($stmt, "sssssssssssss", $myusername, $pass);
         mysqli_stmt_execute($stmt);
         $res = mysqli_stmt_get_result($stmt);
         $preus_id = mysqli_insert_id();
      
      }else{
         echo "Error en la consulta preus";
      }
   }
?>