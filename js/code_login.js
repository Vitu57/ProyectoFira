
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

    //Comprobamos si el usuario está vacío
       if(username.value == ""){
        alert("Contraseña vacía");
           username.style.borderColor = "red";
           return false;
       }

       //Comprobamos si la contraseña está vacía
       if(password.value == ""){
           password.style.borderColor = "red";
           return false;
       }
   }

}

//Por último, si el usuario es incorrecto
function error_pass(){
    var password = document.getElementById("password");
    password.style.borderColor = "red";

    toastr_error_login();
}

function toastr_error_login(){
    toastr["error"]("Si us plau, intenta-ho de nou.", "Usuari o contrasenya Incorrecte!");

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
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