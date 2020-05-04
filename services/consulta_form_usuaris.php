<?php
include("conexion.php");
//Si la variable "accion" está definida, continuará con el código. Si no, no utilizará nada.
if(isset($_REQUEST['accion'])){
    $accion=$_REQUEST['accion'];
//--------------------------Para sacar todos los tipos que hay------------------------------//

if($accion == "tipus"){
$query = "SELECT `nom_tipus`,`id_tipus_usuari` FROM `tbl_tipus_usuari`";

if ($stmt = mysqli_prepare($conn, $query)){
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $tipus=array();
    while($row = mysqli_fetch_assoc($res)){
    $tipus[]=$row;
     }
    print json_encode($tipus);
    
}else{
    echo "Error en la consulta";
}
}

if($accion == "class"){
    $query = "SELECT `id_clase`,`nom_classe` FROM `tbl_clase`";
    
    if ($stmt = mysqli_prepare($conn, $query)){
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $classe=array();
        while($row = mysqli_fetch_assoc($res)){
        $classe[]=$row;
         }
        print json_encode($classe);
        
    }else{
        echo "Error en la consulta".mysqli_error($conn);
    }
    }

//Comprobar si el usuario existe o no existe.
if($accion == "checkusu"){
    $existente = 0;
    if(isset($_REQUEST['usuario'])){$usuario=$_REQUEST['usuario'];}

    $query = "SELECT usuari FROM `tbl_usuari` WHERE usuari = ?";

    if($stmt = mysqli_prepare($conn, $query)){
        // Definimos que el usuario es el que irá en el interrogante
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        
        //Ejecutamos la consulta
        mysqli_stmt_execute($stmt);

        //Recogemos el resultado (en el caso de que no haya no creará la variable $user)
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        //echo $user;
        //echo $query;
        //echo "Records inserted successfully.";

        //Si la variable user existe, recorrerá el array y sumará 1 a la variable
        // $existente, de tal forma que...
        if (isset($user)){
        foreach ($user as $user){
           // echo $user;
            $existente = $existente +1;
        }
    }

    //Si existente es superior a 1 significa que el usuario existe en la base de datos
    //Si es igual a 0, el usuario se puede introducir
        if ($existente > 0){
            echo "ko";
        }else{
            echo "ok";
        }

    } else{
        echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}


//--------------------Si lo que queremos hacer es un insert------------------------------//
if($accion == "insert"){


    //Comprobamos que todas las variables están, y si están, las definimos
    if(isset($_REQUEST['nom'])){$nom=$_REQUEST['nom'];}
    
    if(isset($_REQUEST['cognom'])){$cognom=$_REQUEST['cognom'];}
    if(isset($_REQUEST['mail'])){$mail=$_REQUEST['mail'];}
    if(isset($_REQUEST['tipus'])){$tipus=$_REQUEST['tipus'];}
    if(isset($_REQUEST['pass'])){$pass=$_REQUEST['pass'];}
    if(isset($_REQUEST['siei'])){$siei=$_REQUEST['siei'];}
    if(isset($_REQUEST['computable'])){$computable=$_REQUEST['computable'];}
    if(isset($_REQUEST['clase'])){$clase=$_REQUEST['clase'];}

//Comprobamos si los checkbox de SIEI están checkeados o no, si lo están cambiamos el nombre
    if($siei == "true"){
        $siei = "si";
    }else if($siei == "false"){
        $siei = "no";
    }
//Lo mismo pero con computable
    if($computable == "true"){
        $computable = "si";
    }else if($computable == "false"){
        $computable = "no";
    }

    $pass = md5($pass);
    /*echo $mail;
    echo $pass;
    echo $nom;
    echo $cognom;
    echo $siei;
    echo $computable;
    echo $tipus;
    echo "";*/
    
    //Preparamos el insert dependiendo si es alumno o profesor:
    if ($tipus == 7){
        //Si hay 2 palabras, es decir, dos apellidos: 
        if(str_word_count($cognom, 0)==2){
        list($apellido1, $apellido2) = explode(' ', $cognom);
        }else{
            $apellido1 = $cognom;
            $apellido2 = "-";
        }
        $query = "INSERT INTO tbl_alumnes (nom_alumne, cognom1_alumne, cognom2_alumne, siei, id_clase) VALUES (?, ?, ?, ?, ?)";    
    }else{
    $query = "INSERT INTO tbl_usuari (usuari, contrasenya, nom_usuari, cognom_usuari, siei, computable, id_tipus_usuari, id_clase) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    }
    if($stmt = mysqli_prepare($conn, $query)){
        // Bind variables to the prepared statement as parameters
        if ($tipus == 7){
            mysqli_stmt_bind_param($stmt, "sssss", $nom, $apellido1, $apellido2, $siei, $clase);
        }else{
            mysqli_stmt_bind_param($stmt, "ssssssss", $mail, $pass, $nom, $cognom, $siei, $computable, $tipus, $clase);
        }
        mysqli_stmt_execute($stmt);
        echo "Inserción realizada correctamente";
    } else{
        echo "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
    
}
}
   	?>