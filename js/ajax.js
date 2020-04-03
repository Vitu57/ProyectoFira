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


function modal(){

    // Get the modal
var modal = document.getElementById("myModal");
var modal2 = document.getElementById("myModal2");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  modal2.style.display = "none";
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

// Get the button that opens the modal
var btn = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementById("close2");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  modal2.style.display = "none";
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
    var tabla='<table class="table table-bordered" style="text-align:center"><thead>';
        tabla +='<tr><th>Codi</th><th>Nom Sortida</th><th>Inici Sortida</th><th>Final Sortida</th><th>Clase</th><th>Etapa</th><th>Acompanyants</th><th>Alumnes</th><th>Profesor asignat</th><th>Estat Comanda</th>';
        for(var i=0;i<respuesta.length;i++) {
            if(estado_filtro==1){
                if(respuesta[i].inici_sortida==today){
                    tabla += '<tr></tr>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
					tabla += '<td>' + respuesta[i].nom_activitat+ '</td>';
                    tabla += '<td>' + respuesta[i].inici_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].final_sortida+ '</td>';
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
                }
            }else{
                if(respuesta[i].inici_sortida>=today){
                    tabla += '<tr></tr>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
					tabla += '<td>' + respuesta[i].nom_activitat+ '</td>';
                    tabla += '<td>' + respuesta[i].inici_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].final_sortida+ '</td>';
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
                }
            }
        }
            tabla+='</thead></table>';
            divResultado.innerHTML=tabla;
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
//----------------------------------------------------------------------------------------------------------------------------------

