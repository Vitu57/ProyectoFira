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
</head>
<body class="home" onload="modal(); modal2();">
  

<?php
include "../services/conexion.php";
include "../services/header.php";

//Pasamos el id del usuario desde el login
$id=$_SESSION['id'];

//consulta para saber los datos del usuario logeado y el tipo
$consulta="SELECT * FROM tbl_usuari INNER JOIN tbl_tipus_usuari ON tbl_usuari.id_tipus_usuari=tbl_tipus_usuari.id_tipus_usuari WHERE id_usuari='$id'";
      $exe=mysqli_query($conn,$consulta);
      $casos=mysqli_fetch_array($exe);
        $nom=$casos['nom_usuari'];
        $cognom=$casos['cognom_usuari'];  
        $tipus_user=$casos['id_tipus_usuari'];
        $nom_tipus=$casos['nom_tipus']; 
echo "<div class='header'>";
echo "<h3 class='txthead'><a href='../services/logout.php'>Tanca la sessió</a></h3>";

//logout
echo "<h3 class='txthead2'>Benvingut ".$nom." ".$cognom."</h3>";

echo "<h1 style='text-align: center;'>".$nom_tipus."</h1>";
?>
</div>
<!-- Trigger/Open The Modal -->
<div class="divcalendario">
  <div id="resultadosalida">
  <table id="tabla_calendario" class="table table-hover text-center" style="font-size:10px; display:none;">
  <thead>
    <tr>
      <th width="20%" scope="col">Codi de sortida</th>
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



<div class="d-flex justify-content-center" style="margin-top: 51px;">
      
   


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span id="close" class="close">&times;</span>
    <div class="separator"></div>
  






<?php

//ifs que según el tipo de usuario mostrará una tabla u otra
if ($tipus_user==1) {
    
?>

<div>
<a class="none" href="../vista/verexcursionesadmin.php"><button id="myBtnModal" class="myBtn"><h4>Veure sortides</h4></button></a>
</div>
<div>
<a class="none" href="../vista/form_excursiones.php"><button id="myBtnModal" class="myBtn"><h4>Afegir Sortida</h4></button></a>
</div>


</div>

</div>
<button id='myBtn' class="myBtn">
   <h2>Sortides</h2>

</button>




      

<!-- The Modal -->
<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span id="close2" class="close">&times;</span>
    <div class="separator"></div>

    <a class="none" href="../vista/usuarios.php"><button id="myBtnModal" class="myBtn"><h4>Veure usuaris</h4></button></a>

</div>
</div>
<button id="myBtn2" class="myBtn" style="margin-left:1%;">
      <h2>Usuaris</h2>
</button>








<?php
}else if($tipus_user==2){
?>

<a class="none" href="../vista/excursiones_profes.php"><button id="myBtnModal" class="myBtn"><h4>Veure Sortides</h4></button></a>

</div>
</div>
      <button id="myBtn" class="myBtn">
       <h3>Sortides</h3>
     </button>







<?php
}else if($tipus_user==3){       
    ?>
<a class="none" href="../vista/sortides_secretaria.php"><button id="myBtnModal" class="myBtn"><h4>Veure Sortides</h4></button></a>

</div>
</div>
<button id="myBtn" class="myBtn">
    <h3>Sortides</h3>
  </button>






<?php
}else if($tipus_user==4){
?>
<a class="none" href="../vista/excursiones_cocina.php"><button id="myBtnModal" class="myBtn"><h4>Veure Sortides</h4></button></a>

</div>
</div>
<button id="myBtn" class="myBtn">
    <h3>Sortides</h3>
  </button>






<?php
}else if($tipus_user==5 || $tipus_user==6){
?>
<a class="none" href="../vista/excursiones_enf_dir.php"><button id="myBtnModal" class="myBtn"><h4>Veure Sortides</h4></button></a>

</div>
</div>
<button id="myBtn" class="myBtn">
    <h3>Sortides</h3>
  </button>






<?php
}else if($tipus_user==7){
?>
<a class="none" href="../vista/excursiones_alu.php"><button id="myBtnModal" class="myBtn"><h4>Veure Sortides</h4></button></a>

</div>
</div>
<button id="myBtn" class="myBtn">
    <h3>Sortides</h3>
  </button>
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
