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


function benvinguda(){

    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
             var mensaje = "Benvingut a l'aplicació de sortides.<br>"; 
             mensaje += "  - Clica en sortides si vols veure, administrar o afegir una sortida.<br>"; 
             mensaje += "  - Clica en usuaris si vols veure, administrar o afegir un usuari.";   

            document.getElementById("contenidoResultado").innerHTML=mensaje;

}

function benvinguda2(){

    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
             var mensaje = "Benvingut a l'aplicació de sortides.<br>"; 
             mensaje += "  - Fes click en sortides per accedir a les diferents opcions de les sortides.<br>";    

            document.getElementById("contenidoResultado").innerHTML=mensaje;

}


function admin1(){

    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                   var mensaje = "- Clica en veure sortides per veure y administrar totes les sortides.<br>"; 
                       mensaje += "- Clica en afegir sortides si vols afegir una nova sortida.";      
                
            document.getElementById("contenidoResultado").innerHTML=mensaje;
}

function admin2(){


    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                   var mensaje = "- Clica en veure usuaris per veure y administrar els usuaris.<br>"; 
                       mensaje += "- Clica en administració profesors per afegir o eliminar clases a un profesor.";      
                
            document.getElementById("contenidoResultado").innerHTML=mensaje;
}

function cocina(){


    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                   var mensaje = "- Fes click en veure sortides per veure totes les sortides y actualitzar l'estat de les comandes.<br>"; 
                          
                
            document.getElementById("contenidoResultado").innerHTML=mensaje;
}

function profesores(){


    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                   var mensaje = "- Fes click en veure sortides per veure, modificar y pasar llista de totes les sortides.<br>";
                       mensaje += "- Fes click en afegir sortida per afegir una nova sortida.";      
                
            document.getElementById("contenidoResultado").innerHTML=mensaje;
}

function enf_dir(){


    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                   var mensaje = "Fes click en veure sortides per veure totes les sortides.<br>";     
                
            document.getElementById("contenidoResultado").innerHTML=mensaje;
}

function secretaria(){


    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                   var mensaje = "Fes click en veure sortides per veure totes les sortides.<br>";     
                
            document.getElementById("contenidoResultado").innerHTML=mensaje;
}


function admin_prof(){

    var modal = document.getElementById("resultado2");
     modal.style.display = "block";
     var span = document.getElementById("close");
  document.getElementById("tituloResultado").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal").value=0;
    }
                  
                   var mensaje = "Aquesta és la pàgina d'administració de profesors.<br>"; 
                       mensaje += "Aqui podràs assignar i treure classes als professors.<br>";  
                
            document.getElementById("contenidoResultado").innerHTML=mensaje;
}

function admin_prof2(){

    var modal = document.getElementById("resultado3");
     modal.style.display = "block";
     var span = document.getElementById("close2");
  document.getElementById("tituloResultado3").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal3").value=0;
    }
                  
                     var mensaje = "Selecciona la clase que vols afegir y prem el botó + per afegir-la <i style='margin:1.3%;' class='fas fa-arrow-down'></i>"; 
                       mensaje += "Selecciona la clase que vols eliminar y prem el botó x per eliminar-la  <i style='margin:1%;' class='fas fa-arrow-down'></i>";
                
            document.getElementById("contenidoResultado3").innerHTML=mensaje;
}

function admin_prof3(){

    var modal = document.getElementById("resultado4");
     modal.style.display = "block";
     var span = document.getElementById("close4");
  document.getElementById("tituloResultado4").innerHTML="";
  span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("comprobarModal4").value=0;
    }
                  
                      var mensaje = "- Utilitza el filtre si vols filtrar per alguna cosa en concret.<br>"; 
                          mensaje += "- Prem el botó veure tots per veure a tots els profesors.<br>";

            document.getElementById("contenidoResultado4").innerHTML=mensaje;
}



