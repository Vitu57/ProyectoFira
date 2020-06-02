//Listeners para el filtro de la tabla de usuarios al onkeydown
var id_user;

window.addEventListener("load", function(event) {
    var user_filtre = document.getElementById("user_filtre");
    var nom_filtre = document.getElementById("nom_filtre");
    var cognom_filtre = document.getElementById("cognom_filtre");
    var tipus_filtre = document.getElementById("tipus_filtre");

    user_filtre.addEventListener("keyup", filtroautomatico);
    nom_filtre.addEventListener("keyup", filtroautomatico);
    cognom_filtre.addEventListener("keyup", filtroautomatico);
    tipus_filtre.addEventListener("change", filtroautomatico);

  });


function filtroautomatico(){
    var id_user2 = document.getElementById("id_user").value;

    var user = document.getElementById("user_filtre").value;
    var nom = document.getElementById("nom_filtre").value;
    var cognom = document.getElementById("cognom_filtre").value;
    var tipusx = document.getElementById("tipus_filtre").value;
    
    if (tipusx == '0'){
        var tipusx = '%';
    }

    var resultado = document.getElementById("resultado_users");
    var ajax3 = objetoAjax();
    var usuarios = "";
    ajax3.open("POST", "../services/consulta_veure_usuaris.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=filtrar&user="+user+"&nom="+nom+"&cognom="+cognom+"&tipus="+tipusx);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            //console.log(ajax3.responseText); 
            var respuesta = JSON.parse(ajax3.responseText);
            usuarios += '<table id="table-id" class="table table-bordered" style="background-color: rgba(255,255,255,1);"> <thread><thead class="thead-dark"><tr><th scope="col">Opcions</th><th scope="col">UserName</th><th scope="col">Nom</th><th scope="col">Cognom</th><th scope="col">Computable</th><th scope="col">Tipus d\'usuari</th></tr></thead><tbody>';
                                    for (var i = 0; i < respuesta.length; i++) {
                usuarios += '<tr><th scope="row">';
            if(id_user2 == respuesta[i].id_usuari){
                usuarios +='<a><i class="fas fa-2x fa-trash-alt text-secondary">';
            }else{
                usuarios +='<a href=# onclick="eliminar('+respuesta[i].id_usuari+')"><i class="fas fa-2x fa-trash-alt text-danger">';
            }
            usuarios +='</i></a><a href=# onclick="modificar('+respuesta[i].id_usuari+','+respuesta[i].id_tipus_usuari+')" class="ml-2 "><i class="fa-2x text-info fas fa-user-edit"></i></a></th><td>'+respuesta[i].usuari+'</td><td>'+respuesta[i].nom_usuari+'</td><td>'+respuesta[i].cognom_usuari+'</td><td>'+respuesta[i].computable+'</td><td>'+respuesta[i].nom_tipus+'</td></tr>';
            }
            usuarios += '</tbody></table>';
            resultado.innerHTML = usuarios;
        }
    }
    }


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

function ver_usuarios(id_user) {
    /*código a implementar*/
    id_user = id_user;
   
    var resultado = document.getElementById("resultado_users");
    var ajax3 = objetoAjax();
    var usuarios = "";
    ajax3.open("POST", "../services/consulta_veure_usuaris.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=" + "veure");
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            //console.log(ajax3.responseText); 
            var respuesta = JSON.parse(ajax3.responseText);
            usuarios += '<table id="table-id" class="table table-bordered" style="background-color: rgba(255,255,255,1);"> <thread><thead class="thead-dark"><tr><th scope="col">Opcions</th><th scope="col">UserName</th><th scope="col">Nom</th><th scope="col">Cognom</th><th scope="col">Computable</th><th scope="col">Tipus d\'usuari</th></tr></thead><tbody>';
                        for (var i = 0; i < respuesta.length; i++) {
                usuarios += '<tr><th scope="row">';
            if(id_user == respuesta[i].id_usuari){
                usuarios +='<a><i class="fas fa-2x fa-trash-alt text-secondary">';
            }else{
                usuarios +='<a href=# onclick="eliminar('+respuesta[i].id_usuari+')"><i class="fas fa-2x fa-trash-alt text-danger">';
            }
            usuarios +='</i></a><a href=# onclick="modificar('+respuesta[i].id_usuari+','+respuesta[i].id_tipus_usuari+')" class="ml-2 "><i class="fa-2x text-info fas fa-user-edit"></i></a></th><td>'+respuesta[i].usuari+'</td><td>'+respuesta[i].nom_usuari+'</td><td>'+respuesta[i].cognom_usuari+'</td><td>'+respuesta[i].computable+'</td><td>'+respuesta[i].nom_tipus+'</td></tr>';
            }
            usuarios += '</tbody></table>';
            resultado.innerHTML = usuarios;
        }
    }

}

function eliminar(id_user){
    
    var message = document.getElementById("message");

    if (id_user==13) {
        
        var mensaje = "<h5 style='color:red'>No es pot esborrar l'administrador</h5>";

    }else{
    var mensaje = "<h5 style='color:green'>Esborrat correctament</h5>";
    var ajax3 = objetoAjax();
    ajax3.open("POST", "../services/consulta_veure_usuaris.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=eliminar&id_user="+id_user);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            console.log(ajax3.responseText);
            ver_usuarios();
        }
    }

}
message.innerHTML=mensaje;
}


