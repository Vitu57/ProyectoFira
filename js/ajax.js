
function event_listener(){
    var alumneid = document.getElementById("nombrealumno");
    alumneid.addEventListener("change", rellenar_datos);
}
function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function rellenar_datos(){
    id_alumno = document.getElementById("nombrealumno").value;

    var ajax3 = objetoAjax();
    var option;
    ajax3.open("POST", "../services/consulta_editar_alumnos.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=ver_datos_alumno&id_alumno="+id_alumno);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            //console.log(ajax3.responseText); 
            var respuesta = JSON.parse(ajax3.responseText);
            for (var i = 0; i < respuesta.length; i++) {
                apellidos=respuesta[i].cognom1_alumne+" "+respuesta[i].cognom2_alumne;
                document.getElementById("clases2").selectedIndex=respuesta[i].id_clase;
                document.getElementById("nombreusu").value=respuesta[i].nom_alumne;
                document.getElementById("apellidosusu").value=apellidos;
                //option += '<option value="' + respuesta[i].id_tipus_usuari + '">' + respuesta[i].nom_tipus + '</option>';
            }
           // tipus.innerHTML = option;
            
        }
    }
}


function modal(){

    // Get the modal
var modal = document.getElementById("myModal");
var modal2 = document.getElementById("myModal2");
var modal3 = document.getElementById("myModal3");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  modal2.style.display = "none";
  modal3.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
}

function modal2(){


// Get the modal
var modal2 = document.getElementById("myModal");
var modal = document.getElementById("myModal2");
var modal3 = document.getElementById("myModal3");

// Get the button that opens the modal
var btn = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementById("close2");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  modal2.style.display = "none";
  modal3.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
}

function modal3(){


// Get the modal
var modal2 = document.getElementById("myModal");
var modal = document.getElementById("myModal2");
var modal3 = document.getElementById("myModal3");

// Get the button that opens the modal
var btn = document.getElementById("myBtn3");

// Get the <span> element that closes the modal
var span = document.getElementById("close3");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal3.style.display = "block";
  modal.style.display = "none";
  modal2.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal3.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal3.style.display = "none";
  }
}
}
function abrirform(){
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    
      modal.style.display = "block";
    

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
}

//COCINA------------------------------------------------------------------------------------------------------
//Esta funcion Crea la Tabla de visualizaci�n de excursiones de COCINA
function CrearTabla(){
    //Fecha de hoy
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); 
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    //---------------------
    divResultado = document.getElementById('resultado');
    var estado_filtro = document.getElementById("btn_filtro").value;
    var ajax2=objetoAjax();
    ajax2.open("GET", "../services/consulta_cocina.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send(null);
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
    var respuesta=JSON.parse(this.responseText);
    var tabla='<table id="cocinas" class="table table-bordered" style="background-color: rgba(255,255,255,1);"><thead>';
        tabla +='<thead class="thead-dark"><tr><th>Codi</th><th>Nom Sortida</th><th>Inici Sortida</th><th>Final Sortida</th><th>Clase</th><th>Etapa</th><th>Acompanyants</th><th>Alumnes</th><th>Profesor asignat</th><th>Estat Comanda</th></thead>';
        for(var i=0;i<respuesta.length;i++) {
             var fecha_inici = respuesta[i].inici_sortida.split('-').reverse().join('/');
             var final_inici = respuesta[i].final_sortida.split('-').reverse().join('/');
            if(estado_filtro==1){
                if(respuesta[i].inici_sortida==today){
                    tabla += '<tr>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
					tabla += '<td>' + respuesta[i].nom_activitat+ '</td>';
                    tabla += '<td>' + fecha_inici + '</td>';
                    tabla += '<td>' + fecha_final + '</td>';
                    tabla += '<td>' + respuesta[i].nom_classe+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_etapa+ '</td>';
                    tabla += '<td>' + respuesta[i].n_acompanyants+ '</td>';
                    tabla += '<td>' + respuesta[i].numero_alumnes+ '</td>';
                    tabla += '<td>' + respuesta[i].profesor_asignat+ '</td>';
                    if(respuesta[i].comanda_menu==0){
                        tabla += '<td>' + '<a href="#" title="Fet" style="display:inline;"><img src="../images/check_cuina.png" width="25" onclick="CheckComanda('+respuesta[i].id_sortida+","+respuesta[i].comanda_menu+'); return false;" style="opacity:0.2" height="32"></a></td>';
                    }else{
                        tabla += '<td>' + '<a href="#" title="Fet" style="display:inline;"><img src="../images/check_cuina.png" width="25" onclick="CheckComanda('+respuesta[i].id_sortida+","+respuesta[i].comanda_menu+'); return false;" height="32"></a></td>';
                    }
                    tabla += '</tr>';
                }
            }else{
                if(respuesta[i].inici_sortida>=today){
                    tabla += '<tr>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
					tabla += '<td>' + respuesta[i].nom_activitat+ '</td>';
                    tabla += '<td>' + fecha_inici + '</td>';
                    tabla += '<td>' + fecha_inici + '</td>';
                    tabla += '<td>' + respuesta[i].nom_classe+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_etapa+ '</td>';
                    tabla += '<td>' + respuesta[i].n_acompanyants+ '</td>';
                    tabla += '<td>' + respuesta[i].numero_alumnes+ '</td>';
                    tabla += '<td>' + respuesta[i].profesor_asignat+ '</td>';
                    if(respuesta[i].comanda_menu==0){
                        tabla += '<td>' + '<a href="#" title="Fet" style="display:inline;"><img src="../images/check_cuina.png" width="25" onclick="CheckComanda('+respuesta[i].id_sortida+","+respuesta[i].comanda_menu+'); return false;" style="opacity:0.2" height="32"></a></td>';
                    }else{
                        tabla += '<td>' + '<a href="#" title="Fet" style="display:inline;"><img src="../images/check_cuina.png" width="25" onclick="CheckComanda('+respuesta[i].id_sortida+","+respuesta[i].comanda_menu+'); return false;" height="32"></a></td>';
                    }
                    tabla += '</tr>';
                }
            }
        }
            tabla+='</thead></table>';
            divResultado.innerHTML=tabla;
            new Tablesort(document.getElementById('cocinas'));
    }
    }
}

//Funcion de check de menu hecho COCINA
function CheckComanda(id_comanda, estado){
    var ajax2=objetoAjax();
    ajax2.open("POST", "../services/comanda_cocina.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send("id="+id_comanda+"&estado="+estado);
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
            CrearTabla();
        }
    }
}

function FiltroCocina(){
    var estado_filtro = document.getElementById("btn_filtro").value;
    if (estado_filtro==0){
        document.getElementById("btn_filtro").style.backgroundColor="green";
        document.getElementById("btn_filtro").value=1;
        
    }else{
        document.getElementById("btn_filtro").style.backgroundColor="#367cb3";
        document.getElementById("btn_filtro").value=0;
        
    }
    CrearTabla();
}

//Primera visita cocina
function FiltroCocinaPrimeraVisita(){
    var estado_filtro = document.getElementById("btn_filtro").value;
    if (estado_filtro==0){
        document.getElementById("btn_filtro").style.backgroundColor="green";
        document.getElementById("btn_filtro").value=1;
        cocina_vis4();
    }else{
        document.getElementById("btn_filtro").style.backgroundColor="#367cb3";
        document.getElementById("btn_filtro").value=0;
        cocina_vis2();
    }
    CrearTabla();
}


