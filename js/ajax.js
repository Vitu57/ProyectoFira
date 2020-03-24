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
//Esta funcion Crea la Tabla de visualización de excursiones de COCINA
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
        tabla +='<tr><th>Inici Sortida</th><th>Hora Sortida</th><th>Final Sortida</th><th>Hora Arribada</th><th>Clase</th><th>Etapa</th><th>Acompanyants</th><th>Transport</th><th>Actividades</th><th>Alumnes</th>';
        for(var i=0;i<respuesta.length;i++) {
            if(estado_filtro==1){
                if(respuesta[i].inici_sortida==today){
                    tabla += '<tr>';
                    
                    tabla += '<td>' + respuesta[i].inici_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].hora_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].final_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].hora_arribada+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_classe+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_etapa+ '</td>';
                    tabla += '<td>' + respuesta[i].n_acompanyants+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_transport+ '</td>';
                    tabla += '<td>Info actividad</td>';
                    tabla += '<td>' + respuesta[i].numero_alumnes+ '</td>';
                    tabla += '</tr>';
                    
                    
                }
            }else{
                if(respuesta[i].inici_sortida>=today){
                    tabla += '<tr>';
                    
                    tabla += '<td>' + respuesta[i].inici_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].hora_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].final_sortida+ '</td>';
                    tabla += '<td>' + respuesta[i].hora_arribada+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_classe+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_etapa+ '</td>';
                    tabla += '<td>' + respuesta[i].n_acompanyants+ '</td>';
                    tabla += '<td>' + respuesta[i].nom_transport+ '</td>';
                    tabla += '<td>Info actividad</td>';
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