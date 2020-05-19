<!doctype html>
<html lang="en" style="overflow: hidden; position: fixed;">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/style_form.css">
  <link rel="stylesheet" type="text/css" href="../css/style_galeria.css">

  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
  <title>Afegir Sortida</title>

<!--Enlace css para toastr-->
  <link rel="stylesheet" type="text/css" href="../plugin/toastr/toastr.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

</head>
<!--Enlace js para toastr-->
 <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../plugin/toastr/toastr.min.js"></script>

<!--Fancyapps-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>



<body class="body_design" onload="cargar_imagenes();">
<?php

    if (isset($_SESSION['id_pares'])) {	
   echo '<a href="../vista/home_pares.php">';
  }else{ 
  	echo '<a href="../vista/excursiones_profes.php">';
  }
  ?>
  <i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: 2%; color: white; position:absolute; margin-left:2%;" class="btn btn-secondary"></i>
</a>  

<div id="usuaris" class="text-center border border-light p-5 mt-5 div_form2 collapse" style="display: block;">
<form class="text-center" id="form" action="#" autocomplete="off" onsubmit="return validar_galeria();">

<a href=# onclick="minimizar();"><i class="far fa-times-circle fa-2x float-right text-dark"></i></a>
<p class="h4 mb-4" id="">Afegir Fotos a la Excursió</p>

<!-------------------------------------- Títol----------------------------------------->
<div class="form-row mb-4">
    <div class="col">
        <input type="text" name="titolfotos" id="titolfotos" class="form-control text-center" placeholder="Títol per a les fotografíes *" autocomplete="off">
    </div>
       
</div>

<!-----------------------------------Resum Fotos-------------------------------------->
<div class="form-row mb-2">
  <div class="col">
  <textarea name="resumen" id="resumfotos" placeholder="Resum de les fotografíes" class="form-control text-center" rows="3"></textarea>
    <small id="usuarioexistente" class="form-text text-danger d-none">
    Aquest usuari ja existeix.
  </small>
  </div>
<!----------------------------------Fotografias--------------------------------------->
</div>

<label for="avatar">Selecciona les fotografies:</label>

<div class="form-row mb-3">
    <div class="col">
        <input type="file" name="fotos" id="fotos" accept="image/png, image/jpeg">
    </div>
</div>
<!------------------------------------Input id Hidden----------------------------------->
<input type="hidden" id="id_sortida" value='<?php if(isset($_REQUEST["id_sortida"])){echo$_REQUEST["id_sortida"];}?>'>
<!------------------------------------Boton enviar-------------------------------------->
<input type="hidden" value="ok" id="okusuario"/>
<!-- Sign up button -->
<button class="btn btn-info mt-4 btn-block" type="submit">Afegir</button>
</form>
<!-- Default form register -->
</div>
  <script type="text/javascript" src="../js/galeria_js.js"></script>

<!------------------------A partir de aqui es galeria de imagenes------------------------>
<div class="d-none container_img" id="div_img">
<!--
        <h2 class="mt-5 pt-3 text-center">Sortida X</h2>
        <a data-fancybox="gallery" href="https://www.lacroacia.es/wp-content/uploads/2019/10/excursion_lagos_plitvice_croacia.jpg"><img class="img_galeria img-fluid" src="https://www.lacroacia.es/wp-content/uploads/2019/10/excursion_lagos_plitvice_croacia.jpg"></a>
        <a data-fancybox="gallery" href="https://static.siempreenlasnubes.com/uploads/2017/04/vlcsnap-2017-04-16-17h19m39s886.jpg"><img class="img_galeria img-fluid" src="https://static.siempreenlasnubes.com/uploads/2017/04/vlcsnap-2017-04-16-17h19m39s886.jpg"></a>
        <a data-fancybox="gallery" href="https://upload.wikimedia.org/wikipedia/commons/b/bb/Excursi%C3%B3n_banderas_Ping%C3%BCinos_2011%281%29.JPG"><img class="img_galeria img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/b/bb/Excursi%C3%B3n_banderas_Ping%C3%BCinos_2011%281%29.JPG"></a>
        <a data-fancybox="gallery" href="https://sctenerife.es/sctenerife/wp-content/uploads/2016/08/DSCF8088.jpg"><img class="img_galeria img-fluid" src="https://sctenerife.es/sctenerife/wp-content/uploads/2016/08/DSCF8088.jpg"></a>
        <a data-fancybox="gallery" href="https://i.pinimg.com/originals/62/d3/69/62d36986e4cd9c45cfe06e3a842c6448.jpg"><img class="img_galeria img-fluid" src="https://i.pinimg.com/originals/62/d3/69/62d36986e4cd9c45cfe06e3a842c6448.jpg"></a>
        <a data-fancybox="gallery" href="https://inglaterraencasa.com/wp/wp-content/uploads/2017/08/YTB1.jpg"><img class="img_galeria img-fluid" src="https://inglaterraencasa.com/wp/wp-content/uploads/2017/08/YTB1.jpg"></a>
        <a data-fancybox="gallery" href="https://d1bvpoagx8hqbg.cloudfront.net/originals/amantea-excursion-erasmus-1a4072c49d1c434ea67f8c0cf521bc9f.jpg"><img class="img_galeria img-fluid" src="https://d1bvpoagx8hqbg.cloudfront.net/originals/amantea-excursion-erasmus-1a4072c49d1c434ea67f8c0cf521bc9f.jpg"></a>
        <a data-fancybox="gallery" href="https://spainbydialibre.com/wp-content/uploads/2019/06/ubrique-3160653_1920.jpg"><img class="img_galeria img-fluid" src="https://spainbydialibre.com/wp-content/uploads/2019/06/ubrique-3160653_1920.jpg"></a>
        <a data-fancybox="gallery" href="https://static.siempreenlasnubes.com/uploads/2018/08/imagen37.jpg"><img class="img_galeria img-fluid" src="https://static.siempreenlasnubes.com/uploads/2018/08/imagen37.jpg"></a>
 -->
</div>



<div class="footer page-footer">
  <img src="../images/logo_fje.svg">
</div>
</body>
</html>