function cocina_vis2(){

    var modal = document.getElementById("resultado3");
     modal.style.display = "block";
     var span = document.getElementById("close3");
  document.getElementById("tituloResultado3").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal3").value=0;
    }
                  
                   var mensaje = "Fes click a sortides d'avui per veure <i style='margin-left:3%;' class='fas fa-arrow-right'></i> <br> les sortides que es farán al dia d'avui.";  
                
            document.getElementById("contenidoResultado3").innerHTML=mensaje;

}

function cocina_vis4(){

    var modal = document.getElementById("resultado3");
     modal.style.display = "block";
     var span = document.getElementById("close3");
  document.getElementById("tituloResultado3").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal3").value=0;
    }
                  
    var mensaje = "Fes click una altra vegada per <i style='margin-left:3%;' class='fas fa-arrow-right'></i> <br> veure totes les sortides.";  
                
            document.getElementById("contenidoResultado3").innerHTML=mensaje;

}




//----------------------------------------------------------------------------------------------------------------------------------

function CrearTablaProfes(filtro){

    var profe = document.getElementById("profe").value;
    var clase = document.getElementById("clase").value;
    var fecha = document.getElementById("fecha").value;
    var jornada = document.getElementById("jornada").value;
    var etapa = document.getElementById("etapa").value;
    var codi = document.getElementById("codi").value;
	var nom = document.getElementById("nom").value;
	var cognom = document.getElementById("cognom").value;
    //Fecha de hoy
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); 
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    //---------------------
    divResultado = document.getElementById('resultado');
    var estado_filtro = document.getElementById("btn_filtro").value;
    

    if (filtro==1) {
        var ajax2=objetoAjax();
    ajax2.open("GET", "../services/consulta_profes.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send(null);
	document.getElementById("profe").value="";
    document.getElementById("clase").value="";
    document.getElementById("fecha").value="";
    document.getElementById("jornada").value="";
    document.getElementById("etapa").value="";
    document.getElementById("codi").value="";
}else{
    var ajax2=objetoAjax();
    ajax2.open("POST", "../services/consulta_profes.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send("profe="+profe+"&clase="+clase+"&fecha="+fecha+"&jornada="+jornada+"&etapa="+etapa+"&codi="+codi);
}
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
        
    var respuesta=JSON.parse(this.responseText);

    var tabla='<table id="table-id" class="table table-bordered" style="background-color: rgba(255,255,255,1);"> <thread>';
        tabla +='<thead class="thead-dark"><tr><th data-sort-method="none">Opcions</th><th data-sort-method="none">Llista</th><th>Sortida</th><th>Codi</th><th>Inici Sortida</th><th>Final Sortida</th><th>Clase</th><th>Etapa</th><th>Professor asignat</th><th>Acompanyants</th><th>Vetlladors</th><th>Alumnes</th><th data-sort-method="none">Transport</th><th data-sort-method="none">Activitat</th><th data-sort-method="none">Contacte</th></thead>';
        for(var i=0;i<respuesta.length;i++) {
            
             //Cambiar formato fecha 
             var fecha_inici = respuesta[i].inici_sortida.split('-').reverse().join('/');
             var fecha_final = respuesta[i].final_sortida.split('-').reverse().join('/');
            
            if(estado_filtro==1){
                if(respuesta[i].inici_sortida==today){
                    tabla += '<tr>';
                    tabla +='<td><a title="Modificar sortida" href="form_update_excursiones.php?id_excursion='+respuesta[i].id_sortida+'"><i class="fas fa-pencil-alt fa-2x" id="modificar" style="color:#3F7FBF;"></i></a><br><a href="galeria_fotos.php?id_sortida='+respuesta[i].id_sortida+'" title="Afegir Fotos"><i style="color:#3F7FBF;" class="far fa-image fa-2x"></i></a><a title="Valoració" href="#" onclick="abrirform4('+respuesta[i].id_sortida+', \''+respuesta[i].observacions_sortida+'\', \'' + nom + '\', \'' + cognom + '\')"><i class="fas fa-star fa-2x" id="modificar" style="color:#FF8C00;"></i></a></td>';
                    tabla +='<td><a href="pasarlista.php?id_actividad='+respuesta[i].id_activitat+'&clase='+respuesta[i].nom_classe+'"><i class="fas fa-list" id="pasarlista" style="color:#3F7FBF;"></i></a></td>';
                    tabla += '<td >' + respuesta[i].nom_activitat+ '</td>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
                    tabla += '<td>' + fecha_inici+ '</td>';
                    tabla += '<td>' + fecha_final+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_classe+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_etapa+ '</td>';
                    tabla += '<td>' + respuesta[i].profesor_asignat+'</td>';
                    tabla += '<td>' + respuesta[i].n_acompanyants+ '</td>';
                    tabla += '<td>' + respuesta[i].n_vetlladors+ '</td>';
                     tabla += '<td>' + respuesta[i].numero_alumnes+ '</td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes_transport('+respuesta[i].id_transport+')"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;"></i></button></td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes('+respuesta[i].id_activitat+')"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;"></i></button></td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes_contacte('+respuesta[i].id_contacte_activitat+')"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;"></i></button></td>';
                   
                    tabla += '</tr>';
                    
                    
                }
            }else{
                if(respuesta[i].inici_sortida>=today){
                    tabla += '<tr>';
                    tabla +='<td><a title="Modificar sortida" href="form_update_excursiones.php?id_excursion='+respuesta[i].id_sortida+'"><i class="fas fa-pencil-alt fa-2x" id="modificar" style="color:#3F7FBF;"></i></a><br><a href="galeria_fotos.php?id_sortida='+respuesta[i].id_sortida+'" title="Afegir Fotos"><i style="color:#3F7FBF;" class="far fa-image fa-2x"></i></a><a title="Valoració" href="#" onclick="abrirform4('+respuesta[i].id_sortida+', \''+respuesta[i].observacions_sortida+'\', \'' + nom + '\', \'' + cognom + '\')"><i class="fas fa-star fa-2x" id="modificar" style="color:#FF8C00;"></i></a></td>';
                    tabla +='<td><a href="pasarlista.php?id_actividad='+respuesta[i].id_activitat+'&clase='+respuesta[i].nom_classe+'"><i class="fas fa-list" id="pasarlista" style="color:#3F7FBF;"></i></a></td>';
                    tabla += '<td>' + respuesta[i].nom_activitat+ '</td>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
                    tabla += '<td>' + fecha_inici+ '</td>';
                    tabla += '<td>' + fecha_final+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_classe+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_etapa+ '</td>';
                    tabla += '<td>' + respuesta[i].profesor_asignat+'</td>';
                    tabla += '<td>' + respuesta[i].n_acompanyants+ '</td>';
                    tabla += '<td>' + respuesta[i].n_vetlladors+ '</td>';
                    tabla += '<td>' + respuesta[i].numero_alumnes+ '</td>';    
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes_transport('+respuesta[i].id_transport+')"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;"></i></button></td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes('+respuesta[i].id_activitat+')"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;"></i></button></td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes_contacte('+respuesta[i].id_contacte_activitat+')"><i class="fas fa-plus-circle fa-2x" style="color:#367cb3;"></i></button></td>';
                    tabla += '</tr>';
                    
                }
            }
        }
            tabla+='</thead></table>';
            divResultado.innerHTML=tabla;
            new Tablesort(document.getElementById('table-id'));

            

    }
    }
}
function CrearTablaProfes_movil(filtro){

    var profe = "";
    var clase = document.getElementById("clase").value;
    var fecha = "";
    var jornada = "";
    var etapa = "";
    var codi = document.getElementById("codi").value;
    //Fecha de hoy
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); 
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    //---------------------
    divResultado = document.getElementById('resultado');
    var estado_filtro = document.getElementById("btn_filtro").value;
    

    if (filtro==1) {
        var ajax2=objetoAjax();
    ajax2.open("GET", "../services/consulta_profes.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send(null);

}else{
    var ajax2=objetoAjax();
    ajax2.open("POST", "../services/consulta_profes.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send("profe="+profe+"&clase="+clase+"&fecha="+fecha+"&jornada="+jornada+"&etapa="+etapa+"&codi="+codi);
}
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
        
    var respuesta=JSON.parse(this.responseText);

    var tabla='<table id="table-id" class="table table-bordered" style="background-color: rgba(255,255,255,1);"> <thread class="thead-dark">';
        tabla +='<tr><th><h1>Codi</h1></th><th><h1>Sortida</h1></th><th><h1>Clase</h1></th><th><h1>Llista</h1></th>';
        for(var i=0;i<respuesta.length;i++) {
            if(estado_filtro==1){
                if(respuesta[i].inici_sortida==today){
                    tabla += '<tr>';
                    tabla += '<td><h2>' + respuesta[i].codi_sortida+ '</h2></td>';
                    tabla += '<td><h2>' + respuesta[i].nom_activitat+ '</h2></td>';
                    tabla += '<td><h2>' + respuesta[i].nom_classe+ '</h2></td>';
                    tabla +='<td><a href="pasarlista.php?id_actividad='+respuesta[i].id_activitat+'&clase='+respuesta[i].nom_classe+'"><i class="fas fa-list fa-3x" id="pasarlista" style="color:#3F7FBF;"></i></a></td>';
                    tabla += '</tr>';
                }
            }else{
                if(respuesta[i].inici_sortida>=today){
                    tabla += '<tr>';
                    tabla += '<td><h2>' + respuesta[i].codi_sortida+ '</h2></td>';
                    tabla += '<td><h2>' + respuesta[i].nom_activitat+ '</h2></td>';
                    tabla += '<td><h2>' + respuesta[i].nom_classe+ '</h2></td>';
                    tabla +='<td><a href="pasarlista.php?id_actividad='+respuesta[i].id_activitat+'&clase='+respuesta[i].nom_classe+'"><i class="fas fa-list fa-3x" id="pasarlista" style="color:#3F7FBF;"></i></a></td>';
                    tabla += '</tr>';
                }
            }
        }
            tabla+='</thead></table>';
            divResultado.innerHTML=tabla;
    }
    }
}
function FiltroProfes(visita){
    var estado_filtro = document.getElementById("btn_filtro").value;

    if (visita==0) {

  var modal = document.getElementById("resultadotut2");
    if (estado_filtro==0){
        document.getElementById("btn_filtro").style.backgroundColor="green";
        document.getElementById("btn_filtro").value=1;
          modal.style.display = "none";

    }else{
        document.getElementById("btn_filtro").style.backgroundColor="#367cb3";
        document.getElementById("btn_filtro").value=0;
    }
    CrearTablaProfes();
    }else{
    if (estado_filtro==0){
        document.getElementById("btn_filtro").style.backgroundColor="green";
        document.getElementById("btn_filtro").value=1;

    }else{
        document.getElementById("btn_filtro").style.backgroundColor="#367cb3";
        document.getElementById("btn_filtro").value=0;
    }
    CrearTablaProfes();
}
}

