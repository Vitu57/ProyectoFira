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

window.addEventListener("load", function(event) {
    cargardatos();
    });

function cargardatos(){
    var resultado = document.getElementById("resultado_users");
    var ajax3 = objetoAjax();
    ajax3.open("POST", "../services/consulta_estadistiques.php", true);
    ajax3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax3.send("accion=" + "veure");
    ajax3.onreadystatechange = function () {
        if (ajax3.readyState == 4 && ajax3.status == 200) {
            //console.log(ajax3.responseText); 
            var respuesta = JSON.parse(ajax3.responseText);
            var array_nombre = [];
            var array_datos = [];
            var array_colores = [];
                        for (var i = 0; i < respuesta.length; i++) {
                        var x = Math.floor(Math.random() * 256);
                        var y = Math.floor(Math.random() * 256);
                        var z = Math.floor(Math.random() * 256);

                        array_nombre[i] = respuesta[i].nom_classe;
                        array_datos[i] = respuesta[i].vegades;
                        array_colores[i] = "rgb(" + x + "," + y + "," + z + ")";
            }   
            crearpiechart(array_nombre, array_datos, array_colores);
          }
        }

    }



    function crearpiechart(array_nombre, array_datos, array_colores){
        var ctx= document.getElementById("myChart").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"pie",
            data:{
                labels:array_nombre,
                datasets:[{
                        label:'Num datos',
                        data:array_datos,
                        backgroundColor:array_colores
                }]
            },
            
        });
    }