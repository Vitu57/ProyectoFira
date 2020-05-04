<?php
include("conexion.php");
if(isset($_REQUEST["accion"])){$accion=$_REQUEST["accion"];}

if (isset($accion)){

    if($accion == "ver_img"){

        if(isset($_REQUEST['id_exc'])){$id_exc=$_REQUEST['id_exc'];}
        $query = "SELECT img_path FROM tbl_galeria WHERE id_sortida = ?";
        
        if ($stmt = mysqli_prepare($conn, $query)){

            mysqli_stmt_bind_param($stmt, "s", $id_exc);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $path=array();
            while($row = mysqli_fetch_assoc($res)){
            $path[]=$row;
             }
            print json_encode($path);
            
        }else{
            echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
        }

    }



//----------------------------Para ver el nombre de la excursión por la id----------------------------
    if($accion == "nombre"){
        if(isset($_REQUEST['id_exc'])){$id_exc=$_REQUEST['id_exc'];}


        $query = "SELECT nom_activitat FROM tbl_activitat WHERE id_sortida = ?";
        if ($stmt = mysqli_prepare($conn, $query)){

            mysqli_stmt_bind_param($stmt, "s", $id_exc);

            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $nombre=array();
            while($row = mysqli_fetch_assoc($res)){
            $nombre[]=$row;
             }
            print json_encode($nombre);
            
        }else{
            echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
        }
    }



//------------------------------Para hacer el insert--------------------------------------
    if($accion == "insert"){
        if(isset($_REQUEST['titol'])){$titol=$_REQUEST['titol'];}
        if(isset($_REQUEST['descrip'])){$descrip=$_REQUEST['descrip'];}
        if(isset($_REQUEST['id_sortida'])){$id_sortida=$_REQUEST['id_sortida'];}
        if(isset($_REQUEST['nom_fotos'])){$nom_fotos=$_REQUEST['nom_fotos'];}
        if(isset($_REQUEST['nom_exc'])){$nom_exc=$_REQUEST['nom_exc'];}

        //Hacemos que el nombre de la foto (path) sea toda la ruta completa juntandolo al nombre
        $nom_exc = str_replace(" ", "_", $nom_exc);
        $nom_fotos = "exc_".$nom_exc."/".$nom_fotos;
        $query = "INSERT INTO tbl_galeria (nom_imatge, desc_imatge, img_path, id_sortida) VALUES (?, ?, ?, ?)";
        if($stmt = mysqli_prepare($conn, $query)){
            /*$foto = explode(",", $nom_fotos);*/
            echo $titol;
            echo " ";
            echo $descrip;
            echo " ";
            echo $id_sortida;
            echo " ";
           /* echo $foto[1]; esta iria en el bind_param en vez de nom_fotos*/
           echo $nom_fotos;
            echo " ";

            //echo "encima";
            mysqli_stmt_bind_param($stmt, "ssss", $titol, $descrip, $nom_fotos, $id_sortida);
            mysqli_stmt_execute($stmt);
            //echo "Inserción realizada correctamente";
           echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
        } else{
            echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }

    if($accion == "mover"){
        /*echo "<pre>";
        print_r($_POST);
        echo "</pre>";
*/
        
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";

        //Si está definido el nombre de la excursión creamos una carpeta con su nombre
        if(isset($_REQUEST['nom_exc'])){
            $nom_exc=$_REQUEST['nom_exc'];
            $nom_exc = str_replace(" ", "_", $nom_exc);

            $uploads_dir = '../images/galeria/Exc_'.$nom_exc;
            if (!file_exists($uploads_dir)) {
                mkdir($uploads_dir, 0777, true);
                } 
            }else{
               $uploads_dir = '../images/galeria/Exc_'.$nom_exc; //Si ya existe, no se creará
            }
            $tmp_name = $_FILES["fotos"]["tmp_name"];
        
            $name = basename($_FILES["fotos"]["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            
        
    }

}



?>