function modal_profes(actividad){

    var modal = document.getElementById("resultado2");
  
     modal.style.display = "block";
     

     var span = document.getElementById("close");
    

  document.getElementById("tituloResultado").innerHTML="";


  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
}
    
    var ajax2=objetoAjax();
    ajax2.open("POST", "../services/consulta_actividad.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send("actividad="+actividad);
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
    var respuesta=JSON.parse(this.responseText);
    var tabla='<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead class="thead-dark">';
        tabla +='<tr><th>Activitat</th><th>Lloc</th><th>Tipus</th><th>Ambit</th><th>Jornada</th><th>Objectiu</th>';
        
            tabla += '<tr>';
                    
                    tabla += '<td>' + respuesta[0].nom_activitat+ '</td>';
                    tabla += '<td>' + respuesta[0].lloc_activitat+ '</td>';
                    tabla += '<td>' + respuesta[0].tipus_activitat+ '</td>';
                    tabla += '<td>' + respuesta[0].ambit_activitat+ '</td>';
                    tabla += '<td>' + respuesta[0].jornada_activitat+ '</td>';
                    tabla += '<td>' + respuesta[0].objectiu_activitat+ '</td>';
                    
                    tabla += '</tr>';
        
        tabla+='</thead></table>';
            document.getElementById("contenidoResultado").innerHTML=tabla;
            document.getElementById("tituloResultado").innerHTML="Activitat";
    }
}
}

function modal_profes_transport(transport){

    var modal = document.getElementById("resultado2");
  
     modal.style.display = "block";
     

     var span = document.getElementById("close");
    

  document.getElementById("tituloResultado").innerHTML="";


  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
}
    
    var ajax2=objetoAjax();
    ajax2.open("POST", "../services/consulta_transport.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send("transport="+transport);
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
    var respuesta=JSON.parse(this.responseText);
    var tabla='<table id="transports" class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead class="thead-dark">';
        tabla +='<tr><th>Transport</th><th>Sortida</th><th>Arribada</th><th>Comentari</th>';
        
            tabla += '<tr>';
                    
                    tabla += '<td>' + respuesta[0].nom_transport+ '</td>';
                    tabla += '<td>' + respuesta[0].hora_sortida+ '</td>';
                    tabla += '<td>' + respuesta[0].hora_arribada+ '</td>';
                    tabla += '<td>' + respuesta[0].comentaris_transport+ '</td>';
                    
                    
                    tabla += '</tr>';
        
        tabla+='</thead></table>';
            document.getElementById("contenidoResultado").innerHTML=tabla;
            document.getElementById("tituloResultado").innerHTML="Transport";
            new Tablesort(document.getElementById('transports'));
    }
}
}
function modal_profes_contacte(contacte){

    var modal = document.getElementById("resultado2");
  
     modal.style.display = "block";
     

     var span = document.getElementById("close");
    

  document.getElementById("tituloResultado").innerHTML="";


  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
}
    
    var ajax2=objetoAjax();
    ajax2.open("POST", "../services/consulta_contacte.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send("contacte="+contacte);
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
    var respuesta=JSON.parse(this.responseText);
    var tabla='<table id="contactes" class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead class="thead-dark">';
        tabla +='<tr><th>Persona</th><th>Email</th><th>Telefon</th><th>Web contacte</th>';
        
            tabla += '<tr>';
                    
                    tabla += '<td>' + respuesta[0].persona_contacte+ '</td>';
                    tabla += '<td>' + respuesta[0].email_contacte+ '</td>';
                    tabla += '<td>' + respuesta[0].telefon_contacte+ '</td>';
                    tabla += '<td>' + respuesta[0].web_contacte+ '</td>';
                    
                    
                    tabla += '</tr>';
        
        tabla+='</thead></table>';
            document.getElementById("contenidoResultado").innerHTML=tabla;
            document.getElementById("tituloResultado").innerHTML="Contacte";
            new Tablesort(document.getElementById('contactes'));
    }
}
}

