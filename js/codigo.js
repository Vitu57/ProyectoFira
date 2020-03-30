window.onload = select_etapa;

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {

        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}


function select_etapa() {
    /*código a implementar*/
    var etapa = document.getElementById("etapa");
    var ajax3 = objetoAjax();
    var option;
    ajax3.open("POST", "../services/consulta_form_sortides.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=" + "etapa");
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            option += '<option value="0">Escollir una opció</option>';
            for (var i = 0; i < respuesta.length; i++) {
                option += '<option value="'+respuesta[i].id_etapa+'">' + respuesta[i].nom_etapa + '</option>';
            }
            etapa.innerHTML = option;
            select_curs();
            select_enum();
            select_professor();
            select_transport();
        }
    }

}

function select_enum() {
    /*código a implementar*/

    lista = document.getElementById("tipus_activitat");
    var ajax3 = objetoAjax();
    var option;
    accion = "tipus_activitat";
    ajax3.open("POST", "../services/consulta_form_sortides.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=1&column=" + accion);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            respuesta = JSON.parse(this.responseText);
            //var myJSON = JSON.stringify(this.responseText);
            option = "";
            option += '<option value="0">Escollir una opció</option>';
            for (var j = 0; j < respuesta.length; j++) {
                option += '<option>' + respuesta[j] + '</option>';
                console.log(option);
            }
            lista.innerHTML = option;
            console.log(lista.innerHTML = option);
            select_enum2();
        }

    }
}

function select_enum2() {
    /*código a implementar*/

    lista =  document.getElementById("ambit_activitat");;
    var ajax3 = objetoAjax();
    var option;
    accion = "ambit_activitat";
    ajax3.open("POST", "../services/consulta_form_sortides.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=1&column=" + accion);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            respuesta = JSON.parse(this.responseText);
            //var myJSON = JSON.stringify(this.responseText);
            option = "";
            option += '<option value="0">Escollir una opció</option>';
            for (var j = 0; j < respuesta.length; j++) {
                option += '<option>' + respuesta[j] + '</option>';
                console.log(option);
            }
            lista.innerHTML = option;
            console.log(lista.innerHTML = option);
            select_enum3();
        }

    }
}

function select_enum3() {
    /*código a implementar*/

    lista = document.getElementById("jornada_activitat");
    var ajax3 = objetoAjax();
    var option;
    accion = "jornada_activitat";
    ajax3.open("POST", "../services/consulta_form_sortides.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=1&column=" + accion);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            respuesta = JSON.parse(this.responseText);
            //var myJSON = JSON.stringify(this.responseText);
            option = "";
            option += '<option value="0">Escollir una opció</option>';
            for (var j = 0; j < respuesta.length; j++) {
                option += '<option>' + respuesta[j] + '</option>';
                console.log(option);
            }
            lista.innerHTML = option;
            console.log(lista.innerHTML = option);
        }

    }
}
function select_curs() {
    /*código a implementar*/
    var curs = document.getElementById("curs");
    var etapa = document.getElementById("etapa").value;
    var ajax3 = objetoAjax();
    var option;
    ajax3.open("POST", "../services/consulta_form_sortides.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=" + "curso" + "&nom_etapa=" + etapa);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            var respuesta2 = JSON.parse(this.responseText);
            option += '<option value="0">Escollir una opció</option>';
            for (var i = 0; i < respuesta2.length; i++) {

                option += '<option value="'+respuesta2[i].id_clase+'">' + respuesta2[i].nom_classe + '</option>';

            }
            curs.innerHTML = option;
        }
    }

}

//Devuelve los profesores ordenados por apellido de la base de datos y los muestra en un multiselect
function select_professor() {
    /*código a implementar*/
    var lista = document.getElementById("lista_prof");
    var ajax3 = objetoAjax();
    var option;
    ajax3.open("POST", "../services/consulta_form_sortides.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=professor");
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            var respuesta=JSON.parse(this.responseText);
            for (var i = 0; i < respuesta.length; i++) {
            option += '<option value="'+respuesta[i].id_usuari+'">' + respuesta[i].nom_usuari+' '+respuesta[i].cognom_usuari+ '</option>';
            }
            lista.innerHTML=option;
        }
    }

}
// devuelve y muestra los tipos de transporte en un select
function select_transport() {
    var transport = document.getElementById("tipus_transport");
    var ajax3 = objetoAjax();
    var option;
    ajax3.open("POST", "../services/consulta_form_sortides.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=transport");
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            var respuesta=JSON.parse(this.responseText);
            option += '<option value="0">Escollir una opció</option>';
            for (var i = 0; i < respuesta.length; i++) {
            option += '<option value="' + respuesta[i].id_nom_transport+'">' + respuesta[i].nom_transport+'</option>';
            console.log(option);
            }
            transport.innerHTML=option;
        }
    }

}

