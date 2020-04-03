<?php

include "conexion.php";

 try {
    //-------------------tbl_activitat_contacte--------------------
       $persona_contacte = $_REQUEST['persona_contacte'];
       $web_contacte = $_REQUEST['web_contacte'];
       $tlf_contacte = $_REQUEST['tlf_contacte'];
       $email_contacte = $_REQUEST['email_contacte'];
       $id_contacte_activitat = $_REQUEST['id_contacte_activitat'];
       $update_act_cont = "UPDATE `tbl_contacte_activitat` SET `persona_contacte` = ?, `web_contacte` = ?, `telefon_contacte` = ?, `email_contacte` = ? WHERE `tbl_contacte_activitat`.`id_contacte_activitat` = ? ";
          if ($stmt = mysqli_prepare($conn, $update_act_cont)){
             mysqli_stmt_bind_param($stmt, "sssss", $persona_contacte, $web_contacte, $tlf_contacte, $email_contacte, $id_contacte_activitat);
             mysqli_stmt_execute($stmt);
             $res = mysqli_stmt_get_result($stmt);
          
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
    $id_preus = $_REQUEST['id_preus'];
    
    $update_preus = "UPDATE `tbl_preus` SET `cost_substitucio` = ?, `cost_activitat_individual` = ?, `cost_extra_activitat_profe` = ?, `cost_global_activitat` = ?, `cost_final` = ?, `preu_fixe` = ?, `preu_sense_topal` = ?, `preu_amb_topal` = ?, `preu_gestio` = ?, `overhead` = ?, `total_facturar` = ?, `pagament_fraccionat` = ?, `observacio_fraccionat` = ? WHERE `tbl_preus`.`id_preus` = ? ";
    
    if ($stmt = mysqli_prepare($conn, $update_preus)){
       mysqli_stmt_bind_param($stmt, "ssssssssssssss", $cost_substitucio, $cost_act_ind, $cost_ext_act_prof, $cost_glob_act, $cost_final, $preu_fixe, $preu_sense_topal, $preu_amb_topal, $preu_gestio, $overhead, $total_facturar, $pagament_fraccionat, $observacio_fraccionat, $id_preus);
       mysqli_stmt_execute($stmt);
       $res = mysqli_stmt_get_result($stmt);
    
    }else{
       echo "Error en la consulta preus";
    }
    //-------------------tbl_transport------------------
    
    $hora_sortida = $_REQUEST['hora_sortida'];
    $hora_arribada = $_REQUEST['hora_arribada'];
    $cost_transport = $_REQUEST['cost_transport'];
    $codi_contacte = $_REQUEST['codi_contacte'];
    $comentaris_transport = $_REQUEST['comentaris_transport'];
    $id_tipus_transport = $_REQUEST['tipus_transport'];
    $id_transport = $_REQUEST['tipus_transport'];
    $update_transport = "UPDATE `tbl_transport` SET `hora_sortida` = ?, `hora_arribada` = ?, `cost_transport` = ?, `codi_contacte` = ?, `comentaris_transport` = ?, `id_nom_transport` = ? WHERE `tbl_transport`.`id_transport` = ? ";
    if ($stmt = mysqli_prepare($conn, $update_transport)){
       mysqli_stmt_bind_param($stmt, "sssssss", $hora_sortida, $hora_arribada, $cost_transport, $codi_contacte, $comentaris_transport, $id_tipus_transport, $id_transport);
       mysqli_stmt_execute($stmt);
       $res = mysqli_stmt_get_result($stmt);
      
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
    $id_sortida = $_REQUEST['id_sortida'];
    $update_sortida = "UPDATE `tbl_sortida` SET `codi_sortida` = ?, `inici_sortida` = ?, `final_sortida` = ?, `observacions_sortida` = ?, `numero_alumnes` = ?, `n_vetlladors` = ?, `n_acompanyants` = ?, `profes_a_part` = ?, `profesor_asignat` = ?, `id_clase` = ? WHERE `tbl_sortida`.`id_sortida` = ?";

    if ($stmt = mysqli_prepare($conn, $update_sortida)){
       mysqli_stmt_bind_param($stmt, "sssssssssss", $codi_sortida, $inici_sortida, $final_sortida, $comentaris_sort, $num_alumnes, $num_vetlladors, $num_acomp, $prof_apart, $prof_asignat, $id_clase, $id_sortida);
       mysqli_stmt_execute($stmt);
       $res = mysqli_stmt_get_result($stmt);
      
    }else{
       echo "Error en la consulta sortida";
    }
    
    //-------------------tbl_lista_profes--------------------
    
    $id_del_prof = $_REQUEST['id_del_prof'];
    $profes = json_decode($_REQUEST['profes']);
    
    if(isset($id_del_prof)){
      $delete_profes = "DELETE FROM `tbl_lista_profesores` WHERE tbl_lista_profesores.id_excursion = ?";
      if ($stmt = mysqli_prepare($conn, $delete_profes)){
         foreach($profes as $profe){
            $stmt->bind_param('s', $id_del_prof);
            $stmt->execute();
         }
         $res = mysqli_stmt_get_result($stmt);
      
      }else{
         echo "Error en la consulta preus";
      }
    }

    $insert_profes = "INSERT INTO `tbl_lista_profesores` (`id_profesor`, `id_excursion`) VALUES (?,?)";

   if ($stmt = mysqli_prepare($conn, $insert_profes)){
      foreach($profes as $profe){
         $stmt->bind_param('ss', $profe, $id_sortida);
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
          $id_activitat = $_REQUEST['id_activitat'];
       
       
       $update_activitat = "UPDATE `tbl_activitat` SET `nom_activitat` = ?, `lloc_activitat` = ?, `tipus_activitat` = ?, `ambit_activitat` = ?, `jornada_activitat` = ?, `objectiu_activitat` = ? WHERE `tbl_activitat`.`id_activitat` = ?";
       
          if ($stmt = mysqli_prepare($conn, $update_activitat)){
             mysqli_stmt_bind_param($stmt, "sssssss", $nom_activitat, $lloc_activitat, $tipus_activitat, $ambit_activitat, $jornada_activitat, $objectiu_activitat, $id_activitat);
             mysqli_stmt_execute($stmt);
             $res = mysqli_stmt_get_result($stmt);
          
          }else{
             echo "Error en la consulta preus";
          }
    
          mysqli_commit($conn);
       }catch (Exception $e) {
          mysqli_rollback($conn);
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        
    }
    
       
    ?>
