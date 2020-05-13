<?php
//se incluye la pagina conexion.php para poder recoger la conexión a la BD
   include("conexion.php");
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Declarar variables y hacer request del formulario
    $myusername = $_REQUEST['username'];
    $mypassword = $_REQUEST['password'];
    $pass = md5($mypassword);
    $query = "SELECT * FROM tbl_pares WHERE usuari_pares = ? AND password_pares = ?";

    if (isset($_REQUEST["username"])) {
        //Ejecutar consulta segura anti sql injection
        if ($stmt = mysqli_prepare($conn, $query)){
            mysqli_stmt_bind_param($stmt, "ss", $myusername, $pass);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_array($res)) {
                $nom = $row["nom_pares"];
				$cognom = $row["cognoms_pares"];
                $id = $row["id_pares"];
                $cont_visitas = $row["cont_visitas"];
            }
            $row_cnt = mysqli_num_rows($res);
        }else{
            echo "Error en la consulta";
        }

        //Comprobar que el usuario está registrado
        if (!empty($stmt) && $row_cnt == 1) {
            session_start();
            
            $cont_visitas+=1;
            $_SESSION['nombre'] = $nom;
			$_SESSION['cognom'] = $cognom;
            $_SESSION['id_pares'] = $id;
            $_SESSION['cont_visitas'] = $cont_visitas;

$upd_cont_visitas="UPDATE tbl_pares SET cont_visitas='$cont_visitas' WHERE id_pares='$id'";
$exe=mysqli_query($conn,$upd_cont_visitas);    

            header("Location: ../vista/home_pares.php");
        }else{
            header('Refresh:0; url = ../vista/login_pares.php?us=' . $myusername);
        }
    }
}