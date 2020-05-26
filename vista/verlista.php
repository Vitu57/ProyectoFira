<?php
include "../services/conexion.php";
include "../services/header.php";
if (!$_SESSION['id']) {
  header("location:login.php");
}
$id_activitat=$_REQUEST['id'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Llista</title>
  <link rel="stylesheet" type="text/css" href="../css/tablesort.css">
  <script src='../plugin/tablesort/tablesort.js'></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/logo_pag.ico">
    <script type="text/javascript" src="../js/ajax.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="calendar/css/vanilla-calendar-min.css">
    <script src="calendar/js/vanilla-calendar-min.js"></script>
    <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
    <body class="home"  style="text-align: center; padding: 5%;" onload="verlista('<?php echo $id_activitat ?>'); return false;">
    <div class="header" style=" border-radius: 15px;">
        <div style="padding: 3%; padding-bottom: 0%;">
            <a href="../vista/verexcursionesadmin.php">
                <i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: -2%; color: #071334;" class="btn btn-secondary"></i>
            </a>
              <p class="h2 mb-4">Llista de Sortida</p>
              <div id="resultado">
              </div>
        </div>
    </div>
</body>
</html>