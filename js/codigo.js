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

function exist(campo){
    if (campo == null || typeof campo == 'undefined' ){
        return "hola";
    }else{
        return "adios";
    }
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
                option += '<option value="' + respuesta[i].id_etapa + '">' + respuesta[i].nom_etapa + '</option>';
            }
            etapa.innerHTML = option;
            select_curs();
            select_enum();
            //select_professor();
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

    lista = document.getElementById("ambit_activitat");;
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
// select_curs rellena el lisatdo de cursos recogiondo el valor id 
// que tiene actualmente etapa y haciendo la respectiva consulta
function select_curs(clase, profesor) {
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

                if (clase != undefined && clase != "" && clase == respuesta2[i].id_clase) {
                    option += '<option selected value="' + respuesta2[i].id_clase + '">' + respuesta2[i].nom_classe + '</option>';
                    //console.log(option);
                } else {
                    option += '<option value="' + respuesta2[i].id_clase + '">' + respuesta2[i].nom_classe + '</option>';
                }

            }
            curs.innerHTML = option;
            if (profesor != "" && profesor != undefined) {
                select_professor(profesor);
            }

        }
    }

}

//Devuelve los profesores ordenados por apellido de la base de datos y los muestra en un multiselect
// recogiendo previamente el valor del id curso del select de curs y hace la consulta para mostrar
// los profesores asociados a esa id
function select_professor(profesor) {
    /*código a implementar*/
    if (profesor == undefined){
        profesor = "";
    }
    console.log("este profesor--> " + profesor);
    curs = document.getElementById("curs").value;
    var lista = document.getElementById("lista_prof");
    var ajax3 = objetoAjax();
    var option;
    ajax3.open("POST", "../services/consulta_form_sortides.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=professor&id_clase=" + curs);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            if (respuesta.length === 0) {
                option = '<option value="0">No hi ha professors</option>';
                lista.innerHTML = option;
            } else {
                if (profesor != "") {
                    for (var i = 0; i < respuesta.length; i++) {
                        
                            if (profesor != undefined && profesor != "" && respuesta[i].id_usuari == profesor[i]) {
                                option += '<option selected value="' + respuesta[i].id_usuari + '">' + respuesta[i].nom_usuari + ' ' + respuesta[i].cognom_usuari + '</option>';
                            } else {
                                option += '<option value="' + respuesta[i].id_usuari + '">' + respuesta[i].nom_usuari + ' ' + respuesta[i].cognom_usuari + '</option>';
                            }
                        
                    }
                } else {
                    for (var i = 0; i < respuesta.length; i++) {
                        option += '<option value="' + respuesta[i].id_usuari + '">' + respuesta[i].nom_usuari + ' ' + respuesta[i].cognom_usuari + '</option>';
                    }
                }
                lista.innerHTML = option;
            }
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
                var respuesta = JSON.parse(this.responseText);
                option += '<option value="0">Escollir una opció</option>';
                for (var i = 0; i < respuesta.length; i++) {
                    option += '<option value="' + respuesta[i].id_nom_transport + '">' + respuesta[i].nom_transport + '</option>';
                    console.log(option);
                }
                transport.innerHTML = option;

            }
        }

    }

    //----------------Sortida----------------------
    var codi_sortida = document.getElementById('codi_sortida');
    var inici_sortida = document.getElementById('inici_sortida');
    var final_sortida = document.getElementById('final_sortida');
    var num_alumnes = document.getElementById('num_alumnes');
    var prof_asignat = document.getElementById('professor_asignat');
    var num_vetlladors = document.getElementById('num_vetlladors');
    var num_acomp = document.getElementById('num_acomp');
    var prof_apart = document.getElementById('prof_apart');
    var comentaris_sort = document.getElementById('comentaris_sort');
    //----------------Activitat----------------------
    var nom_activitat = document.getElementById('nom_activitat');
    var lloc_activitat = document.getElementById('lloc_activitat');
    var tipus_activitat = document.getElementById('tipus_activitat');
    var ambit_activitat = document.getElementById('ambit_activitat');
    var jornada_activitat = document.getElementById('jornada_activitat');
    var comentaris_objectiu = document.getElementById('comentaris_objectiu');
    var pers_contacte = document.getElementById('pers_contacte');
    var tlf_contacte = document.getElementById('tlf_contacte');
    var web_contacte = document.getElementById('web_contacte');
    var email_contacte = document.getElementById('email_contacte');
    //----------------Transport----------------------
    var hora_sortida = document.getElementById('hora_sortida');
    var hora_arribada = document.getElementById('hora_arribada');
    var tipus_transport = document.getElementById('tipus_transport');
    var cost_transport = document.getElementById('cost_transport');
    var codi_contacte = document.getElementById('codi_contacte');
    var comentaris_transport = document.getElementById('comentaris_transport');
    //----------------Costos----------------------
    var cost_substitucio = document.getElementById('cost_substitucio');
    var cost_act_ind = document.getElementById('cost_act_ind');
    var cost_ext_act_prof = document.getElementById('cost_ext_act_prof');
    var cost_glob_act = document.getElementById('cost_glob_act');
    var cost_final = document.getElementById('cost_final');
    var preu_fixe = document.getElementById('preu_fixe');
    var preu_sense_topal = document.getElementById('preu_sense_topal');
    var preu_amb_topal = document.getElementById('preu_amb_topal');
    var preu_gestio = document.getElementById('preu_gestio');
    var overhead = document.getElementById('overhead');
    var total_facturar = document.getElementById('total_facturar');
    var pagament_fraccionat = document.getElementById('fraccionat');
    var observacions_fraccionat = document.getElementById('observacions_costos');

    function insert_excursion() {
        var lista = document.querySelectorAll('#lista_prof option:checked');
        var curso = document.getElementById('curs').value;
        var profes = Array.from(lista).map(el => el.value) 
        var ajax3 = objetoAjax();
        ajax3.open("POST", "../services/insert_form_sortides.php", true);
        ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax3.send("persona_contacte=" + pers_contacte.value + "&tlf_contacte=" + tlf_contacte.value + "&web_contacte=" + web_contacte.value + "&email_contacte=" + email_contacte.value +
            "&cost_substitucio=" + cost_substitucio.value + "&cost_act_ind=" + cost_act_ind.value + "&cost_ext_act_prof=" + cost_ext_act_prof.value + "&cost_glob_act=" + cost_glob_act.value + "&cost_final=" + cost_final.value +
            "&preu_fixe=" + preu_fixe.value + "&preu_sense_topal=" + preu_sense_topal.value + "&preu_amb_topal=" + preu_amb_topal.value + "&preu_gestio=" + preu_gestio.value + "&overhead=" + overhead.value +
            "&total_facturar=" + total_facturar.value + "&pagament_fraccionat=" + pagament_fraccionat.value + "&observacions_fraccionat=" + observacions_fraccionat.value + "&hora_sortida=" + hora_sortida.value + "&hora_arribada=" + hora_arribada.value +
            "&tipus_transport=" + tipus_transport.value + "&cost_transport=" + cost_transport.value + "&codi_contacte=" + codi_contacte.value + "&comentaris_transport=" + comentaris_transport.value +
            "&codi_sortida=" + codi_sortida.value + "&inici_sortida=" + inici_sortida.value + "&final_sortida=" + final_sortida.value + "&id_clase=" + curso + "&num_alumnes=" + num_alumnes.value +
            "&prof_asignat=" + prof_asignat.value + "&profes=" + JSON.stringify(profes) + "&num_vetlladors=" + num_vetlladors.value + "&num_acomp=" + num_acomp.value + "&prof_apart=" + prof_apart.value +
            "&comentaris_sort=" + comentaris_sort.value + "&nom_activitat=" + nom_activitat.value + "&lloc_activitat=" + lloc_activitat.value + "&tipus_activitat=" + tipus_activitat.value + "&ambit_activitat=" + ambit_activitat.value +
            "&jornada_activitat=" + jornada_activitat.value + "&objectiu_activitat=" + comentaris_objectiu.value);
        console.log("persona_contacte=" + pers_contacte.value + "&tlf_contacte=" + tlf_contacte.value + "&web_contacte=" + web_contacte.value + "&email_contacte=" + email_contacte.value +
        "&cost_substitucio=" + cost_substitucio.value + "&cost_act_ind=" + cost_act_ind.value + "&cost_ext_act_prof=" + cost_ext_act_prof.value + "&cost_glob_act=" + cost_glob_act.value + "&cost_final=" + cost_final.value +
        "&preu_fixe=" + preu_fixe.value + "&preu_sense_topal=" + preu_sense_topal.value + "&preu_amb_topal=" + preu_amb_topal.value + "&preu_gestio=" + preu_gestio.value + "&overhead=" + overhead.value +
        "&total_facturar=" + total_facturar.value + "&pagament_fraccionat=" + pagament_fraccionat.value + "&observacions_fraccionat=" + observacions_fraccionat.value + "&hora_sortida=" + hora_sortida.value + "&hora_arribada=" + hora_arribada.value +
        "&tipus_transport=" + tipus_transport.value + "&cost_transport=" + cost_transport.value + "&codi_contacte=" + codi_contacte.value + "&comentaris_transport=" + comentaris_transport.value +
        "&codi_sortida=" + codi_sortida.value + "&inici_sortida=" + inici_sortida.value + "&final_sortida=" + final_sortida.value + "&id_clase=" + curso + "&num_alumnes=" + num_alumnes.value +
        "&prof_asignat=" + prof_asignat.value + "&profes=" + JSON.stringify(profes) + "&num_vetlladors=" + num_vetlladors.value + "&num_acomp=" + num_acomp.value + "&prof_apart=" + prof_apart.value +
        "&comentaris_sort=" + comentaris_sort.value + "&nom_activitat=" + nom_activitat.value + "&lloc_activitat=" + lloc_activitat.value + "&tipus_activitat=" + tipus_activitat.value + "&ambit_activitat=" + ambit_activitat.value +
        "&jornada_activitat=" + jornada_activitat.value + "&objectiu_activitat=" + comentaris_objectiu.value)

        ajax3.onreadystatechange = function () {
            if (ajax3.readyState == 4 && ajax3.status == 200) {
                //alert("ok")
                mensaje_insert_ok();
                PaginacionCostes1();
                document.getElementById("form_exc").reset();

            } else {

            }
        }

    }

    function update() {
        var lista = document.querySelectorAll('#lista_prof option:checked');
        var curso = document.getElementById('curs').value;
        var profes = Array.from(lista).map(el => el.value) 
        var ajax3 = objetoAjax();
        ajax3.open("POST", "../services/update_form_sortida.php", true);
        ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax3.send("id_activitat=" + id_activitat + "&id_contacte_activitat=" + id_contacte_activitat + "&persona_contacte=" + pers_contacte.value + "&tlf_contacte=" + tlf_contacte.value + "&web_contacte=" + web_contacte.value + "&email_contacte=" + email_contacte.value +
            "&id_preus=" + id_preus + "&cost_substitucio=" + cost_substitucio.value + "&cost_act_ind=" + cost_act_ind.value + "&cost_ext_act_prof=" + cost_ext_act_prof.value + "&cost_glob_act=" + cost_glob_act.value + "&cost_final=" + cost_final.value +
            "&preu_fixe=" + preu_fixe.value + "&preu_sense_topal=" + preu_sense_topal.value + "&preu_amb_topal=" + preu_amb_topal.value + "&preu_gestio=" + preu_gestio.value + "&overhead=" + overhead.value +
            "&total_facturar=" + total_facturar.value + "&pagament_fraccionat=" + pagament_fraccionat.value + "&observacions_fraccionat=" + observacions_fraccionat.value + "&hora_sortida=" + hora_sortida.value + "&hora_arribada=" + hora_arribada.value +
            "&tipus_transport=" + tipus_transport.value + "&cost_transport=" + cost_transport.value + "&codi_contacte=" + codi_contacte.value + "&comentaris_transport=" + comentaris_transport.value +
            "&codi_sortida=" + codi_sortida.value + "&inici_sortida=" + inici_sortida.value + "&final_sortida=" + final_sortida.value + "&id_clase=" + curso + "&num_alumnes=" + num_alumnes.value +
            "&prof_asignat=" + prof_asignat.value + "&id_sortida=" + id_sortida + "&id_del_prof=" + id_sort_prof + "&profes=" + JSON.stringify(profes) + "&num_vetlladors=" + num_vetlladors.value + "&num_acomp=" + num_acomp.value + "&prof_apart=" + prof_apart.value +
            "&comentaris_sort=" + comentaris_sort.value + "&nom_activitat=" + nom_activitat.value + "&lloc_activitat=" + lloc_activitat.value + "&tipus_activitat=" + tipus_activitat.value + "&ambit_activitat=" + ambit_activitat.value +
            "&jornada_activitat=" + jornada_activitat.value + "&objectiu_activitat=" + comentaris_objectiu.value);
        console.log("id_activitat=" + id_activitat + "&id_contacte_activitat=" + id_contacte_activitat + "&persona_contacte=" + pers_contacte.value + "&tlf_contacte=" + tlf_contacte.value + "&web_contacte=" + web_contacte.value + "&email_contacte=" + email_contacte.value +
        "&id_preus=" + id_preus + "&cost_substitucio=" + cost_substitucio.value + "&cost_act_ind=" + cost_act_ind.value + "&cost_ext_act_prof=" + cost_ext_act_prof.value + "&cost_glob_act=" + cost_glob_act.value + "&cost_final=" + cost_final.value +
        "&preu_fixe=" + preu_fixe.value + "&preu_sense_topal=" + preu_sense_topal.value + "&preu_amb_topal=" + preu_amb_topal.value + "&preu_gestio=" + preu_gestio.value + "&overhead=" + overhead.value +
        "&total_facturar=" + total_facturar.value + "&pagament_fraccionat=" + pagament_fraccionat.value + "&observacions_fraccionat=" + observacions_fraccionat.value + "&hora_sortida=" + hora_sortida.value + "&hora_arribada=" + hora_arribada.value +
        "&tipus_transport=" + tipus_transport.value + "&cost_transport=" + cost_transport.value + "&codi_contacte=" + codi_contacte.value + "&comentaris_transport=" + comentaris_transport.value +
        "&codi_sortida=" + codi_sortida.value + "&inici_sortida=" + inici_sortida.value + "&final_sortida=" + final_sortida.value + "&id_clase=" + curso + "&num_alumnes=" + num_alumnes.value +
        "&prof_asignat=" + prof_asignat.value + "&id_sortida=" + id_sortida + "&id_del_prof=" + id_sort_prof + "&profes=" + JSON.stringify(profes) + "&num_vetlladors=" + num_vetlladors.value + "&num_acomp=" + num_acomp.value + "&prof_apart=" + prof_apart.value +
        "&comentaris_sort=" + comentaris_sort.value + "&nom_activitat=" + nom_activitat.value + "&lloc_activitat=" + lloc_activitat.value + "&tipus_activitat=" + tipus_activitat.value + "&ambit_activitat=" + ambit_activitat.value +
        "&jornada_activitat=" + jornada_activitat.value + "&objectiu_activitat=" + comentaris_objectiu.value);
        
    }


    var url = window.location.pathname;
    if (url.match('form_update_excursiones.php')) {
        setTimeout(function () { mostrar_excursion() }, 2000);
    }

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var id_sortida = getParameterByName('id_excursion');
    var profesores = [];
    //rellene los campos del formulario de modificar sortida
    var id_contacte_activitat;
    var id_preus;
    var id_activitat;
    var id_sort_prof;

    function mostrar_excursion() {
        var ajax3 = objetoAjax();
        ajax3.open("POST", "../services/consulta_form_sortides.php", true);
        ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax3.send("accion=mostrar_update&id_sortida="+id_sortida);
        ajax3.onreadystatechange = function () {
            //vamos configurando los valores de cada campo segun lo que devuelva JSON
            if (ajax3.readyState == 4 && ajax3.status == 200) {
                var respuesta = JSON.parse(this.responseText);
                codi_sortida.value = respuesta[0].codi_sortida;
                inici_sortida.value = respuesta[0].inici_sortida;
                final_sortida.value = respuesta[0].final_sortida;
                //aqui definimos que del listado que tiene etapa cargado seleccione la opcion que contenga el value = id.etapa 
                etapa.value = respuesta[0].id_etapa;
                //llamamos a la función select_curs() (manualmente ya que el onchange de etapa no actua si no lo cambia un usuario) 
                //que recoje el valor actual de etapa y hace la conulta para mostrar la lista de cursos
                for (var i = 0; i < respuesta.length; i++) {
                    profesores.push(respuesta[i].id_profesor);
                    console.log(profesores);
                }
                select_curs(respuesta[0].id_clase, profesores);
                //Aqui le decimos que del listado que tiene el curso seleccione el option que tiene el value = id.clase
                //curs.value = respuesta[0].id_clase;
                num_alumnes.value = respuesta[0].numero_alumnes;
                //se llama a la funcion select_professor que recoja el valor id actual de curso y muestre los profes que hay





                //bucle que va seleccionando los profesores que hay asignado a la excursion segun el registro
                /*for (var i = 0; i < respuesta.length; i++) {
                    for (var j = 0; j < lista.length; j++) {
                        if(lista.options[j].value == respuesta[i].id_profesor){
                        lista[j].selected = true;
                        }
                    }
                }*/
                id_contacte_activitat = respuesta[0].id_contacte_activitat;
                id_preus = respuesta[0].id_preus;
                id_activitat = respuesta[0].id_activitat;
                id_sort_prof = respuesta[0].id_excursion;
                prof_asignat.value = respuesta[0].profesor_asignat;
                num_vetlladors.value = respuesta[0].n_vetlladors;
                num_acomp.value = respuesta[0].n_acompanyants;
                prof_apart.value = respuesta[0].profes_a_part;
                comentaris_sort.value = respuesta[0].observacions_sortida;
                nom_activitat.value = respuesta[0].nom_activitat;
                lloc_activitat.value = respuesta[0].lloc_activitat;
                tipus_activitat.value = respuesta[0].tipus_activitat;
                ambit_activitat.value = respuesta[0].ambit_activitat;
                jornada_activitat.value = respuesta[0].jornada_activitat;
                comentaris_objectiu.value = respuesta[0].objectiu_activitat;
                pers_contacte.value = respuesta[0].persona_contacte;
                tlf_contacte.value = respuesta[0].telefon_contacte;
                web_contacte.value = respuesta[0].web_contacte;
                email_contacte.value = respuesta[0].email_contacte;
                hora_sortida.value = respuesta[0].hora_sortida;
                hora_arribada.value = respuesta[0].hora_arribada;
                tipus_transport.value = respuesta[0].id_nom_transport;
                cost_transport.value = respuesta[0].cost_transport;
                codi_contacte.value = respuesta[0].codi_contacte;
                comentaris_transport.value = respuesta[0].comentaris_transport;
                cost_substitucio.value = respuesta[0].cost_substitucio;
                cost_act_ind.value = respuesta[0].cost_activitat_individual;
                cost_ext_act_prof.value = respuesta[0].cost_extra_activitat_profe;
                cost_glob_act.value = respuesta[0].cost_global_activitat;
                cost_final.value = respuesta[0].cost_final;
                preu_fixe.value = respuesta[0].preu_fixe;
                preu_sense_topal.value = respuesta[0].preu_sense_topal;
                preu_amb_topal.value = respuesta[0].preu_amb_topal;
                preu_gestio.value = respuesta[0].preu_gestio;
                overhead.value = respuesta[0].overhead;
                total_facturar.value = respuesta[0].total_facturar;
                pagament_fraccionat.value = respuesta[0].pagament_fraccionat;
                observacions_fraccionat.value = respuesta[0].observacio_fraccionat;


            }

        }
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

  //Función que valida la inserción de excursiones, si los datos obligatorios
  //no están rellenos, hace un return false y marca los apartados de color rojo
  function validar_insercion(){
    //alert("entra");
  var ok = 1;
  var inici_sort = document.getElementById("inici_sortida");
  var final_sort = document.getElementById("final_sortida");
  var etapa = document.getElementById("etapa");
  
  var curs = document.getElementById("curs");
  //alert(curs.value);
  var jornada_act = document.getElementById("jornada_activitat");

  var tipus_transp = document.getElementById("tipus_transport");
  //alert(inici_sort.value);
  //alert("console log");
  //alert(inici_sort.value);
  if(inici_sort.value == 0){
      //alert("inici_sort");
      inici_sort.style.borderColor = "red";

      document.getElementById("btn1-1").style.border = "2px solid red";
      document.getElementById("btn1-3").style.border = "2px solid red";
      document.getElementById("btn1-4").style.border = "2px solid red";
      document.getElementById("btn1-2").style.border = "2px solid red";
      
      ok = 0;
  }

  if(final_sort.value == 0){
      //alert("final_sort");
      final_sort.style.borderColor = "red";
      
      document.getElementById("btn1-1").style.border = "2px solid red";
      document.getElementById("btn1-3").style.border = "2px solid red";
      document.getElementById("btn1-4").style.border = "2px solid red";
      document.getElementById("btn1-2").style.border = "2px solid red";
      
      ok = 0;
  }

  if(etapa.value == 0){
      //alert("inicietapa_sort");
      etapa.style.borderColor = "red";
      
      document.getElementById("btn1-1").style.border = "2px solid red";
      document.getElementById("btn1-3").style.border = "2px solid red";
      document.getElementById("btn1-4").style.border = "2px solid red";
      document.getElementById("btn1-2").style.border = "2px solid red";

      ok = 0;
  }

  if(curs.value == 0){
      //alert("curs");
      curs.style.borderColor = "red";

      document.getElementById("btn1-1").style.border = "2px solid red";
      document.getElementById("btn1-3").style.border = "2px solid red";
      document.getElementById("btn1-4").style.border = "2px solid red";
      document.getElementById("btn1-2").style.border = "2px solid red";
     
      ok = 0;
  }

  if(jornada_act.value == 0){
     // alert("jornada_act");
      jornada_act.style.borderColor = "red";

      document.getElementById("btn2-1").style.border = "2px solid red";
      document.getElementById("btn2-3").style.border = "2px solid red";
      document.getElementById("btn2-4").style.border = "2px solid red";
      document.getElementById("btn2-2").style.border = "2px solid red";
      
      ok = 0;
  }

  if(tipus_transp.value == 0){
      //alert("tipus_transp");
      tipus_transp.style.borderColor = "red";
      
      document.getElementById("btn3-1").style.border = "2px solid red";
      document.getElementById("btn3-3").style.border = "2px solid red";
      document.getElementById("btn3-4").style.border = "2px solid red";
      document.getElementById("btn3-2").style.border = "2px solid red";

      ok = 0;
  }

  if (ok == 1){
      insert_excursion();
      //alert("Insertaría datos");

  }else if(ok = 0){
      return false;
  }
  }

  function mensaje_insert_ok(){
    toastr["success"]("Ja pots visualitzar la excursió en el apartat corresponent.", "Agregat correctament!")

        toastr.options = {
            "closeButton": false,
            "debug": false,
               "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
}
  }
  function mensaje_insert_ok_2(){
    toastr["success"]("Actualitzat correctament!")

        toastr.options = {
            "closeButton": false,
            "debug": false,
               "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
}
  }