function modal_secretaria(persona, web, telf, email){

    var modal = document.getElementById("resultado2");
  
     modal.style.display = "block";
     
     var span = document.getElementById("close");
    

  document.getElementById("tituloResultado").innerHTML="";


  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
}
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead class="thead-dark"><tr>';
                    tabla += '<th>Persona de contacte</th>';
                    tabla += '<th>Web de contacte</th>';
                    tabla += '<th>Telefon de contacte</th>';
                    tabla += '<th>Email de contacte</th></tr>';
                    tabla += '<td>' + persona + '</td>';  
                    tabla += '<td>' + web +'</td>';
                    tabla += '<td>' + telf + '</td>';
                    tabla += '<td>' + email + '</td></tr><thread></table>';
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
             document.getElementById("tituloResultado").innerHTML="Contacte";
    }

function modal_secretaria2(nom, lloc, tipus, ambit, jornada, objectiu){

    var modal = document.getElementById("resultado2");
  
     modal.style.display = "block";
     
     var span = document.getElementById("close");
    

  document.getElementById("tituloResultado").innerHTML="";


  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
}
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead class="thead-dark"><tr>';
                    tabla += '<th>Activitat</th>';
                    tabla += '<th>Lloc</th>';
                    tabla += '<th>Jornada</th>';
                    tabla += '<th>Tipus</th>';
                    tabla += '<th>Ambit</th>';
                    tabla += '<th>Objectiu</th></tr>';
                    tabla += '<td>' + nom + '</td>';  
                    tabla += '<td>' + lloc +'</td>';
                    tabla += '<td>' + jornada + '</td>';
                    tabla += '<td>' + tipus + '</td>';
                    tabla += '<td>' + ambit + '</td>';
                    tabla += '<td>' + objectiu + '</td></tr><thread></table>';
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
             document.getElementById("tituloResultado").innerHTML="Activitat";
    }

function modal_secretaria3(nom, sortida, arribada, comentari){

    var modal = document.getElementById("resultado2");
  
     modal.style.display = "block";
     
     var span = document.getElementById("close");
    

  document.getElementById("tituloResultado").innerHTML="";


  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
}
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead class="thead-dark"><tr>';
                    tabla += '<th>Transport</th>';
                    tabla += '<th>Sortida</th>';
                    tabla += '<th>Arribada</th>';
                    tabla += '<th>Comentari</th></tr>';
                    tabla += '<td>' + nom + '</td>';  
                    tabla += '<td>' + sortida +'</td>';
                    tabla += '<td>' + arribada + '</td>';
                    tabla += '<td>' + comentari + '</td></tr><thread></table>';
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
             document.getElementById("tituloResultado").innerHTML="Transport";
    }

function modal_enf_dir(nom, profesor, transport, jornada){

    var modal = document.getElementById("resultado2");
  
     modal.style.display = "block";
     
     var span = document.getElementById("close");
    

  document.getElementById("tituloResultado").innerHTML="";


  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
}
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead class="thead-dark"><tr>';
                    tabla += '<th>Activitat</th>';
                    tabla += '<th>Jornada</th>';
                    tabla += '<th>Transport</th>';
                    tabla += '<th>Profesor</th></tr>';
                    tabla += '<td>' + nom + '</td>';  
                    tabla += '<td>' + jornada + '</td>';
                    tabla += '<td>' + transport + '</td>';
                    tabla += '<td>' + profesor + '</td></tr><thread></table>';
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
            document.getElementById("tituloResultado").innerHTML="Informació";

    }

//--------------------------------------------------------------------
//Funciones para modales de juanma
function abrirform1(persona, web, telf, email){
    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     modal.style.top = "70%";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead class="thead-dark"><tr>';
                    tabla += '<th>Persona de contacte</th>';
                    tabla += '<th>Web de contacte</th>';
                    tabla += '<th>Telefon de contacte</th>';
                    tabla += '<th>Email de contacte</th></tr>';
                    tabla += '<td>' + persona + '</td>';  
                    tabla += '<td>' + web + '</td>';
                    tabla += '<td>' + telf + '</td>';
                    tabla += '<td>' + email + '</td></tr><thread></table>';       
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
            document.getElementById("tituloResultado").innerHTML="Contacte";
}
function abrirform2(a,b,c,d,e,f,g,h,i,j,k,l,m){
    var modal = document.getElementById("resultado2");
    modal.style.top = "70%";
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead class="thead-dark"><tr>';
                    tabla += '<th style="padding-bottom:25px;">Substitució</th>';
                    tabla += '<th >Activitat individual</th>';
                    tabla += '<th >Extra activitat profe</th>';
                    tabla += '<th >Global activitat</th>';
                    tabla += '<th style="padding-bottom:25px;">Final</th>';
                    tabla += '<th style="padding-bottom:25px;">Fixe</th>';
                    tabla += '<th >Sense topal</th>';
                    tabla += '<th >Amb topal</th>';
                    tabla += '<th style="padding-bottom:25px;">Gestio</th>';
                    tabla += '<th style="padding-bottom:25px;">Overhead</th>';
                    tabla += '<th >Total a facturar</th>';
                    tabla += '<th >Pagament fraccionat</th>';
                    tabla += '<th style="padding-bottom:25px;">Observació</th></tr>';
                    tabla += '<td>' + a + '</td>';  
                    tabla += '<td>' + b + '</td>';
                    tabla += '<td>' + c + '</td>';
                    tabla += '<td>' + d + '</td>';
                    tabla += '<td>' + e + '</td>';
                    tabla += '<td>' + f + '</td>';
                    tabla += '<td>' + g + '</td>';
                    tabla += '<td>' + h + '</td>';
                    tabla += '<td>' + i + '</td>';
                    tabla += '<td>' + j + '</td>';
                    tabla += '<td>' + k + '</td>';
                    tabla += '<td>' + l + '</td>';
                    tabla += '<td>' + m + '</td></tr><thread></table>'; 
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
            document.getElementById("tituloResultado").innerHTML="Preus";
}
function abrirform3(a,b,c,d,e,f){
    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     modal.style.top = "70%";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                   tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead class="thead-dark"><tr>';
                    tabla += '<th>Nombre del transporte</th>';
                    tabla += '<th>Hora de salida</th>';
                    tabla += '<th>Hora de llegada</th>';
                    tabla += '<th>Coste del transporte</th>';
                    tabla += '<th>Codigo del contacto</th>';
                    tabla += '<th>Comentarios</th></tr>';
                    tabla += '<td>' + f + '</td>';  
                    tabla += '<td>' + a + '</td>';
                    tabla += '<td>' + b + '</td>';
                    tabla += '<td>' + c + '</td>';
                    tabla += '<td>' + d + '</td>';
                    tabla += '<td>' + e + '</td></tr><thread></table>'; 
                    
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
            document.getElementById("tituloResultado").innerHTML="Transport";
}

