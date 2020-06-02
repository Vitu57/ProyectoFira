<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
    <script type="text/javascript" src="../js/primera_visita.js"></script>
    <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <!--Calendario-->
  <link href="https://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
  
  <link rel="stylesheet" href="calendar/css/vanilla-calendar-min.css">
  <link rel="stylesheet" href="calendar/css/vanilla-calendar-mobile.css">
  <script src="calendar/js/vanilla-calendar-min.js"></script>
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>

<?php
include "../services/conexion.php";
include "../services/header.php";


//Pasamos el id del usuario desde el login
$id=$_SESSION['id'];
$cont_visitas=$_SESSION['cont_visitas'];

//consulta para saber los datos del usuario logeado y el tipo
$consulta="SELECT * FROM tbl_usuari INNER JOIN tbl_tipus_usuari ON tbl_usuari.id_tipus_usuari=tbl_tipus_usuari.id_tipus_usuari WHERE id_usuari='$id'";
      $exe=mysqli_query($conn,$consulta);
      $casos=mysqli_fetch_array($exe);
        $nom=$casos['nom_usuari'];
        $cognom=$casos['cognom_usuari'];  
        $tipus_user=$casos['id_tipus_usuari'];
        $nom_tipus=$casos['nom_tipus'];         

//Comprueba si es la primera vez que entra el usuario
if ($cont_visitas==1) {

//primera visita calendario
?>  

<div id="resultadologout" class="modalmask" style="display:none; margin-top: -34.5%; width: 16%; margin-left: 69%;">

      <div class="modalbox movedown" id="resultadoContentlogout">
        <a href="#" title="Tancar" class="close" id="closelogout" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadologout">TITULO</h2>
        <div id="contenidoResultadologout">contenido resultado</div>
      </div>
</div>

<div id="resultadocalen" class="modalmask" style="display:none; margin-top: -30%; width: 17%; margin-left: -6%;">

      <div class="modalbox movedown" id="resultadoContent4">
        <a href="#" title="Close" class="close" id="closecalen" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadocalen">TITULO</h2>
        <div id="contenidoResultadocalen">contenido resultado</div>
      </div>
</div>


<div id="resultadocalen2" class="modalmask" style="display:none; margin-top: 1.2%; width: 17%; margin-left: -8%;">

      <div class="modalbox movedown" id="resultadoContent4">
        <a href="#" title="Close" class="close" id="closecalen2" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadocalen2">TITULO</h2>
        <div id="contenidoResultadocalen2">contenido resultado</div>
      </div>
</div>
<?php
//comprueba si el usuario es admin
if ($tipus_user==1) {

echo "<body class='home' onload='modal(); modal2(); benvinguda(); tutorial_calendario2(); tutoriallogout();'>";

}else{

echo "<body class='home' onload='modal(); benvinguda2(); tutorial_calendario2(); tutoriallogout();'>";
}

//Modal de visita guiada
?>
<div id="resultado4" class="modalmask" style="display:none; margin-top: -5%; width: 30%; margin-left: 13%;">

      <div class="modalbox movedown" id="resultadoContent4">
        <a href="#" title="Close4" class="close" id="close4" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button onclick="admin_prof3();" class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado4">TITULO</h2>
        <div id="contenidoResultado4">contenido resultado</div>
      </div>
</div>

<?php

}else{

echo "<body class='home' onload='modal(); modal2();'>";

}
echo "<div class='header container-fluid'>";
echo "<div class='row'>";
echo "<div id='logout-header' class='col-sm-6 offset-6'>";
echo "<h3 class='txthead'>".$nom." ".$cognom."<a href='../services/logout.php' style='text-decoration:none;'><img src='../images/icon-logout.svg' style='margin-left:2%; margin-top:-1%;'></a></h3>";
echo "</div>";
echo "<div class='col-sm-12 text-center'>";
echo "<h1 class='txthead'>".$nom_tipus."</h1>";
echo "</div>";
echo "</div>";
echo "</div>";
//logout


?>
</div>
<input type="hidden" name="botonvisible" id="botonvisible" value="0">
<!-- <div id="cambiocalendar"><div onclick="cambiarboton(); tutorial_calendario();"
class="button-calendar" style="position:absolute;"></div></div> -->

<!-- The Modal -->
<div id="modalCalendar-mobile" class="modalCalendar-mobile container-fluid h-100" style="margin: 0;">
  <div class="modal-content-calendar row">
    <div class="notificaciones col-sm-12" > <h2 class="txtnotificaciones">NOTIFICACIONS SORTIDES</p></div>
    
    <div id="myCalendar" class="vanilla-calendar col-sm-12" style="width:98%; margin-top:70%; margin-left:0px">
</div>
      <div id="resultadosalida" class="col-sm-12 table-responsive">
  <table id="tabla_calendario" class="table table-hover text-center" style="display: none">
  <thead>
    <tr>
    <th scope="col" width="30%">Nom Sortida</th>
      <th scope="col" width="17.5%">Clase Assisteix</th>
      <th scope="col" width="17.5%">Professor Asignat</th>
      <th scope="col" width="17.5%">Número Alumnes</th>
      <th scope="col" width="17.5%">Inici sortida</th>
    </tr>
  </thead>
  <tbody id="tbodys">
  </tbody>
</table>
  </div>
    </div>
  
</div>
</body>
<!-- Script del calendario -->
<script>
            let pastDates = true, availableDates = false, availableWeekDays = false

            let calendar = new VanillaCalendar({
                selector: "#myCalendar",
                onSelect: (data, elem) => {
                    console.log(data, elem)
                }
            })

            let btnPastDates = document.querySelector('[name=pastDates]')
            btnPastDates.addEventListener('click', () => {
                pastDates = !pastDates
                calendar.set({pastDates: pastDates})
                btnPastDates.innerText = `${(pastDates ? 'Disable' : 'Enable')} past dates`
            })

            let btnAvailableDates = document.querySelector('[name=availableDates]')
            btnAvailableDates.addEventListener('click', () => {
                availableDates = !availableDates
                btnAvailableDates.innerText = `${(availableDates ? 'Clear available dates' : 'Set available dates')}`
                if (!availableDates) {
                    calendar.set({availableDates: [], datesFilter: false})
                    return
                }
                let dates = () => {
                    let result = []
                    for (let i = 1; i < 15; ++i) {
                        if (i % 2) continue
                        let date = new Date(new Date().getTime() + (60 * 60 * 24 * 1000) * i)
                        result.push({date: `${String(date.getFullYear())}-${String(date.getMonth() + 1).padStart(2, 0)}-${String(date.getDate()).padStart(2, 0)}`})
                    }
                    return result
                }
                calendar.set({availableDates: dates(), availableWeekDays: [], datesFilter: true})
            })

            let btnAvailableWeekDays = document.querySelector('[name=availableWeekDays]')
            btnAvailableWeekDays.addEventListener('click', () => {
                availableWeekDays = !availableWeekDays
                btnAvailableWeekDays.innerText = `${(availableWeekDays ? 'Clear available weekdays' : 'Set available weekdays')}`
                if (!availableWeekDays) {
                    calendar.set({availableWeekDays: [], datesFilter: false})
                    return
                }
                let days = [{
                    day: 'Dilluns'
                }, {
                    day: 'Dimarts'
                }, {
                    day: 'Dimecres'
                }, {
                    day: 'Divendres'
                }]
                calendar.set({availableWeekDays: days, availableDates: [], datesFilter: true})
            })
</script>
</html>