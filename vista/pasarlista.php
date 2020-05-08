<?php
include "../services/conexion.php";
include "../services/header.php";
if (!$_SESSION['id']) {
  header("location:login.php");
}
$id_activitat=$_REQUEST['id_actividad'];
$clase=$_REQUEST['clase'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Llista</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/logo_pag.ico">
    <script type="text/javascript" src="../js/ajax.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="calendar/css/vanilla-calendar-min.css">
    <script src="calendar/js/vanilla-calendar-min.js"></script>
    <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>
<?php
  function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  }
  if (isMobile()) {
    ?>
    <body class="home"  style="text-align: center; padding: 5%;" onload="CrearTabla_Lista2('<?php echo $id_activitat ?>', '<?php echo $clase ?>' ); return false;">
    <?php
  }else{
    ?>
    <body class="home"  style="text-align: center; padding: 5%;" onload="CrearTabla_Lista('<?php echo $id_activitat ?>', '<?php echo $clase ?>' ); return false;">
    <?php
  }
?>
    <div class="header" style=" border-radius: 15px;">
        <div style="padding: 3%; padding-bottom: 0%;">
            <a href="../vista/excursiones_profes.php">
                <i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: -2%; color: #071334;" class="btn btn-secondary"></i>
            </a>
            <?php
            if (isMobile()) {
              ?>
                <p style="font-size: 500%;">Llista de Sortida</p>
              <?php
            }else{
              ?>
              <p class="h2 mb-4">Llista de Sortida</p>
              <?php
            }
            ?>
            
        </div>
        <div id="resultado" style="margin-right: 5%; margin-left: 5%; overflow-y:auto; position:relative; z-index:9;"></div>
        <button class="btn btn-lg" onclick="location.href='form_alumne.php?id_actividad=<?php echo $id_activitat; ?>&clase=<?php echo $clase; ?>'" style="margin-top: 2%; margin-right:1%; padding: 0.5%; color: white; background-color: #367cb3; ">Afegir Alumne</button>
    </div>
</body>
</html>