function modificar(id_usu, id_tipus_usu){
    var form_modificar = document.getElementById("form_modificar");
    var resultado_users = document.getElementById("resultado");

    form_modificar.classList.remove("d-none");
    resultado_users.classList.add("d-none");


    //Consulta para pillar los datos del usuari con ese id
    var ajax3 = objetoAjax();
    ajax3.open("POST", "../services/consulta_veure_usuaris.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=agafar_dades&id_user="+id_usu);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            respuesta = JSON.parse(ajax3.responseText);
            console.log(respuesta);
            document.getElementById("nombreusu").value = respuesta[0].nom_usuari;
            document.getElementById("apellidosusu").value = respuesta[0].cognom_usuari;
            document.getElementById("mailusu").value = respuesta[0].usuari;
            document.getElementById("selectclass").selectedIndex = respuesta[0].id_clase;
            document.getElementById("tipususu").selectedIndex = respuesta[0].id_tipus_usuari;
            document.getElementById("id_usu").value = id_usu;

            $compucheck = "";
            if(respuesta[0].computable == "no"){
                $compucheck = false;
            }else{
                $compucheck = true;  
            }

            $sieicheck = "";
            if(respuesta[0].siei == "si"){
                $sieicheck = true;
            }else{
                $sieicheck = false;  
            }



            document.getElementById("sieiusu").checked = $sieicheck;
            document.getElementById("computableusu").checked = $compucheck;

        }
    }

}

function validar_form_users2(){
    //Recogemos el valor de los inputs del formulario
var passok = 1;
var ok = 1;
var nom =  document.getElementById("nombreusu");
var cognom =  document.getElementById("apellidosusu");
var mail =  document.getElementById("mailusu");
var tipususu =  document.getElementById("tipususu");
var classe = document.getElementById("selectclass");
var pass1 = document.getElementById("passwd1");
var pass2 =  document.getElementById("passwd2");
var siei =  document.getElementById("sieiusu").checked;
var computable =  document.getElementById("computableusu").checked;
var okusuario = document.getElementById("okusuario").value;

var passdiferente = document.getElementById("passdiferente");

var numapellidos = document.getElementById("numapellidos");
//Validar que los campos obligatorios no estén vacíos 
//Nombre
if (okusuario == "ko"){
    ok = 0;
}
if (nom.value == ""){
    nom.style.border="1px solid red";
    ok = 0;
}else{
    nom.style.border="";
}
//Apellido
if (cognom.value == ""){
    cognom.style.border="1px solid red";
    ok = 0;
}else{
    //Verificar que solo haya dos apellidos: 
    var numcognom = cognom.value.split (" ");

	//Contamos todos los trozos de cadenas que existen
    var palabrascognom = numcognom.length;
    if (palabrascognom > 2){
        cognom.style.border="1px solid red";
        ok = 0;
        numapellidos.classList.remove("d-none");
        numapellidos.classList.add("mb-2");
        cognom.classList.remove("mb-4");
    }else{
        numapellidos.classList.add("d-none");
        numapellidos.classList.remove("mb-2");
        cognom.classList.add("mb-4");
        cognom.style.border="";
    }
}

//Correo/usuario
if (mail.value == ""){
    mail.style.border="1px solid red";
    ok = 0;
}else{
    if (okusuario == "ok"){
    mail.style.border="";
    }
}

//Tipo de usuario
if (tipususu.value == "0"){
    tipususu.style.border="1px solid red";
    ok = 0;
}else{
    tipususu.style.border="";
}

//En el caso de que sea profesor/alumno, que haya seleccionado clase.
if (classe.value == "0"){
    classe.style.border="1px solid red";
    ok = 0;
}else{
    classe.style.border="";
}


//Contraseña 
if (pass1.value == ""){
    pass1.style.border="1px solid red";
    ok = 0;
    passok = 0;
}else{
    pass1.style.border="";
}

if (pass2.value == ""){
    pass2.style.border="1px solid red";
    ok = 0;
    passok = 0;
}else{
    pass2.style.border="";
}

//Validacion de las dos contraseñas, si están vacías o si no.

if (passok == 1 && pass1.value != pass2.value){
    pass2.style.border="1px solid red";
    passdiferente.classList.remove("d-none");
    ok = 0;
    }else{
    passdiferente.classList.add("d-none");
    }
id_usu = document.getElementById("id_usu").value;

if (ok == 1){
   //alert(" " +id_usu + " " +nom.value+ " " +cognom.value + " " +mail.value + " " +tipususu.value + " " +pass1.value + " " +siei + " " +computable + " " +classe.value);

    actualizar_user(id_usu, nom.value,cognom.value,mail.value,tipususu.value,pass1.value, siei, computable, classe.value);
}
return false;
}


function actualizar_user(id_usu, nom, cognom, mail, tipus, pass, siei, computable, clase){

    var ajax3 = objetoAjax();

    //alert (nom, cognom, mail, tipus, pass, siei, computable, clase);
    ajax3.open("POST", "../services/consulta_veure_usuaris.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=actualizar&nom="+nom+"&cognom="+cognom+"&id_usu="+id_usu+"&mail="+mail+"&tipus="+tipus+"&pass="+pass+"&siei="+siei+"&computable="+computable+"&clase="+clase);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            console.log(ajax3.responseText);
            ver_usuarios();
            alert("Metido correctamente");
        }
    }

}