//Feedback
function abrirform4(a, b , nom, cognom){
    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     modal.style.top = "28%";
	 modal.style.height = "50%";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                   var contenido ='<h2>Valoració Sortida: '+b+'</h2><br><div id="tabla_feed" style="width:60%; float:right;"></div><div style="text-align:left; padding-bottom:1%;"><b style="visibility:hidden;">""""</b><b id="val2">Valora la Sortida:</b></div>';
                   contenido +='<div id="valora" class="rate"><input type="radio" id="star5" class="messageCheckbox" name="rate" value="5" />';
                   contenido +='<label for="star5" title="5">5 stars</label><input class="messageCheckbox" type="radio" id="star4" name="rate" value="4" />';
                   contenido +='<label for="star4" title="4">4 stars</label><input class="messageCheckbox" type="radio" id="star3" name="rate" value="3" />';
                   contenido +='<label for="star3" title="3">3 stars</label><input class="messageCheckbox" type="radio" id="star2" name="rate" value="2" />'
                   contenido +='<label for="star2" title="2">2 stars</label><input class="messageCheckbox" type="radio" id="star1" name="rate" value="1" />';
                   contenido +='<label for="star1" title="1">1 star</label></div><br><br>';
                   contenido +='<div id="comentarios" style="padding-top:2%; width:50%; text-align:left;" class="form-group purple-border"><b style="visibility:hidden;">""""</b><label for="exampleFormControlTextarea4"><b>Comentaris (Opcional):</b></label><textarea class="form-control" style="width:45%; margin:0.5% 2%;" id="coment_text" rows="3"></textarea>';
                   contenido +='<button class="btn btn-lg filtrado_admin" style="margin:2.5% 2%;" onclick="feedback('+a+',\''+nom+'\', \''+cognom+'\'); return false;">Enviar</button></div>'
                    
            document.getElementById("contenidoResultado").innerHTML=contenido;
            CrearTabla_Feedback(a);
}

function CrearTabla_Feedback(a){
    var ajax2=objetoAjax();
    ajax2.open('POST', '../services/tabla_feedback.php', true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send("id="+a);
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
    var respuesta=JSON.parse(this.responseText);
    var tabla='<b style="float: right; margin-right:74%;">Valoracions dels usuaris:</b><br><div style="text-align:center; margin-right:5%; margin-left:5%; margin-top:20px; width:92%; height:250px; max-height:100%; max-width:100%; overflow-x:auto; overflow-y:auto;"><table id="feedbacks" class="table table-bordered" style="background-color:white;">';
        tabla +='<thead style="color:#fff; background-color:#212529; border-color:32383e;"><tr><th>Usuari</th><th>Valoració</th><th>Data</th><th>Comentaris</th></tr></thead>';
        for(var i=0;i<respuesta.length;i++) {
            tabla += '<tr><td>'+respuesta[i].usuario+'</td>';
            if(respuesta[i].estrellas=="1"){
                tabla +='<td><img src="../images/star-solid.png" height="11" width="11"></td>';
            }else if(respuesta[i].estrellas=="2"){
                tabla +='<td><img src="../images/star-solid.png" height="11" width="11"><img src="../images/star-solid.png" height="11" width="11"></td>';
            }else if(respuesta[i].estrellas=="3"){
                tabla +='<td><img src="../images/star-solid.png" height="11" width="11"><img src="../images/star-solid.png" height="11" width="11"><img src="../images/star-solid.png" height="11" width="11"></td>';
            }else if(respuesta[i].estrellas=="4"){
                tabla +='<td><img src="../images/star-solid.png" height="11" width="11"><img src="../images/star-solid.png" height="11" width="11"><img src="../images/star-solid.png" height="11" width="11"><img src="../images/star-solid.png" height="11" width="11"></td>';
            }else if(respuesta[i].estrellas=="5"){
                tabla +='<td><img src="../images/star-solid.png" height="11" width="11"><img src="../images/star-solid.png" height="11" width="11"><img src="../images/star-solid.png" height="11" width="11"><img src="../images/star-solid.png" height="11" width="11"><img src="../images/star-solid.png" height="11" width="11"></td>'
            }
            tabla += '<td>' + respuesta[i].fecha+ '</td>';
            tabla += '<td style="width:70%;">' + respuesta[i].comentarios+ '</td></tr>';
        }
        tabla+='</table></div>';
    }
    document.getElementById("tabla_feed").innerHTML=tabla;
    new Tablesort(document.getElementById('feedbacks'));
}
}
function feedback(id_sortida, nom, cognom){
    var stars = null; 
	var inputElements = document.getElementsByClassName('messageCheckbox');
	for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           stars = inputElements[i].value;
           break;
      }
	}
    if(stars== null){
        alert("Valora del 1 al 5 amb les estels")
    }else{
    var text = document.getElementById("coment_text").value;
    //Fecha de hoy
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); 
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    //---------------------
    if(text==""){
        text="Sense Comentaris";
    }
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', '../services/consulta_feedback.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("id_sortida="+id_sortida+"&stars="+stars+"&text="+text+"&today="+today+"&nom="+nom+"&cognom="+cognom);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            alert("Subido correctamente")
            stars.value="";
            document.getElementById("coment_text").value="";
            CrearTabla_Feedback(id_sortida);
            
        }
    }
    }
}
//----------------------

//Funcion que filtra resultados de las excursioned de administracion
function filtrar(){
    divResultado = document.getElementById('resultado');
    var profe = document.getElementById("profe").value;
    var clase = document.getElementById("clase").value;
    var fecha = document.getElementById("fecha").value;
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', 'tabladmin.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("profe="+profe+"&clase="+clase+"&fecha="+fecha);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}

function vertodo(){
    divResultado = document.getElementById('resultado');
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', 'tabladmin.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send();
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}


function vertodo2(){
    divResultado = document.getElementById('resultado');
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', 'admin_prof.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send();
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}


//Funcion que elimina una excursion
function eliminar(id_s,id_a,id_p,id_c,id_t){
    divResultado = document.getElementById('resultado');
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', '../services/eliminar_sortida.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("id_s="+id_s+"&id_a="+id_a+"&id_p="+id_p+"&id_c="+id_c+"&id_t="+id_t);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
           divResultado.innerHTML = ajax.responseText
        }
    }
}

function filtrar_enf_dir(){
    divResultado = document.getElementById('resultado');
    var profe = document.getElementById("profe").value;
    var clase = document.getElementById("clase").value;
    var fecha = document.getElementById("fecha").value;
     var jornada = document.getElementById("jornada").value;
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', 'tabla_enf_dir.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("profe="+profe+"&clase="+clase+"&fecha="+fecha+"&jornada="+jornada);
    // 7. Definimos la funciÃ³n que se ejecutarÃ¡ cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText;
            new Tablesort(document.getElementById('enfermerias'));
        }
    }
}

