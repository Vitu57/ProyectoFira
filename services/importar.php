<?php

include('conexion.php');

$fileSortides = $_FILES['fileSortides']; 
$fileSortides = file_get_contents($fileSortides['tmp_name']); 

$fileSortides = explode("\n", $fileSortides);
$fileSortides = array_filter($fileSortides); 
print_r($fileSortides);


// preparar contactos (convertirlos en array)
foreach ($fileSortides as $sortides) 
{

	$sortidesList[] = explode(",", $sortides);
}
  $existente = 0;
// insertar contactos
foreach ($sortidesList as $sortidesData) 
{
	$paso=1;
	
  	$usuario=$sortidesData[0];
    

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
            $paso=0;
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

if ($paso==1) {

    $sortidesData[1] = md5($sortidesData[1]);
	$conn->query("INSERT INTO tbl_usuari 
						(usuari,
						 contrasenya,
						 nom_usuari,
						 cognom_usuari,
						 siei,
						 computable,
						 id_clase,
						 id_tipus_usuari)
						 VALUES

						 ('{$sortidesData[0]}',
						  '{$sortidesData[1]}',
						  '{$sortidesData[2]}',
						  '{$sortidesData[3]}',
						  '{$sortidesData[4]}',
						  '{$sortidesData[5]}', 
						  '{$sortidesData[6]}',
						  '{$sortidesData[7]}
						  '
						   )

						 "); 
}
}


?>