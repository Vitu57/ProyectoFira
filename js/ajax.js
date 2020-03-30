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
        tabla +='<tr><th>Codi</th><th>Inici Sortida</th><th>Final Sortida</th><th>Clase</th><th>Etapa</th><th>Acompanyants</th><th>Alumnes</th><th>Profesor asignat</th><th>Estat Comanda</th>';
        for(var i=0;i<respuesta.length;i++) {
            if(estado_filtro==1){
                if(respuesta[i].inici_sortida==today){
                    tabla += '<tr></tr>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
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
        document.getElementById("btn_filtro").style.backgroundColor="white";
        document.getElementById("btn_filtro").value=0;
    }
    CrearTabla();
}
//----------------------------------------------------------------------------------------------------------------------------------

function CrearTablaProfes(){
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
    ajax2.open("GET", "../services/consulta_profes.php", true);
    ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax2.send(null);
    ajax2.onreadystatechange=function() {
    if (ajax2.readyState==4 && ajax2.status==200) {
    var respuesta=JSON.parse(this.responseText);
    var tabla='<table class="table table-bordered" style="text-align:center"><thead>';
        tabla +='<tr><th>Sortida</th><th>Codi</th><th>Inici Sortida</th><th>Final Sortida</th><th>Clase</th><th>Etapa</th><th>Acompanyants</th><th>Transport</th><th>Activitat</th><th>Contacte</th><th>Alumnes</th>';
        for(var i=0;i<respuesta.length;i++) {
            if(estado_filtro==1){
                if(respuesta[i].inici_sortida==today){
                    tabla += '<tr>';
                    
                    tabla += '<td>' + "nombre"+ '</td>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].inici_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].final_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_classe+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_etapa+ '</td>';
                    tabla += '<td>' + respuesta[i].n_acompanyants+ '</td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes_transport('+respuesta[i].id_transport+')">Info+</button></td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes('+respuesta[i].id_activitat+')">Info+</button></td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes_contacte('+respuesta[i].id_contacte+')">Info+</button></td>';
                    tabla += '<td>' + respuesta[i].numero_alumnes+ '</td>';
                    tabla += '</tr>';
                    
                    
                }
            }else{
                if(respuesta[i].inici_sortida>=today){
                    tabla += '<tr>';

                    tabla += '<td>' + "nombre"+ '</td>';
                    tabla += '<td>' + respuesta[i].codi_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].inici_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].final_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_classe+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_etapa+ '</td>';
                    tabla += '<td>' + respuesta[i].n_acompanyants+ '</td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes_transport('+respuesta[i].id_transport+')">Info+</button></td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes('+respuesta[i].id_activitat+')">Info+</button></td>';
                    tabla += '<td><a id="modal_profesores" href=# onclick="modal_profes_contacte('+respuesta[i].id_contacte_activitat+')">Info+</button></td>';
                    tabla += '<td>' + respuesta[i].numero_alumnes+ '</td>';
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
        document.getElementById("btn_filtro").style.backgroundColor="white";
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
                  
                    tabla = '<h4>Persona de contacte</h4>';
                    tabla += '<p>' + persona + '</p>';
                    tabla += '<h4>Web de contacte</h4>';
                    tabla += '<p>' + web +'</p>';
                    tabla += '<h4>Telefon de contacte</h4>';
                    tabla += '<p>' + telf + '</p>';
                    tabla += '<h4>Email de contacte</h4>';
                    tabla += '<p>' + email + '</p>';
                    
            document.getElementById("contenidoResultado").innerHTML=tabla;
    }

//--------------------------------------------------------------------
//Funciones para modales de juanma
function abrirform1(){
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
function abrirform2(){
    var modal = document.getElementById("myModal2");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn2");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close2")[0];

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
function abrirform3(){
    var modal = document.getElementById("myModal3");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn3");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close3")[0];

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