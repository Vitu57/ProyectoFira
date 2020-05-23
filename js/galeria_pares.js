
function comprobar_clase() {
    id_alumne = document.getElementById("id_alumne_pare");
    id_pares = document.getElementById("id_pares");
    id_excursion = document.getElementById("id_sortida");

    var ajax3 = objetoAjax();
    ajax3.open("POST", "../services/consulta_galeria.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=c_clase&id_sortida="+id_excursion.value+"&id_alumne="+id_alumne.value+"&id_pares="+id_pares.value);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            console.log(ajax3.responseText);

            //Si el id_excursion y el id_usuari no es correcto redirige a home
            if(ajax3.responseText != 1){
                window.location.replace("../vista/home_pares.php");
            }

        }
    }
}


function cargar_imagenes() {
    var contenedor_img = document.getElementById("div_img");
    id_excursion = document.getElementById("id_sortida").value;

    var ajax3 = objetoAjax();
    var imagen ="";
    ajax3.open("POST", "../services/consulta_galeria.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=ver_img&id_exc="+id_excursion);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            //console.log(ajax3.responseText); 
            var respuesta = JSON.parse(ajax3.responseText);
            ver_nombre_exc();
            imagen += '<h2 class="mt-5 pt-3 text-center">Sortida '+nom_exc+'</h2>';
            for (var i = 0; i < respuesta.length; i++) {
                console.log(respuesta[i]);
                imagen += '<a data-fancybox="gallery" href="../images/galeria/'+respuesta[i].img_path +'"><img class="img_galeria img-fluid" src="../images/galeria/'+respuesta[i].img_path+'"></a>';
            }
            contenedor_img.innerHTML = imagen;
        }
    }

}

  //-------------------------------Minimizar la modal de inserción------------------


function minimizar(){
   
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

//---------------------Para saber el nombre de la excursion por la id------------------
var nom_exc;
function ver_nombre_exc(){
id_excursion = document.getElementById("id_sortida").value;
    var ajax3 = objetoAjax();
    ajax3.open("POST", "../services/consulta_galeria.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=nombre&id_exc="+id_excursion);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
           // console.log(JSON.parse(ajax3.responseText));
            
            nom_exc = JSON.parse(ajax3.responseText);
            nom_exc = nom_exc[0].nom_activitat;
        }
    }

}


//----------------------Insert de la foto con titulo y descr------------------------


//-------------------------Para mover la imagen a la carpeta-----------------------

ver_nombre_exc();
