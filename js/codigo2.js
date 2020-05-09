var domuser = document.getElementById("mailusu");
domuser.addEventListener("focusout", validarusuario);

var domtipus = document.getElementById("tipususu");
domtipus.addEventListener("change", verclass);



function validarusuario(){
    //alert("test");
    usuario = document.getElementById("mailusu");
    alerta = document.getElementById("usuarioexistente");
    okusuario = document.getElementById("okusuario");
    var ajax3 = objetoAjax();
    var option;
    ajax3.open("POST", "../services/consulta_form_usuaris.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=checkusu"+"&usuario="+usuario.value);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            //alert("Funcionando"); 
            //console.log(ajax3.responseText); 
            
            resultado = (ajax3.responseText);
            
            if (resultado == "ko"){
                //alert("Usuario existente");
                alerta.classList.remove("d-none");
                alerta.classList.add("mb-2");
                usuario.classList.remove("mb-4");
                usuario.style.border="1px solid red";
                okusuario.value="ko";

            }else{
                alerta.classList.add("d-none");
                alerta.classList.remove("mb-2");
                usuario.classList.add("mb-4");
                usuario.style.border="";
                okusuario.value="ok";
            }
        }
    }
}

function verclass(){
selectclass = document.getElementById("selectclass");

tipus = document.getElementById("tipususu").selectedIndex;
divclass = document.getElementById("divclass");

usuari = document.getElementById("mailusu");
pass1 = document.getElementById("passwd1");
pass2 = document.getElementById("passwd2");
comput = document.getElementById("computableusu");

//Si el tipus de usuari es profesor o alumne, mostra un desplegable per la clase.
if (tipus == 2 || tipus == 7){
    divclass.classList.remove("d-none");
    selectclass.selectedIndex = "0";
}else{
    divclass.classList.add("d-none");
    selectclass.selectedIndex = "29";
}
//Si es alumne, deshabilita l'usuari, contrasenya i repeteix contraseña
if (tipus == 7){
    usuari.disabled = true;
    pass1.disabled = true;
    pass2.disabled = true;
    comput.disabled = true;

    usuari.value = "Alumne";
    pass1.value = "Alumne";
    pass2.value = "Alumne";
    comput.checked = false;

    usuari.style.cursor = "not-allowed";
    pass1.style.cursor = "not-allowed";
    pass2.style.cursor = "not-allowed";
    comput.style.cursor = "not-allowed";
}else{
    usuari.disabled = false;
    pass1.disabled = false;
    pass2.disabled = false;
    comput.disabled = false;

    usuari.style.cursor = "";
    pass1.style.cursor = "";
    pass2.style.cursor = "";
    comput.style.cursor = "";  
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

  function select_tipus_usuari() {
    /*código a implementar*/
    
    var tipus = document.getElementById("tipususu");
    var ajax3 = objetoAjax();
    var option;
    var tipus2 = document.getElementById("tipus_filtre");
    ajax3.open("POST", "../services/consulta_form_usuaris.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=" + "tipus");
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            //console.log(ajax3.responseText); 
            var respuesta = JSON.parse(ajax3.responseText);
            option += '<option value="0" disabled selected>Escollir tipus *</option>';
            for (var i = 0; i < respuesta.length; i++) {
                option += '<option value="' + respuesta[i].id_tipus_usuari + '">' + respuesta[i].nom_tipus + '</option>';
            }
            tipus.innerHTML = option;
            if (typeof(tipus2) != 'undefined' && tipus2 != null)
            {
                tipus2.innerHTML = option;
            }
            select_clase();
        }
    }

}

function select_clase() {
    /*código a implementar*/
    //alert("hola");
    var classe = document.getElementById("selectclass");
    var ajax3 = objetoAjax();
    var option;
    ajax3.open("POST", "../services/consulta_form_usuaris.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=" + "class");
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            //console.log(ajax3.responseText); 
            var respuesta = JSON.parse(ajax3.responseText);
            option += '<option value="0" disabled selected>Escollir classe *</option>';
            for (var i = 0; i < respuesta.length; i++) {
                option += '<option value="' + respuesta[i].id_clase + '">' + respuesta[i].nom_classe + '</option>';
            }
            classe.innerHTML = option;
            classe.selectedIndex = "29";
        }
    }

}

function validar_form_users(){
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

if (ok == 1){
   //alert("correcto");
    insertar_user(nom.value,cognom.value,mail.value,tipususu.value,pass1.value, siei, computable, classe.value);
}

return false;
}

function insertar_user(nom, cognom, mail, tipus, pass, siei, computable, clase){
    //Comprobamos si los checkbox de SIEI están checkeados o no, si lo están cambiamos el nombre

    //alert(nom +" "+ cognom +" "+ mail +" "+ tipus +" "+ pass +" "+ siei +" "+ computable);
    accion = "insert";

  var ajax3 = objetoAjax();
    var option;
    ajax3.open("POST", "../services/consulta_form_usuaris.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion="+accion+"&nom="+nom+"&cognom="+cognom+"&mail="+mail+"&tipus="+tipus+"&pass="+pass+"&siei="+siei+"&computable="+computable+"&clase="+clase);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            alert("Funcionando"); 
        console.log(ajax3.responseText); 

        }
    }
    //alert("nom = "+nom+" cognom = "+cognom+" mail = "+mail+" tipus = "+tipus+" pass = "+pass+" siei = "+siei+" computable = "+computable);
}