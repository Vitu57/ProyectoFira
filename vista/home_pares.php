<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <script type="text/javascript" src="../js/ajax.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--Calendario-->
  <link href="https://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
  
  <link rel="stylesheet" href="calendar/css/vanilla-calendar-min.css">
  <script src="calendar/js/vanilla-calendar-min.js"></script>
  <script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
</head>

<?php
include "../services/conexion.php";
include "../services/header_pares.php";

//Pasamos el id del usuario desde el login
$id=$_SESSION['id_pares'];
$cognom=$_SESSION['cognom'];
$nom=$_SESSION['nombre'];

//tutorial
$_SESSION['pag']="home";

//mostrará el tutorial si es la primera visita
if ($_SESSION['cont_visitas']==1) {
  echo "<body class='home' onload='benvinguda_pares(); tutorial_calendario2(); tutoriallogout();'>";

include "../services/tutorial.proc.php";

}else{
  echo "<body class='home'>";
}

?>

<div class='header'>

<h1 style='text-align: left; float:left; width:45%;'></h1><h2 style='text-align: center; float:left; width:10%; color:#0062ae;'>Fills</h1>

<?php
echo "<h3 class='txthead'>".$nom." ".$cognom."<a href='../services/logout_pares.php' style='text-decoration:none;'><img src='../images/icon-logout.svg' style='margin-left:2%; margin-top:-1%;'></a></h3>";
?>
</div>

<input type="hidden" name="botonvisible" id="botonvisible" value="0">
<div id="cambiocalendar"><div onclick="cambiarboton(); tutorial_calendario();"
class="button-calendar" style="position:absolute;"></div></div>

<!-- The Modal -->
<div id="modalCalendar" class="modalCalendar">
  <div class="modal-content-calendar">
    <div class="notificaciones" > <h2 class="txtnotificaciones">NOTIFICACIONS SORTIDES</p></div>
    
      
      <div id="resultadosalida">
  <table id="tabla_calendario" class="table table-hover text-center" style="font-size:10px; display:none;">
  <thead>
    <tr>
      <th width="20%" scope="col">Nom Sortida</th>
      <th width="10%" scope="col">Clase Assisteix</th>
      <th width="15%" scope="col">Profesor Asignat</th>
      <th width="15%" scope="col">Número Alumnes</th>
      <th width="15%" scope="col">Inici sortida</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td id="codi_sortida_cal"></td>
      <td id="clase_cal"></td>
      <td id="Profe_asignat_cal"></td>
      <td id="num_alu_cal"></td>
      <td width="20%" id="inici_sortida_cal"></td>
    </tr>
  </tbody>
</table>
  </div>
<div id="myCalendar" class="vanilla-calendar" style="width:98%; margin-top:70%;">
</div>
    </div>
  
</div>

<div class="d-flex justify-content-center" style="margin-top: 51px;">
<?php

//consulta para saber los datos del usuario logeado y el tipo
$consulta="SELECT tbl_alumnes.nom_alumne, tbl_alumnes.cognom1_alumne, tbl_alumnes.cognom2_alumne, tbl_alumnes.id_alumne FROM tbl_alumnes INNER JOIN tbl_pares_alumnes ON tbl_alumnes.id_alumne=tbl_pares_alumnes.id_alumne INNER JOIN tbl_pares ON tbl_pares_alumnes.id_pares=tbl_pares.id_pares WHERE tbl_pares.id_pares='$id'";
      $exe=mysqli_query($conn,$consulta);
     while ($casos=mysqli_fetch_array($exe)){
        $nom_fill=$casos[0];
        $cognom_fill=$casos[1];  
        $cognom2_fill=$casos[2];  
        $id_fill=$casos[3];   


echo "<a href='../vista/sortides_pares.php?fill=".$id_fill."'>";
?>

<button  id='myBtn' class="myBtn_pares">
<i class="fas fa-user fa-2x ml-2" style="float:left; color:white;  margin-top:-33%;"></i><h4 class="text-white"><?php echo $nom_fill."<br> ".$cognom_fill." ".$cognom2_fill; ?></h4>
</button>
</a>


<?php
}
?>

 </div>

<div class="footer">
  <img src="../images/logo_fje.svg">
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
