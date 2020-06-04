

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
            imagen += '<h2 class="mt-5 pt-3 text-center">Sortida '+nom_exc+'';
            imagen += '<a class="float-right mr-3" href=# onclick="maximizar();"> <i class="far fa-1x fa-times-circle text-dark"></i> </a></h2><br>'
            
            for (var i = 0; i < respuesta.length; i++) {
                console.log(respuesta[i]);
                imagen += '<a data-fancybox="gallery" href="../images/galeria/'+respuesta[i].img_path +'"><img class="img_galeria img-fluid" src="../images/galeria/'+respuesta[i].img_path+'"></a><button><a href="../images/galeria/'+respuesta[i].img_path +'" download="'+respuesta[i].img_path +'">Descargar Foto</a></button>';
            }
            contenedor_img.innerHTML = imagen;
        }
    }

}

//Jquery para en el caso de que sean varias fotos, asociarlas a la posicion del array
var nombres_fotos = [];
var numero_fotos;
document.getElementById('fotos').addEventListener('change', function selectedFileChanged() {
    console.log(this.files);
    //Comprobamos cuantas fotos se van a subir
    numero_fotos = this.files.length;
    
    //Tener los nombres de cada foto
    
    for (var i=0; i<numero_fotos; i++) {
        //console.log(this.files[i].name);
        nombres_fotos[i]=this.files[i].name;
    }

    //console.log(nombres_fotos);

  });

  //-------------------------------Minimizar la modal de inserción------------------
function minimizar(){
    const div_form =  document.getElementById('usuaris');
    const div_img = document.getElementById('div_img');
    div_form.classList.add('animated', 'bounceOutUp');
    div_form.addEventListener('animationend', ocultar_form);

    function ocultar_form(){
        div_form.classList.add('d-none');
        div_form.classList.remove('animated', 'bounceOutUp');
        
        div_img.classList.remove('d-none');
        div_img.classList.add('animated', 'fadeIn');
    
        div_img.addEventListener('animationend', quitar_animacion);
        div_form.removeEventListener('animationend', ocultar_form);
        
        function quitar_animacion(){
            div_img.classList.remove('animated', 'fadeIn');
            div_img.removeEventListener('animationend', quitar_animacion);
        }


    }
}



//--------------------------------Maximizar la modal de inserción---------------------
function maximizar(){
    const div_form =  document.getElementById('usuaris');
    const div_img = document.getElementById('div_img');

    div_img.classList.add('animated', 'fadeOut');

    
    
    div_img.addEventListener('animationend', ocultar_img); 

    function ocultar_img(){
        div_img.classList.add('d-none');
        div_img.classList.remove('animated', 'fadeOut');

        div_form.classList.remove('d-none');
        div_form.classList.add('animated', 'bounceInDown');

        div_form.addEventListener('animationend', quitar_animacion2);
        div_img.removeEventListener('animationend', ocultar_img); 

        function quitar_animacion2(){
            div_form.classList.remove('animated', 'bounceOutDown');

            div_form.removeEventListener('animationend', quitar_animacion2);
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

//----------------------------Validar formulario de la inserción--------------------
function validar_galeria(){
    
    var titolfotos = document.getElementById("titolfotos");
    var descrip = document.getElementById("resumfotos");
    var id_sortida = document.getElementById("id_sortida");
    var fotos = document.getElementById("fotos");
    var ok = 1;

    if (titolfotos.value == ""){
        titolfotos.style.border = "2px solid red";
        console.log("titulo mal");
        ok = 0;
    }else{
        titolfotos.style.border ="";
    }

    if(fotos.files.length <=0){
        fotos.style.border = "1px solid red";
        console.log("no hay archivo seleccionado");
        ok = 0;
    }else{
        fotos.style.border = "";
    }

    if (ok == 1){

        insert_galeria(titolfotos.value, descrip.value, id_sortida.value);
    }

    return false;
}

//----------------------Insert de la foto con titulo y descr------------------------
function insert_galeria(titolfotos,descrip,id_sortida){
    ver_nombre_exc();
    var ajax3 = objetoAjax();
    ajax3.open("POST", "../services/consulta_galeria.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=insert&titol="+titolfotos+"&descrip="+descrip+"&nom_exc="+nom_exc+"&id_sortida="+id_sortida+"&nom_fotos="+nombres_fotos);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            console.log(ajax3.responseText); 
            alert("funcionando");
            cargar_imagenes();
            limpiar_form();
        }
    }

}

//-------------------------Para mover la imagen a la carpeta-----------------------

ver_nombre_exc();

var form = document.querySelector('form');

var request = new XMLHttpRequest();

request.upload.addEventListener('load',function(e){
    console.log('imagen movida correctamente niño');
},false);


form.addEventListener('submit', function(e){
    e.preventDefault();
    
    var formData = new FormData(form);

    request.open('post','../services/consulta_galeria.php?accion=mover&nom_exc='+nom_exc,true);
    request.send(formData);
},false);

function limpiar_form(){
    document.getElementById("titolfotos").value ="";
    document.getElementById("resumfotos").value ="";
    document.getElementById("fotos").value ="";

}