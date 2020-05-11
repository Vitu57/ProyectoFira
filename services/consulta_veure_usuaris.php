<?php
include("conexion.php");
//Si la variable "accion" está definida, continuará con el código. Si no, no utilizará nada.
if(isset($_REQUEST['accion'])){
    $accion=$_REQUEST['accion'];
//--------------------------Para sacar todos los usuarios que hay------------------------------//

if($accion == "veure"){
$query = "SELECT tbl_usuari.id_usuari, tbl_usuari.usuari, tbl_usuari.nom_usuari, tbl_usuari.cognom_usuari, tbl_usuari.computable, tbl_usuari.id_tipus_usuari, tbl_tipus_usuari.nom_tipus FROM tbl_usuari INNER JOIN tbl_tipus_usuari ON tbl_usuari.id_tipus_usuari = tbl_tipus_usuari.id_tipus_usuari";

if ($stmt = mysqli_prepare($conn, $query)){
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $usuaris=array();
    while($row = mysqli_fetch_assoc($res)){
    $usuaris[]=$row;
     }
    print json_encode($usuaris);
    
}else{
    echo "Error en la consulta";
}
}

if($accion == "eliminar"){
    if(isset($_REQUEST['id_user'])){$id_user=$_REQUEST['id_user'];}
    $query = "DELETE FROM tbl_usuari WHERE id_usuari = ?;";
    
    if ($stmt = mysqli_prepare($conn, $query)){

        mysqli_stmt_bind_param($stmt, "s", $id_user);

        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $usuaris=array();
        while($row = mysqli_fetch_assoc($res)){
        $usuaris[]=$row;
         }
        echo "Delete realizado correctamente";
    } else{
        echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
    }
    }

    if($accion == "agafar_dades"){
        if(isset($_REQUEST['id_user'])){$id_user=$_REQUEST['id_user'];}
        $query = "SELECT tbl_usuari.id_usuari, tbl_usuari.usuari, tbl_usuari.nom_usuari, tbl_usuari.cognom_usuari, tbl_usuari.computable, tbl_usuari.siei, tbl_usuari.id_tipus_usuari, tbl_usuari.id_clase, tbl_tipus_usuari.nom_tipus FROM tbl_usuari INNER JOIN tbl_tipus_usuari ON tbl_usuari.id_tipus_usuari = tbl_tipus_usuari.id_tipus_usuari WHERE tbl_usuari.id_usuari = ?";

        
        if ($stmt = mysqli_prepare($conn, $query)){
    
            mysqli_stmt_bind_param($stmt, "s", $id_user);
    
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $usuaris=array();
            while($row = mysqli_fetch_assoc($res)){
            $usuaris[]=$row;
            }
            print json_encode($usuaris);
        } else{
            echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
        }
        }

        if($accion == "actualizar"){
            //Pillamos las variables del ajax
            if(isset($_REQUEST['id_usu'])){$id_usu=$_REQUEST['id_usu'];}
            if(isset($_REQUEST['nom'])){$nom=$_REQUEST['nom'];}
            if(isset($_REQUEST['cognom'])){$cognom=$_REQUEST['cognom'];}
            if(isset($_REQUEST['mail'])){$mail=$_REQUEST['mail'];}
            if(isset($_REQUEST['tipus'])){$tipus=$_REQUEST['tipus'];}
            if(isset($_REQUEST['pass'])){$passx=$_REQUEST['pass'];}
            if(isset($_REQUEST['siei'])){$siei=$_REQUEST['siei'];}
            if(isset($_REQUEST['computable'])){$computable=$_REQUEST['computable'];}
            if(isset($_REQUEST['clase'])){$clase=$_REQUEST['clase'];}

            //pasamos la contraseña a md5
            $pass = md5($passx);

            //Pasamos del resultado del checkbox a texto
            if ($siei == "true"){
                $siei = "si";
            }else{
                $siei = "no";
            }
 
            if ($computable == "true"){
                $computable = "si";
            }else{
                $computable = "no";
            }

            //echo "UPDATE tbl_usuari SET usuari = $mail, contrasenya = $pass, nom_usuari = $nom, cognom_usuari = $cognom, siei = $siei, computable = $computable, id_clase = $clase, id_tipus_usuari = $tipus WHERE id_usuari = $id_usu";

            //Query preparada
            $query = "UPDATE tbl_usuari SET usuari = ?, contrasenya = ?, nom_usuari = ?, cognom_usuari = ?, siei = ?, computable = ?, id_clase = ?, id_tipus_usuari = ? WHERE id_usuari = ?";
    
            
            if ($stmt2 = mysqli_prepare($conn, $query)){
        
                mysqli_stmt_bind_param($stmt2, "ssssssiii", $mail, $pass, $nom, $cognom, $siei, $computable, $clase, $tipus, $id_usu);
        
                mysqli_stmt_execute($stmt2);
                
            echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
            } else{
                echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
            }
            }

            if($accion == "filtrar"){
                if(isset($_REQUEST['user'])){$user=$_REQUEST['user'];}else{$user="%";}
                if(isset($_REQUEST['nom'])){$nom=$_REQUEST['nom'];}else{$nom="%";}
                if(isset($_REQUEST['cognom'])){$cognom=$_REQUEST['cognom'];}else{$cognom="%";}
                if(isset($_REQUEST['tipus'])){$tipus=$_REQUEST['tipus'];}
                
                $user = $user.'%';
                $nom = $nom.'%';
                $cognom = $cognom.'%';
                
                $query = "SELECT tbl_usuari.id_usuari, tbl_usuari.usuari, tbl_usuari.nom_usuari, tbl_usuari.cognom_usuari, tbl_usuari.computable, tbl_usuari.id_tipus_usuari, tbl_tipus_usuari.nom_tipus FROM tbl_usuari INNER JOIN tbl_tipus_usuari ON tbl_usuari.id_tipus_usuari LIKE tbl_tipus_usuari.id_tipus_usuari WHERE tbl_usuari.usuari LIKE ? AND tbl_usuari.nom_usuari LIKE ? AND tbl_usuari.cognom_usuari LIKE ? AND tbl_usuari.id_tipus_usuari LIKE ?";

                if ($stmt = mysqli_prepare($conn, $query)){
                    mysqli_stmt_bind_param($stmt, "ssss", $user, $nom, $cognom, $tipus);
                    mysqli_stmt_execute($stmt);
                    $res = mysqli_stmt_get_result($stmt);
                    $usuaris=array();
                    while($row = mysqli_fetch_assoc($res)){
                    $usuaris[]=$row;
                    }
                    print json_encode($usuaris);
                    
                }else{
                    echo "Error en la consulta";
                }

            }



}
   	?>