function CrearTablaProfes(filtro){

    var profe = document.getElementById("profe").value;
    var clase = document.getElementById("clase").value;
    var fecha = document.getElementById("fecha").value;
     var jornada = document.getElementById("jornada").value;
      var etapa = document.getElementById("etapa").value;
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

    var tabla='<table class="table table-bordered" <thread>';
        tabla +='<tr><th>Opcions</th><th>Sortida</th><th>Codi</th><th>Inici Sortida</th><th>Final Sortida</th><th>Clase</th><th>Etapa</th><th>Professor asignat</th><th>Acompanyants</th><th>Vetlladors</th><th>Alumnes</th><th>Transport</th><th>Activitat</th><th>Contacte</th>';
        for(var i=0;i<respuesta.length;i++) {
            if(estado_filtro==1){
                if(respuesta[i].inici_sortida==today){
                    tabla += '<tr>';
                    tabla +='<td><a href="form_update_excursiones.php?id_excursion='+respuesta[i].id_sortida+'"><i class="fas fa-pencil-alt fa-2x" id="modificar" style="color:#3F7FBF;"></i></a></td>';
                    tabla += '<td >' + respuesta[i].nom_activitat+ '</td>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].inici_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].final_sortida+ '</td>';
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
                    tabla +='<td><a href="form_update_excursiones.php?id_excursion='+respuesta[i].id_sortida+'"><i class="fas fa-pencil-alt fa-2x" id="modificar" style="color:#3F7FBF;"></i></a></td>';
                    tabla += '<td>' + respuesta[i].nom_activitat+ '</td>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].inici_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].final_sortida+ '</td>';
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
            

    }
    }
}
function FiltroProfes(){
    var estado_filtro = document.getElementById("btn_filtro").value;
    if (estado_filtro==0){
        document.getElementById("btn_filtro").style.backgroundColor="green";
        document.getElementById("btn_filtro").value=1;
    }else{
        document.getElementById("btn_filtro").style.backgroundColor="#367cb3";
        document.getElementById("btn_filtro").value=0;
    }
    CrearTablaProfes();
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
    var tabla='<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead>';
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
    var tabla='<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead>';
        tabla +='<tr><th>Transport</th><th>Sortida</th><th>Arribada</th><th>Comentari</th>';
        
            tabla += '<tr>';
                    
                    tabla += '<td>' + respuesta[0].nom_transport+ '</td>';
                    tabla += '<td>' + respuesta[0].hora_sortida+ '</td>';
                    tabla += '<td>' + respuesta[0].hora_arribada+ '</td>';
                    tabla += '<td>' + respuesta[0].comentaris_transport+ '</td>';
                    
                    
                    tabla += '</tr>';
        
        tabla+='</thead></table>';
            document.getElementById("contenidoResultado").innerHTML=tabla;
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
    var tabla='<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead>';
        tabla +='<tr><th>Persona</th><th>Email</th><th>Telefon</th><th>Web contacte</th>';
        
            tabla += '<tr>';
                    
                    tabla += '<td>' + respuesta[0].persona_contacte+ '</td>';
                    tabla += '<td>' + respuesta[0].email_contacte+ '</td>';
                    tabla += '<td>' + respuesta[0].telefon_contacte+ '</td>';
                    tabla += '<td>' + respuesta[0].web_contacte+ '</td>';
                    
                    
                    tabla += '</tr>';
        
        tabla+='</thead></table>';
            document.getElementById("contenidoResultado").innerHTML=tabla;
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
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead><tr>';
                    tabla += '<th>Persona de contacte</th>';
                    tabla += '<th>Web de contacte</th>';
                    tabla += '<th>Telefon de contacte</th>';
                    tabla += '<th>Email de contacte</th></tr>';
                    tabla += '<td>' + persona + '</td>';  
                    tabla += '<td>' + web +'</td>';
                    tabla += '<td>' + telf + '</td>';
                    tabla += '<td>' + email + '</td></tr><thread></table>';
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
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
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead><tr>';
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
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead><tr>';
                    tabla += '<th>Transport</th>';
                    tabla += '<th>Sortida</th>';
                    tabla += '<th>Arribada</th>';
                    tabla += '<th>Comentari</th></tr>';
                    tabla += '<td>' + nom + '</td>';  
                    tabla += '<td>' + sortida +'</td>';
                    tabla += '<td>' + arribada + '</td>';
                    tabla += '<td>' + comentari + '</td></tr><thread></table>';
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
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
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead><tr>';
                    tabla += '<th>Activitat</th>';
                    tabla += '<th>Jornada</th>';
                    tabla += '<th>Transport</th>';
                    tabla += '<th>Profesor</th></tr>';
                    tabla += '<td>' + nom + '</td>';  
                    tabla += '<td>' + jornada + '</td>';
                    tabla += '<td>' + transport + '</td>';
                    tabla += '<td>' + profesor + '</td></tr><thread></table>';
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
    }


//--------------------------------------------------------------------
//Funciones para modales de juanma
function abrirform1(persona, web, telf, email){
    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead><tr>';
                    tabla += '<th>Persona de contacte</th>';
                    tabla += '<th>Web de contacte</th>';
                    tabla += '<th>Telefon de contacte</th>';
                    tabla += '<th>Email de contacte</th></tr>';
                    tabla += '<td>' + persona + '</td>';  
                    tabla += '<td>' + web + '</td>';
                    tabla += '<td>' + telf + '</td>';
                    tabla += '<td>' + email + '</td></tr><thread></table>';       
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
}
function abrirform2(a,b,c,d,e,f,g,h,i,j,k,l,m){
    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                    tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead><tr>';
                    tabla += '<th>Cost de substitucio</th>';
                    tabla += '<th>Cost activitat individual</th>';
                    tabla += '<th>Cost extra activitat profe</th>';
                    tabla += '<th>Cost global activitat</th>';
                    tabla += '<th>Cost final</th>';
                    tabla += '<th>Cost fixe</th>';
                    tabla += '<th>Preu sense topal</th>';
                    tabla += '<th>Preu amb topal</th>';
                    tabla += '<th>Preu gestio</th>';
                    tabla += '<th>Overhead</th>';
                    tabla += '<th>Total a facturar</th>';
                    tabla += '<th>Pagament fraccionat</th>';
                    tabla += '<th>Observacio</th></tr>';
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
}
function abrirform3(a,b,c,d,e,f){
    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                   tabla = '<table class="table table-bordered" style="text-align:center; margin-left:5%; width:90%;"><thead><tr>';
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
}

//Funcion que filtra resultados de las excursioned de administracion
function filtrar(){
    divResultado = document.getElementById('resultado');
    var profe = document.getElementById("profe").value;
    var clase = document.getElementById("clase").value;
    var fecha = document.getElementById("fecha").value;
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', 'verexcursionesadmin.php', true);
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
    ajax.open('POST', 'verexcursionesadmin.php', true);
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
    ajax.open('POST', 'sortides_secretaria.php', true);
    // 5. Configuramos el encabezado (POST)
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // 6. Enviamos la solicitud
    ajax.send("profe="+profe+"&clase="+clase+"&fecha="+fecha+"&jornada="+jornada+"&etapa="+etapa+"&codi="+codi);
    // 7. Definimos la función que se ejecutará cuando cambie la propiedad readyState
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            // 8. Cambiamos el bloque del paso 2.
            divResultado.innerHTML = ajax.responseText
        }
    }
}

function vertodo_secretaria(){
    divResultado = document.getElementById('resultado');
    ajax=objetoAjax();
    // 4. Especificamos la solicitud
    ajax.open('POST', 'sortides_secretaria.php', true);
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