function insert_excursion() {
    //----------------Sortida----------------------
    var codi_sortida = document.getElementById('codi_sortida').value;
    var inici_sortida = document.getElementById('inici_sortida').value;
    var final_sortida = document.getElementById('final_sortida').value;
    var curs = document.getElementById('curs').value;
    var num_alumnes = document.getElementById('num_alumnes').value;
    var num_professors = document.getElementById('num_professors').value;
    var lista = document.querySelectorAll('#lista_prof option:checked');
    var profes = Array.from(lista).map(el => el.value)
    var prof_asignat = document.getElementById('professor_asignat').value;
    var num_vetlladors = document.getElementById('num_vetlladors').value;
    var num_acomp = document.getElementById('num_acomp').value;
    var prof_apart = document.getElementById('prof_apart').value;
    var comentaris_sort = document.getElementById('comentaris_sort').value;
    //----------------Activitat----------------------
    var nom_activitat = document.getElementById('nom_activitat').value;
    var lloc_activitat = document.getElementById('lloc_activitat').value;
    var tipus_activitat = document.getElementById('tipus_activitat').value;
    var ambit_activitat = document.getElementById('ambit_activitat').value;
    var jornada_activitat = document.getElementById('jornada_activitat').value;
    var comentaris_objectiu = document.getElementById('comentaris_objectiu').value;
    var pers_contacte = document.getElementById('pers_contacte').value;
    var tlf_contacte = document.getElementById('tlf_contacte').value;
    var web_contacte = document.getElementById('web_contacte').value;
    var email_contacte = document.getElementById('email_contacte').value;
    //----------------Transport----------------------
    var hora_sortida = document.getElementById('hora_sortida').value;
    var hora_arribada = document.getElementById('hora_arribada').value;
    var tipus_transport = document.getElementById('tipus_transport').value;
    var cost_transport = document.getElementById('cost_transport').value;
    var codi_contacte = document.getElementById('codi_contacte').value;
    var comentaris_transport = document.getElementById('comentaris_transport').value;
    //----------------Costos----------------------
    var cost_substitucio = document.getElementById('cost_substitucio').value;
    var cost_act_ind = document.getElementById('cost_act_ind').value;
    var cost_ext_act_prof = document.getElementById('cost_ext_act_prof').value;
    var cost_glob_act = document.getElementById('cost_glob_act').value;
    var cost_final = document.getElementById('cost_final').value;
    var preu_fixe = document.getElementById('preu_fixe').value;
    var preu_sense_topal = document.getElementById('preu_sense_topal').value;
    var preu_amb_topal = document.getElementById('preu_amb_topal').value;
    var preu_gestio = document.getElementById('preu_gestio').value;
    var overhead = document.getElementById('overhead').value;
    var total_facturar = document.getElementById('total_facturar').value;
    var pagament_fraccionat = document.getElementById('fraccionat').value;
    var observacions_fraccionat = document.getElementById('observacions_costos').value;
    console.log("persona_contacte="+pers_contacte+"&tlf_contacte="+tlf_contacte+"&web_contacte="+web_contacte+"&email_contacte="+email_contacte+
    "&cost_substitucio="+cost_substitucio+"&cost_act_ind="+cost_act_ind+"&cost_ext_act_prof="+cost_ext_act_prof+"&cost_glob_act="+cost_glob_act+"&cost_final="+cost_final+
    "&preu_fixe="+preu_fixe+"&preu_sense_topal="+preu_sense_topal+"&preu_amb_topal="+preu_amb_topal+"&preu_gestio="+preu_gestio+"&overhead="+overhead+
    "&total_facturar="+total_facturar+"&pagament_fraccionat="+pagament_fraccionat+"&observacions_fraccionat="+observacions_fraccionat+"&hora_sortida="+hora_sortida+"&hora_arribada="+hora_arribada+
    "&tipus_transport="+tipus_transport+"&cost_transport="+cost_transport+"&codi_contacte="+codi_contacte+"&comentaris_transport="+comentaris_transport+
    "&codi_sortida="+codi_sortida+"&inici_sortida="+inici_sortida+"&final_sortida="+final_sortida+"&id_clase="+curs+"&num_alumnes="+num_alumnes+
    "&num_professors="+num_professors+"&prof_asignat="+prof_asignat+"&profes="+JSON.stringify(profes)+"&num_vetlladors="+num_vetlladors+"&num_acomp="+num_acomp+"&prof_apart="+prof_apart+
    "&comentaris_sort="+comentaris_sort+"&nom_activitat="+nom_activitat+"&lloc_activitat="+lloc_activitat+"&tipus_activitat="+tipus_activitat+"&ambit_activitat="+ambit_activitat+
    "&jornada_activitat="+jornada_activitat+"&objectiu_activitat="+comentaris_objectiu);
    var ajax3 = objetoAjax();
    ajax3.open("POST", "../services/insert_form_sortides.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("persona_contacte="+pers_contacte+"&tlf_contacte="+tlf_contacte+"&web_contacte="+web_contacte+"&email_contacte="+email_contacte+
    "&cost_substitucio="+cost_substitucio+"&cost_act_ind="+cost_act_ind+"&cost_ext_act_prof="+cost_ext_act_prof+"&cost_glob_act="+cost_glob_act+"&cost_final="+cost_final+
    "&preu_fixe="+preu_fixe+"&preu_sense_topal="+preu_sense_topal+"&preu_amb_topal="+preu_amb_topal+"&preu_gestio="+preu_gestio+"&overhead="+overhead+
    "&total_facturar="+total_facturar+"&pagament_fraccionat="+pagament_fraccionat+"&observacions_fraccionat="+observacions_fraccionat+"&hora_sortida="+hora_sortida+"&hora_arribada="+hora_arribada+
    "&tipus_transport="+tipus_transport+"&cost_transport="+cost_transport+"&codi_contacte="+codi_contacte+"&comentaris_transport="+comentaris_transport+
    "&codi_sortida="+codi_sortida+"&inici_sortida="+inici_sortida+"&final_sortida="+final_sortida+"&id_clase="+curs+"&num_alumnes="+num_alumnes+
    "&num_professors="+num_professors+"&prof_asignat="+prof_asignat+"&profes="+JSON.stringify(profes)+"&num_vetlladors="+num_vetlladors+"&num_acomp="+num_acomp+"&prof_apart="+prof_apart+
    "&comentaris_sort="+comentaris_sort+"&nom_activitat="+nom_activitat+"&lloc_activitat="+lloc_activitat+"&tipus_activitat="+tipus_activitat+"&ambit_activitat="+ambit_activitat+
    "&jornada_activitat="+jornada_activitat+"&objectiu_activitat="+comentaris_objectiu);

    ajax3.onreadystatechange=function() {
		if (ajax3.readyState==4 && ajax3.status==200) {
            alert("ok")
            document.getElementById("form_exc").reset();

			} else {

            }
		}

}


