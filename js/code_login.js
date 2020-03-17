
//Funcion para validar el formulario
function validar_login(){
//Metemos lo que serían los dos inputs en variables
   var username = document.getElementById("username");
   var password = document.getElementById("password");

   //Comparamos si los valores están rellenos, para que en el caso de que tengan el borde rojo puesto, quitarlo.
   if(username.value != ""){
    username.style.borderColor="";
   }

   if(password.value != ""){
    password.style.borderColor="";
   }
   

//Comparamos si están vacíos y en el caso de que esté, ponemos un borde rojo y hacemos un return false
   if(username.value == "" & password.value == ""){
    username.style.borderColor="red";
    password.style.borderColor = "red";
    return false;
   }else{

       if(username.value == ""){
        alert("Contraseña vacía");
           username.style.borderColor = "red";
           return false;
       }

       if(password.value == ""){
           password.style.borderColor = "red";
           return false;
       }
   }

}

function error_pass(){
    var password = document.getElementById("password");
    password.style.borderColor = "red";
}