<?php
//se incluye la pagina conexion.php para poder recoger la conexión a la BD
   include("conexion.php");
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Declarar variables y hacer request del formulario
    $myusername = $_REQUEST['username'];
    $mypassword = $_REQUEST['password'];
    $pass = md5($mypassword);
    $query = "SELECT * FROM tbl_usuari WHERE usuari = ? AND contrasenya = ?";

    if (isset($_REQUEST["username"])) {
        //Ejecutar consulta segura anti sql injection
        if ($stmt = mysqli_prepare($conn, $query)){
            mysqli_stmt_bind_param($stmt, "ss", $myusername, $pass);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_array($res)) {
                $nom = $row["nom_usuari"];
				$cognom = $row["cognom_usuari"];
                $id = $row["id_usuari"];
            }
            $row_cnt = mysqli_num_rows($res);
        }else{
            echo "Error en la consulta";
        }

        //Comprobar que el usuario está registrado
        if (!empty($stmt) && $row_cnt == 1) {
            session_start();
            $_SESSION['nombre'] = $nom;
			$_SESSION['cognom'] = $cognom;
            $_SESSION['id'] = $id;
            header("Location: ../vista/home.php");
        }else{
        	 echo "<script type='text/javascript'>alert('Usuari o contrasenya incorrectes')</script>";
            header('Refresh:0; url = ../index.php?us=' . $myusername);
        }
    }
}