//Funcion que filtra resultados de las excursioned de secretaria
function filtrar_secretaria(){
    divResultado = document.getElementById('resultado');
    var profe = document.getElementById("profe").value;
    var clase = document.getElementById("clase").value;
    var fecha = document.getElementById("fecha").value;
     var jornada = document.getElementById("jornada").value;
      var etapa = document.getElementById("etapa").value;
       var codi = document.getElementById("codi").value;
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', 'tablasecretaria.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("profe="+profe+"&clase="+clase+"&fecha="+fecha+"&jornada="+jornada+"&etapa="+etapa+"&codi="+codi);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
            new Tablesort(document.getElementById('secretarias'));
        }
    }
}


function vertodo_secretaria(){
    divResultado = document.getElementById('resultado');
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', 'tablasecretaria.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send();
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText;
            new Tablesort(document.getElementById('secretarias'));
        }
    }
}


function filtrar_admin_prof(){
    divResultado = document.getElementById('resultado2');
    var nom_profe = document.getElementById("nom_profe").value;
    var cog_profe = document.getElementById("cog_profe").value;
    var clase = document.getElementById("clase").value;
    var etapa = document.getElementById("etapa").value;

    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', 'tabla_admin_profes.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("nom_profe="+nom_profe+"&clase="+clase+"&cog_profe="+cog_profe+"&etapa="+etapa);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText;
            new Tablesort(document.getElementById('admin_profe_table'));
        }
    }
}

function vertodo_admin_prof(){
    divResultado = document.getElementById('resultado');
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', 'admin_prof.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send();
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText;
            new Tablesort(document.getElementById('admin_profe_table'));
        }
    }
}


function delete_confirm(id_s,id_a,id_p,id_c,id_t){
    
    Swal.fire({
        title: 'Estás segur/a?',
        text: "No podrás recuperar res d'aquesta sortida!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar-la!'
      }).then((result) => {
        if (result.value) {
          Swal.fire(
            'Eliminat!',
            'La sortida ha sigut eliminada correctament.',
            'success',
            
          )
          eliminar(id_s,id_a,id_p,id_c,id_t);
        }
        
      })

}

//Pasar Lista
function CrearTabla_Lista(id_activitat, clase){
divResultado = document.getElementById('resultado');
var ajax2=objetoAjax();
ajax2.open("POST", "../services/consulta_lista.php", true);
ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax2.send("id_activitat="+id_activitat+"&clase="+clase);
ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
    var respuesta=JSON.parse(this.responseText);
        var tabla ='<table id="asistencias" class="table table-bordered" style="background-color: rgba(255,255,255,1);"><thead class="thead-dark"><tr><th>Alumne</th><th>Estat</th><th>Assistència</th></tr><tr></thead>';
        for(var i=0;i<respuesta.length;i++) {
            tabla += '<tr><td>' + respuesta[i].cognom1_alumne+ ', '+ respuesta[i].nom_alumne+'</td>';
            tabla += '<td>' + respuesta[i].estado_asistencia+'</td>';
            if (respuesta[i].estado_asistencia=="Absent") {
		tabla += '<td>' + '<a href="#" title="Absent" style="display:inline;"><img src="../images/mal_check.png" width="32"; onclick="CheckLista('+respuesta[i].id_alumne+',\'' + respuesta[i].estado_asistencia + '\','+id_activitat+', \''+clase+'\'); return false;" height="32"></a></td></tr>';
            }else{
		tabla += '<td>' + '<a href="#" title="Present" style="display:inline;"><img src="../images/check_cuina.png" height="40" width="32"; onclick="CheckLista('+respuesta[i].id_alumne+',\'' + respuesta[i].estado_asistencia + '\','+id_activitat+', \''+clase+'\'); return false;" height="32"></a></td></tr>';	
            }
        }
        tabla+='</table>';
        divResultado.innerHTML=tabla;
        new Tablesort(document.getElementById('asistencias'));
        }
}
}

function CrearTabla_Lista2(id_activitat, clase){
divResultado = document.getElementById('resultado');
var ajax2=objetoAjax();
ajax2.open("POST", "../services/consulta_lista.php", true);
ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax2.send("id_activitat="+id_activitat+"&clase="+clase);
ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
    var respuesta=JSON.parse(this.responseText);
    var tabla ='<table class="table table-bordered" style="background-color: rgba(255,255,255,1);"><thead class="thead-dark"><tr><th><h2>Alumne</h2></th><th><h2>Estat</h2></th><th><h2>Assistència</h2></th></tr><tr></thead>';
    for(var i=0;i<respuesta.length;i++) {
            tabla += '<tr><td><h2>' + respuesta[i].cognom1_alumne+ ', '+ respuesta[i].nom_alumne+'</h2></td>';
            tabla += '<td><h2>' + respuesta[i].estado_asistencia+'</h2></td>';
            if (respuesta[i].estado_asistencia=="Absent") {
        tabla += '<td>' + '<a href="#" title="Absent" style="display:inline;"><img src="../images/mal_check.png" width="40"; onclick="CheckLista2('+respuesta[i].id_alumne+',\'' + respuesta[i].estado_asistencia + '\','+id_activitat+', \''+clase+'\'); return false;" height="42"></a></td></tr>';
            }else{
        tabla += '<td>' + '<a href="#" title="Present" style="display:inline;"><img src="../images/check_cuina.png" height="50" width="40"; onclick="CheckLista2('+respuesta[i].id_alumne+',\'' + respuesta[i].estado_asistencia + '\','+id_activitat+', \''+clase+'\'); return false;" height="42"></a></td></tr>'; 
            }
        }
        tabla+='</table>';
        divResultado.innerHTML=tabla;
        }
}
}

function CheckLista(id, estado, id_activitat, clase){
    var ajax2=objetoAjax();
    ajax2.open("POST", "../services/check_lista.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send("id="+id+"&estado="+estado);
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
            CrearTabla_Lista(id_activitat, clase);
        }
    }
}

function CheckLista2(id, estado, id_activitat, clase){
    var ajax2=objetoAjax();
    ajax2.open("POST", "../services/check_lista.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send("id="+id+"&estado="+estado);
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
            CrearTabla_Lista2(id_activitat, clase);
        }
    }
}

function mostraralumnos(){
    var clase=document.getElementById('clases').value;
    divResultado = document.getElementById('alumnos_clase');
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', '../services/consulta_alumnos.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("id_clase="+clase);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}
function mostraralumnos2(){
    var clase=document.getElementById('clases').value;
    divResultado = document.getElementById('alumnos_clase');
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', '../services/consulta_editar_alumnos.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("accion=mostrar&id_clase="+clase);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}


