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
//------------------------------Para comprobar clase de los padres--------------------------------------

    if($accion == "c_clase"){
        if(isset($_REQUEST['id_sortida'])){$id_exc=$_REQUEST['id_sortida'];}

        if(isset($_REQUEST['id_alumne'])){$id_alumne=$_REQUEST['id_alumne'];}

        if(isset($_REQUEST['id_pares'])){$id_pares=$_REQUEST['id_pares'];}
        
        /*echo $id_exc;
        echo $id_alumne;*/
        $id_clase1 = "0";
        $id_clase2 = "1";
        $resultado_padre = "";
        $query = "SELECT id_pares_alumnes FROM `tbl_pares_alumnes` WHERE id_pares = ? AND id_alumne = ?";
        if ($stmt = mysqli_prepare($conn, $query)){

            mysqli_stmt_bind_param($stmt, "ss", $id_pares, $id_alumne);

            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            while ($row = $res->fetch_assoc()) {
                $resultado_padre = $row['id_pares_alumnes'];
            }
            //echo $resultado_padre;
            //echo $id_clase1;
        }else{
            echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
        }

        $query = "SELECT id_clase FROM `tbl_alumnes` WHERE id_alumne = ?";
        if ($stmt = mysqli_prepare($conn, $query)){

            mysqli_stmt_bind_param($stmt, "s", $id_alumne);

            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            while ($row = $res->fetch_assoc()) {
                $id_clase1 = $row['id_clase'];
            }
            //echo $id_clase1;
        }else{
            echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
        }

        $query = "SELECT id_clase FROM `tbl_sortida` WHERE id_sortida = ?";
        if ($stmt = mysqli_prepare($conn, $query)){

            mysqli_stmt_bind_param($stmt, "s", $id_exc);

            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            while ($row = $res->fetch_assoc()) {
                $id_clase2 = $row['id_clase'];
            }
            //echo $id_clase2;
            
        }else{
            echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
        }
        
        if ($id_clase1 == $id_clase2){
            if ($resultado_padre >= 1){
            echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 0;
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
            //$foto = explode(",", $nom_fotos);
            echo $titol;
            echo " ";
            echo $descrip;
            echo " ";
            echo $id_sortida;
            echo " ";
           // echo $foto[1]; esta iria en el bind_param en vez de nom_fotos
           echo $nom_fotos;
            echo " ";

            //echo "encima";
            mysqli_stmt_bind_param($stmt, "ssss", $titol, $descrip, $nom_fotos, $id_sortida);
            mysqli_stmt_execute($stmt);
            //echo "Inserción realizada correctamente";
           echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
             
   
            //Envio de email a los padres

//Comprueba que sea la primera vez que se sube una foto

$consultaxa="SELECT id_sortida FROM tbl_galeria WHERE id_sortida='$id_sortida'";
if ($queryxa=mysqli_query($conn,$consultaxa)){

$filasT = mysqli_num_rows($queryxa);

if ($filasT==1) {

//consulta para saber los padres y el nombre de la excursión
$consulta="SELECT tbl_usuari.email_usuari, tbl_activitat.nom_activitat, tbl_clase.nom_classe, tbl_alumnes.nom_alumne FROM tbl_usuari INNER JOIN tbl_pares_alumnes ON tbl_usuari.id_usuari=tbl_pares_alumnes.id_pares INNER JOIN tbl_alumnes ON tbl_alumnes.id_alumne=tbl_pares_alumnes.id_alumne INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_alumnes.id_clase INNER JOIN tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida WHERE tbl_sortida.id_sortida='$id_sortida'";
$query=mysqli_query($conn,$consulta);

$email='';

while ($row=mysqli_fetch_array($query)) {

$email = $email . $row[0].", ";
$nom_activitat=$row[1];
$nom_clase=$row[2];
$nom_fill_alumne=$row[3];
} 

$to = $email; // note the comma

// Subject
$subject = 'Ja estan disponibles les fotos de la sortida';

// Message
$message = '
<html>
<body>
  <p>Ja estan disponibles les fotos de la sortida de '.$nom_clase.' a '.$nom_activitat.' en la va participar el seu fill/a '.$nom_fill_alumne.'</p>
  <p>Podeu veure-les clicant al següent enllaç: <a href="http://localhost/daw/ProyectoFira/vista/galeria_pares.php?id_sortida='.$id_sortida.'">veure fotos</a></p>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=utf-8';

// Additional headers
$headers[] = 'From: Administració sortides <proyectesortidesdaw2@gmail.com>';
$headers[] = 'Cc:';
$headers[] = 'Bcc:';

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
  
}
}
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