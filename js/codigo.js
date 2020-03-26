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
    ajax3.open("POST", "../services/insert.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion="+"etapa");
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            var respuesta=JSON.parse(this.responseText);
            for (var i = 0; i < respuesta.length; i++) {
            option += '<option>' + respuesta[i].nom_etapa + '</option>';
            }
            etapa.innerHTML=option;
            select_curs(etapa);
            select_enum(num);
            document.getElementById('fila0').style.display = "block";
            document.getElementById('first').className += " active";
        }
    }

}

function select_enum() {
    /*código a implementar*/
    var lista = [];
    var accion = [];
    lista[1] = document.getElementById("tipus_activitat");
    lista[2] = document.getElementById("ambit_activitat");
    lista[3] = document.getElementById("jornada_activitat");
    var ajax3 = objetoAjax();
    var option;
    accion[1]="tipus_activitat";
    accion[2]="ambit_activitat";
    accion[3]="jornada_activitat";
    for ( var i = 0; i < 4; i++) {
    ajax3.open("POST", "../services/insert.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=enum&column="+accion[i]);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            respuesta=JSON.parse(this.responseText);
            var myJSON = JSON.stringify(this.responseText); 
            //alert(myJSON);
            option="";
            for (var j = 0; j < respuesta.length; j++) {
            option += '<option>' + respuesta[j] + '</option>';
            console.log(option)
            }
            lista[i].innerHTML=option;
            console.log(lista[i].innerHTML=option);
        }
        
    }
}

}

function select_curs() {
    /*código a implementar*/
    var curs = document.getElementById("curs");
    var etapa = document.getElementById("etapa").value;
    var ajax3 = objetoAjax();
    var option;
    ajax3.open("POST", "../services/insert.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion="+"curso"+"&nom_etapa="+etapa);
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            var respuesta2=JSON.parse(this.responseText);
            for (var i = 0; i < respuesta2.length; i++) {

                option += '<option>' + respuesta2[i].nom_classe + '</option>';

            }
            curs.innerHTML=option;
        }
    }

}


function openTab(evt, tabName, subTab, idform) {
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