function anadirlista(activitat){
    var alumno=document.getElementById('nombrealumno').value;
    if (alumno=="") {
        document.getElementById("nombrealumno").style.borderColor="red";
    }else{
        divResultado = document.getElementById('mensaje');
        ajax=objetoAjax();
        ajax.open('POST', '../services/anadirlista.php', true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("id_alumno="+alumno+"&id_activitat="+activitat);
        // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
        ajax.onreadystatechange=function() {
            if (ajax.readyState==4) {
                // 8. Cambiamos el bloque del paso 2.
                divResultado.innerHTML = ajax.responseText
            }
        }
    }
}
function cambiarboton(){
    var valor = document.getElementById("botonvisible").value;
    if (valor==0) {
        document.getElementById("cambiocalendar").innerHTML='<div onclick="cambiarboton()" class="button-calendar2" style="position:absolute;"></div>';
        document.getElementById('modalCalendar').style.display='block';
        document.getElementById("botonvisible").value=1;
    }else{
        document.getElementById("cambiocalendar").innerHTML='<div onclick="cambiarboton()" class="button-calendar" style="position:absolute;"></div>';
        document.getElementById('modalCalendar').style.display='none';
        document.getElementById("botonvisible").value=0;
    }
}

//Añadir y eliminar clases de profes
function nova_clase_profe(profe){
     divResultado = document.getElementById('resultado');
     var clase = document.getElementById("clase_profe"+profe).value;
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', '../services/nova_clase_profe.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("id_user="+profe+"&clase="+clase);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}

function eliminar_clase_profe(profe){
  divResultado = document.getElementById('resultado');
     var clase = document.getElementById("elim_clase_profe"+profe).value;  
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', '../services/eliminar_clase_profe.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("id_user="+profe+"&clase="+clase);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}

//Mostrar y ocultar columnas tabla admin
function Mostrar_Profesores(fila){
    var estado_filtro = document.getElementById("btn_profes").value;
    if (estado_filtro==0){
        document.getElementById('btn_profes').style.backgroundColor = 'green';
        document.getElementById('btn_profes').style.color = 'white';
        document.getElementById('btn_profes').value = 1;
        document.getElementById('proasignat').style.display = 'table-cell';
        document.getElementById('vetllador').style.display = 'table-cell';
        document.getElementById('profesors').style.display = 'table-cell';
        document.getElementById('profesors_comp').style.display = 'table-cell';
        document.getElementById('profesors_comp').style.display = 'table-cell';
        var i=0;
        while(i<=fila){
            document.getElementById('profas'+i).style.display = 'table-cell';
            document.getElementById('prof'+i).style.display = 'table-cell';
            document.getElementById('prof_comp'+i).style.display = 'table-cell';
            document.getElementById('vet'+i).style.display = 'table-cell';
            i++;
        }
    }else{
        document.getElementById('btn_profes').style.backgroundColor = 'white';
        document.getElementById('btn_profes').style.color = '#0099CC';
        document.getElementById('btn_profes').value = 0;
        document.getElementById('proasignat').style.display = 'none';
        document.getElementById('vetllador').style.display = 'none';
        document.getElementById('profesors').style.display = 'none';
        document.getElementById('profesors_comp').style.display = 'none';
        document.getElementById('profesors_comp').style.display = 'none';
        var i=0;
        while(i<=fila){
            document.getElementById('profas'+i).style.display = 'none';
            document.getElementById('prof'+i).style.display = 'none';
            document.getElementById('prof_comp'+i).style.display = 'none';
            document.getElementById('vet'+i).style.display = 'none';
            i++;
        }
    }
}

function Mostrar_Alumnes(fila){
    var estado_filtro = document.getElementById("btn_al").value;
    if (estado_filtro==0){
        document.getElementById('btn_al').style.backgroundColor = 'green';
        document.getElementById('btn_al').style.color = 'white';
        document.getElementById('btn_al').value = 1;
        document.getElementById('acompanyants').style.display = 'table-cell';
        document.getElementById('alumnes').style.display = 'table-cell';
        var i=0;
        while(i<=fila){
            document.getElementById('al'+i).style.display = 'table-cell';
            document.getElementById('al'+i).style.width = '3%';
            document.getElementById('acom'+i).style.display = 'table-cell';
            document.getElementById('acom'+i).style.width = '3%';
            i++;
        }
    }else{
        document.getElementById('btn_al').style.backgroundColor = 'white';
        document.getElementById('btn_al').style.color = '#0099CC';
        document.getElementById('btn_al').value = 0;
        document.getElementById('acompanyants').style.display = 'none';
        document.getElementById('alumnes').style.display = 'none';
        var i=0;
        while(i<=fila){
            document.getElementById('al'+i).style.display = 'none';
            document.getElementById('acom'+i).style.display = 'none';
            i++;
        }
    }
}
function Mostrar_Tipus(fila){
    var estado_filtro = document.getElementById("btn_tipus").value;
    if (estado_filtro==0){
        document.getElementById('btn_tipus').style.backgroundColor = 'green';
        document.getElementById('btn_tipus').style.color = 'white';
        document.getElementById('btn_tipus').value = 1;
        document.getElementById('ambit').style.display = 'table-cell';
        document.getElementById('tipus').style.display = 'table-cell';
        var i=0;
        while(i<=fila){
            document.getElementById('tipus'+i).style.display = 'table-cell';
            document.getElementById('ambit'+i).style.display = 'table-cell';
            i++;
        }
    }else{
        document.getElementById('btn_tipus').style.backgroundColor = 'white';
        document.getElementById('btn_tipus').style.color = '#0099CC';
        document.getElementById('btn_tipus').value = 0;
        document.getElementById('ambit').style.display = 'none';
        document.getElementById('tipus').style.display = 'none';
        var i=0;
        while(i<=fila){
            document.getElementById('tipus'+i).style.display = 'none';
            document.getElementById('ambit'+i).style.display = 'none';
            i++;
        }
    }
}
//------------------------------------------


//Enviar mail de recuperación de contraseña
function recuperar_password_pares(){
     divResultado = document.getElementById('mensaje_pass');
     var dni = document.getElementById("dni").value;
  divResultado.innerHTML = "<img style='width:100px;' src='../images/loading.gif'>";
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', '../services/recuperar_password_pares.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("dni="+dni);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}

function recuperar_password(){
     divResultado = document.getElementById('mensaje_pass');
     var email = document.getElementById("email").value;
  divResultado.innerHTML = "<img style='width:100px;' src='../images/loading.gif'>";
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', '../services/recuperar_password.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("email="+email);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}

//Cambiar contraseña padres
function canvi_password_pares(id){
     divResultado = document.getElementById('mensaje_pass');
     var dni = document.getElementById("dni").value;
     var pass = document.getElementById("pass1").value;
divResultado.innerHTML = "<img style='width:100px;' src='../images/loading.gif'>";

    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', '../services/canvi_password_pares.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("dni="+dni+"&pass="+pass+"&id="+id);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}

//Cambiar contraseña
function canvi_password(id){
     divResultado = document.getElementById('mensaje_pass');
     var email = document.getElementById("email").value;
     var pass = document.getElementById("pass1").value;

divResultado.innerHTML = "<img style='width:100px;' src='../images/loading.gif'>";

    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', '../services/canvi_password.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("email="+email+"&pass="+pass+"&id="+id);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}

//Funcion para validar el formulario
function recuperar_pass(id){
//Metemos lo que serían los dos inputs en variables
   var pass1 = document.getElementById("pass1");
   var pass2 = document.getElementById("pass2");
   var email = document.getElementById("email");

   //Comparamos si los valores están rellenos, para que en el caso de que tengan el borde rojo puesto, quitarlo.
   if(pass1.value != ""){
    pass1.style.borderColor="";
   }

   if(pass2.value != ""){
    pass2.style.borderColor="";
   }
   
   if(email.value != ""){
    email.style.borderColor="";

   }

//Comparamos si están vacíos y en el caso de que esté, ponemos un borde rojo y hacemos un return false
   if(pass1.value == "" & pass2.value == "" & email.value == ""){
    pass1.style.borderColor="red";
    pass2.style.borderColor = "red";
    email.style.borderColor = "red";

    document.getElementById('mensaje').innerHTML = 'Introdueix totes les dades';
    

    return false;
   }else{

    //Comprobamos si el usuario está vacío
       if(pass1.value == ""){

    document.getElementById('mensaje').innerHTML = 'Introdueix la contrasenya';

           pass1.style.borderColor = "red";
           return false;

    
       }

       //Comprobamos si la contraseña está vacía
       if(pass2.value == ""){
        document.getElementById('mensaje').innerHTML = 'Confirma la contrasenya';
           pass2.style.borderColor = "red";
           return false;
    
       }

         if(email.value == ""){
             document.getElementById('mensaje').innerHTML = 'Introdueix el teu email';
           email.style.borderColor = "red";
           return false;

   
           
       }
   }

   if(pass1.value != "" & pass2.value != "" & email.value != ""){

    if (pass1.value == pass2.value) {
    canvi_password(id)
        
    }else{
        
        document.getElementById('mensaje').innerHTML = 'Les claus no són iguals';
        

    pass1.style.borderColor="red";
    pass2.style.borderColor = "red";

    return false;
    
}
}
}

function recuperar_pass_pares(id){
//Metemos lo que serían los dos inputs en variables
   var pass1 = document.getElementById("pass1");
   var pass2 = document.getElementById("pass2");
   var dni = document.getElementById("dni");

   //Comparamos si los valores están rellenos, para que en el caso de que tengan el borde rojo puesto, quitarlo.
   if(pass1.value != ""){
    pass1.style.borderColor="";
   }

   if(pass2.value != ""){
    pass2.style.borderColor="";
   }
   
   if(dni.value != ""){
    dni.style.borderColor="";

   }

//Comparamos si están vacíos y en el caso de que esté, ponemos un borde rojo y hacemos un return false
   if(pass1.value == "" & pass2.value == "" & dni.value == ""){
    pass1.style.borderColor="red";
    pass2.style.borderColor = "red";
    dni.style.borderColor = "red";

    document.getElementById('mensaje').innerHTML = 'Introdueix totes les dades';
    

    return false;
   }else{

    //Comprobamos si el usuario está vacío
       if(pass1.value == ""){

    document.getElementById('mensaje').innerHTML = 'Introdueix la contrasenya';

           pass1.style.borderColor = "red";
           return false;

    
       }

       //Comprobamos si la contraseña está vacía
       if(pass2.value == ""){
        document.getElementById('mensaje').innerHTML = 'Confirma la contrasenya';
           pass2.style.borderColor = "red";
           return false;
    
       }

         if(dni.value == ""){
             document.getElementById('mensaje').innerHTML = 'Introdueix el DNI';
           dni.style.borderColor = "red";
           return false;

   
           
       }
   }

   if(pass1.value != "" & pass2.value != "" & dni.value != ""){

    if (pass1.value == pass2.value) {
    canvi_password_pares(id)
        
    }else{
        
        document.getElementById('mensaje').innerHTML = 'Les claus no són iguals';
        

    pass1.style.borderColor="red";
    pass2.style.borderColor = "red";

    return false;
    
}
}
}

function cambiarClase(){
    var alumno=document.getElementById('nombrealumno').value;
    var clase=document.getElementById('clases2').value;
    
     if(alumno=="" && clase==""){
        document.getElementById("nombrealumno").style.borderColor="red";
        document.getElementById("clases2").style.borderColor="red";
    }else if (alumno=="") {
        document.getElementById("nombrealumno").style.borderColor="red";
        document.getElementById("clases2").style.borderColor="#ced4da";
    }else if (clase=="") {
        document.getElementById("clases2").style.borderColor="red";
        document.getElementById("nombrealumno").style.borderColor="#ced4da";
    }else{
         document.getElementById("nombrealumno").style.borderColor="#ced4da";
         document.getElementById("clases2").style.borderColor="#ced4da";
        
        ajax=objetoAjax();
        ajax.open('POST', '../services/cambiar_clase.proc.php', true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("id_alumno="+alumno+"&id_clase="+clase+"&nom="+nom+"&cognom="+cognom+"siei="+siei);

        // Definimos la función que se ejecutará cuando cambie la propiedad readyState
        ajax.onreadystatechange=function() {
            if (ajax.readyState==4) {
                mostraralumnos();
                document.getElementById('mensaje').innerHTML = "Se ha cambiado de clase al alumno";
                
            }else{
                document.getElementById('mensaje').innerHTML = "Ha ocurrido un error";
            }
        }
    }
}
function eliminarAlumno(){
    var alumno=document.getElementById('nombrealumno').value;
    
    
    
    if (alumno=="") {
        document.getElementById("nombrealumno").style.borderColor="red";
       
    
    }else{
         document.getElementById("nombrealumno").style.borderColor="#ced4da";
        
        
        ajax=objetoAjax();
        ajax.open('POST', '../services/eliminar_alumno.proc.php', true);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("id_alumno="+alumno);

        // Definimos la función que se ejecutará cuando cambie la propiedad readyState
        ajax.onreadystatechange=function() {
            if (ajax.readyState==4) {
                mostraralumnos();
                document.getElementById('mensaje').innerHTML = "Se ha eliminado el alumno correctamente";
            }else{
                document.getElementById('mensaje').innerHTML = "Ha ocurrido un error";
            }
        }
    }
}
//Crear la tabla de administracion para listas
function verlista(id_activitat){
divResultado = document.getElementById('resultado');
var ajax2=objetoAjax();
ajax2.open("POST", "../services/consulta_lista_admin.php", true);
ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax2.send("id_activitat="+id_activitat);
ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
    var respuesta=JSON.parse(this.responseText);
        var tabla ='<table id="lista" class="table table-bordered" style="background-color: rgba(255,255,255,1);"><thead class="thead-dark"><tr><th>Cognoms</th><th>Nom</th><th>Clase</th><th>Assistència</th></tr><tr></thead>';
        for(var i=0;i<respuesta.length;i++) {
            tabla += '<tr><td>' + respuesta[i].cognom1_alumne+ ', '+ respuesta[i].cognom2_alumne+'</td>';
            tabla += '<td>' + respuesta[i].nom_alumne+'</td>';
            tabla += '<td>' + respuesta[i].nom_classe+'</td>';
            if (respuesta[i].estado_asistencia=="Absent") {
        tabla += '<td>' + '<img src="../images/mal_check.png" width="32"; height="32"></a></td></tr>';
            }else{
        tabla += '<td>' + '<img src="../images/check_cuina.png" height="40" width="32";></a></td></tr>'; 
            }
        }
        tabla+='</table>';
        divResultado.innerHTML=tabla;
        new Tablesort(document.getElementById('lista'));
        }
    }
}