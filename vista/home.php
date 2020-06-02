<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/primera_visita.js"></script>
    <script type="text/javascript" src="../js/piechart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
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

echo "<body class='home' onload='modal(); modal2(); modal3(); benvinguda(); tutorial_calendario2(); tutoriallogout();'>";

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

echo "<body class='home' onload='modal(); modal2(); modal3();'>";

}
echo "<div class='header'>";

echo "<h1 style='text-align: left; float:left; width:45%;'></h1><h2 style='text-align: center; float:left; width:10%; color:#0062ae;'>".$nom_tipus."</h1>";
echo "<h3 class='txthead'>".$nom." ".$cognom."<a href='../services/logout.php' style='text-decoration:none;'><img src='../images/icon-logout.svg' style='margin-left:2%; margin-top:-1%;'></a></h3>";

//logout


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
<div style="margin-top:100%; max-width:75%;" class="text-center">
  <h5 class="text-center">Estadística Sortides per clase</h5>
  <canvas id="myChart" width="90" height="75"></canvas>
  </div>
    </div>
  
</div>




<div class="d-flex justify-content-center" style="margin-top: 51px;">
      
   


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="background-color:#ff8433!important;">
    <span id="close" class="close far fa-times-circle fa-2x text-white" style="z-index:1;"></span><h3 class="text-center text-white" style="margin-top:-3.7%;">Sortides</h3>
    
    <div class="separator" style="background-color:white;">
    </div>
  





<?php

//ifs que según el tipo de usuario mostrará una tabla u otra
if ($tipus_user==1) {

?>

<div class="margen_botones_modal">
<a class="none" href="../vista/verexcursionesadmin.php"><button id="myBtnModal" ><i class="fas fa-search fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Veure sortides</h4></button></a>

<a class="none" href="../vista/form_excursiones.php"><button id="myBtnModal" ><i class="fas fa-plus-circle fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Afegir Sortida</h4></button></a>
</div>


</div>

</div>

<div onclick="admin1();">

<button  id='myBtn' class="myBtn">
<i class="fas fa-hiking fa-2x ml-2" style="float:left; color:white;"></i><h2 class="text-white">Sortides</h2>

</button>
</div>



      

<!-- The Modal -->
<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style=" background-color:#ff7a32!important;">
    <span id="close2" class="close far fa-times-circle fa-2x text-white"></span><h3 class="text-center text-white" style="margin-top:-3.7%;">Usuaris</h3>
    <div class="separator" style="background-color:white;"></div>
<div class="margen_botones_modal">
    <a class="none" href="../vista/usuarios.php"><button id="myBtnModal" ><i class="far fa-eye fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Veure usuaris</h4></button></a>

    <a class="none" href="../vista/admin_prof.php"><button id="myBtnModal" ><i class="fas fa-user-cog fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Administració profesors</h3></button></a>
</div>
</div>

</div>
<!-- The Modal -->
<div id="myModal3" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="background-color:#ff7033!important;">
    <span id="close3" class="close far fa-times-circle fa-2x text-white"></span><h3 class="text-center text-white" style="margin-top:-3.7%;">Usuaris</h3>
    <div class="separator" style="background-color:white;"></div>
<div class="margen_botones_modal">
   

    <a class="none" href="../vista/editar_alumno.php"><button id="myBtnModal" ><i class="fas fa-user-cog fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Editar Alumne</h3></button></a>
      <a class="none" href="../vista/eliminar_alumno.php"><button id="myBtnModal" ><i class="fas fa-user-cog fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Eliminar Alumne</h3></button></a>
</div>
</div>

</div>
<div onclick="admin2();">
<button id="myBtn2" class="myBtn" style="margin-left:1%;">
<i class="fas fa-users fa-2x ml-2" style="float:left; color:white;"></i><h2 class="text-white">Usuaris</h2>
</button>
</div>
<div onclick="admin3();">
<button id="myBtn3" class="myBtn" style="margin-left:2%;">
<i class="fas fa-users fa-2x ml-2" style="float:left; color:white;"></i><h2 class="text-white">Alumnes</h2>
</button>
</div>




<?php
}else if($tipus_user==2){
  function isMobile() {
      return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    if (isMobile()) {
      header("location:excursiones_profes.php");
    }
?>
<div class="margen_botones_modal">
<a class="none" href="../vista/excursiones_profes.php"><button id="myBtnModal" ><i class="fas fa-search fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Veure sortides</h4></button></a>

<a class="none" href="../vista/form_excursiones_profes.php" ><button id="myBtnModal" ><i class="fas fa-plus-circle fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Afegir Sortida</h4></button></a>
</div>



</div>
</div>
<?php
if ($cont_visitas==1) {
echo "<div onclick='profesores()''>";
}
?>
      <button id="myBtn" class="myBtn">
      <i class="fas fa-hiking fa-2x ml-2" style="float:left; color:white;"></i><h2 class="text-white">Sortides</h2>
     </button>








<?php
}else if($tipus_user==3){       
    ?>
    <div class="margen_botones_modal">
<a class="none" href="../vista/sortides_secretaria.php"><button id="myBtnModal" ><i class="fas fa-search fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Veure sortides</h4></button></a>
</div>
</div>
</div>
<?php
if ($cont_visitas==1) {
echo "<div onclick='secretaria()''>";
}
?>
<button id="myBtn" class="myBtn">
<i class="fas fa-hiking fa-2x ml-2" style="float:left; color:white;"></i><h2 class="text-white">Sortides</h2>
  </button>






<?php
}else if($tipus_user==4){
?>
<div class="margen_botones_modal">
<a class="none" href="../vista/excursiones_cocina.php"><button id="myBtnModal" ><i class="fas fa-search fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Veure sortides</h4></button></a>
</div>
</div>
</div>
<?php
if ($cont_visitas==1) {
echo "<div onclick='cocina()''>";
}
?>
<button id="myBtn" class="myBtn">
<i class="fas fa-hiking fa-2x ml-2" style="float:left; color:white;"></i><h2 class="text-white">Sortides</h2>
  </button>






<?php
}else if($tipus_user==5 || $tipus_user==6){
?>
<div class="margen_botones_modal">
<a class="none" href="../vista/excursiones_enf_dir.php"><button id="myBtnModal" ><i class="fas fa-search fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Veure sortides</h4></button></a>
</div>
</div>
</div>


<?php
//Comprueba si es la primera vez que entra el usuario
if ($cont_visitas==1) {
echo "<div onclick='enf_dir()''>";
}
?>
<button id="myBtn" class="myBtn">
<i class="fas fa-hiking fa-2x ml-2" style="float:left; color:white;"></i><h2 class="text-white">Sortides</h2>
  </button>






<?php
}else if($tipus_user==7){
?>
<div class="margen_botones_modal">
<a class="none" href="../vista/excursiones_alu.php"><button id="myBtnModal" ><i class="fas fa-search fa-1x ml-1" style="float:left; margin-top:4%; color:white;"></i><h4 class="text-white">Veure sortides</h4></button></a>
</div>
</div>
</div>
<button id="myBtn" class="myBtn">
<i class="fas fa-hiking fa-2x ml-2" style="float:left; color:white;"></i><h2 class="text-white">Sortides</h2>
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