function openTab(evt, tabName, idform) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

  //Muestra las paginas del formulario
  function MostrarActivitat(){
   document.getElementById('sortides').style.display = "none";
   document.getElementById('activitat').style.display = "block";
  }
  function ActivitatEnrere(){
    document.getElementById('sortides').style.display = "block";
    document.getElementById('activitat').style.display = "none";
  }
  function ActivitatSeg(){
    document.getElementById('activitat').style.display = "none";
    document.getElementById('transport').style.display = "block"; 
  }
  
  function TransportEnrere(){
    document.getElementById('activitat').style.display = "block";
    document.getElementById('transport').style.display = "none";
  }
  function TransportSeg(){
    document.getElementById('transport').style.display = "none";
    document.getElementById('costes').style.display = "block"; 
  }
  
  function CostesEnrere(){
    document.getElementById('transport').style.display = "block";
    document.getElementById('costes').style.display = "none";
  }
  
  function PaginacionSortida3(){
      document.getElementById('sortides').style.display = "none";
      document.getElementById('transport').style.display = "block";
  }
  
  function PaginacionSortida4(){
      document.getElementById('sortides').style.display = "none";
      document.getElementById('costes').style.display = "block"; 
  }
  
  function PaginacionActivitat4(){
      document.getElementById('costes').style.display = "block";
      document.getElementById('activitat').style.display = "none";
  }
  
  function PaginacionTransport(){
      document.getElementById('sortides').style.display = "block";
      document.getElementById('transport').style.display = "none";
  }
  
  function PaginacionCostes1(){
      document.getElementById('sortides').style.display = "block";
      document.getElementById('costes').style.display = "none"; 
  }
  
  function PaginacionCostes2(){
      document.getElementById('activitat').style.display = "block";
      document.getElementById('costes').style.display = "none";
  }