<header>
<script type="text/javascript" src="../js/primera_visita.js"></script>
</header>

<?php

if (isset($_SESSION['id_pares'])) {

switch ($_SESSION['pag']) {
  case 'home':

  //Home pares
    ?>
<div id="resultado4" class="modalmask" style="display:none; margin-top: -7%; width: 25%; height: 30%; margin-left: 27.5%;">

      <div class="modalbox movedown" id="resultadoContent4">
        <a href="#" title="Close4" class="close" id="close4" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado4">TITULO</h2>
        <div id="contenidoResultado4">contenido resultado</div>
      </div>
</div>

<div id="resultadocalen" class="modalmask" style="display:none; margin-top: -30%; width: 17%; margin-left: -6%;">

      <div class="modalbox movedown" id="resultadoContent4">
        <a href="#" title="Close" class="close" id="closecalen" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadocalen">TITULO</h2>
        <div id="contenidoResultadocalen">contenido resultado</div>
      </div>
</div>


<div id="resultadocalen2" class="modalmask" style="display:none; margin-top: 1.2%; width: 17%; margin-left: -8%;">

      <div class="modalbox movedown" id="resultadoContent4">
        <a href="#" title="Close" class="close" id="closecalen2" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadocalen2">TITULO</h2>
        <div id="contenidoResultadocalen2">contenido resultado</div>
      </div>
</div>


<div id="resultadologout" class="modalmask" style="display:none; margin-top: -34.5%; width: 16%; margin-left: 69%;">

      <div class="modalbox movedown" id="resultadoContentlogout">
        <a href="#" title="Tancar" class="close" id="closelogout" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadologout">TITULO</h2>
        <div id="contenidoResultadologout">contenido resultado</div>
      </div>
</div>
<?php
    break;

case 'hijo':
  
?>
<div id="resultado4" class="modalmask" style="display:none; margin-top: -9%; width: 32%; margin-left: 23%; height: 25%;">

      <div class="modalbox movedown" id="resultadoContent4">
        <a href="#" title="Close4" class="close" id="close4" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado4">TITULO</h2>
        <div id="contenidoResultado4">contenido resultado</div>
      </div>
</div>

<div id="resultadologout" class="modalmask" style="display:none; margin-top: -34%; width: 16%; margin-left: 69%;">

      <div class="modalbox movedown" id="resultadoContentlogout">
        <a href="#" title="Tancar" class="close" id="closelogout" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadologout">TITULO</h2>
        <div id="contenidoResultadologout">contenido resultado</div>
      </div>
</div>

<div id="resultadoreturn" class="modalmask" style="display:none; margin-top: -34%; width: 12%; margin-left: -4%;">

      <div class="modalbox movedown" id="resultadoContentreturn">
        <a href="#" title="Tancar" class="close" id="closereturn" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoreturn">TITULO</h2>
        <div id="contenidoResultadoreturn">contenido resultado</div>
      </div>
</div>
<?php
  break;
}

}else{

if (isset($_SESSION['tipo'])) {
	
switch ($_SESSION['tipo']) {


case '1':
	//Admin
?>
<div id="resultado4" class="modalmask" style="display:none; margin-top: -25.7%; width: 19%; margin-left: -1.4%;">

      <div class="modalbox movedown" id="resultadoContent4">
        <a href="#" title="Tancar" class="close" id="close4" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado4">TITULO</h2>
        <div id="contenidoResultado4">contenido resultado</div>
      </div>
</div>

<div id="resultadotut" class="modalmask" style="display:none; margin-top: -17.3%; width: 14%; margin-left: 64%;">

      <div class="modalbox movedown" id="resultadotut">
        <a href="#" title="Tancar" class="close" id="closetut" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadotut">TITULO</h2>
        <div id="contenidoResultadotut">contenido resultado</div>
      </div>
</div>

<div id="resultadoCSV" class="modalmask" style="display:none; margin-top: 0.9%; width: 18%; margin-left: 46%;">

      <div class="modalbox movedown" id="resultadoContentCSV">
        <a href="#" title="Tancar" class="close" id="closeCSV" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoCSV">TITULO</h2>
        <div id="contenidoResultadoCSV">contenido resultado</div>
      </div>
</div>

<div id="resultadologout" class="modalmask" style="display:none; margin-top: -32%; width: 16%; margin-left: 62%;">

      <div class="modalbox movedown" id="resultadoContentlogout">
        <a href="#" title="Tancar" class="close" id="closelogout" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadologout">TITULO</h2>
        <div id="contenidoResultadologout">contenido resultado</div>
      </div>
</div>

<div id="resultadoreturn" class="modalmask" style="display:none; margin-top: -31.7%; width: 12%; margin-left: 2%;">

      <div class="modalbox movedown" id="resultadoContentreturn">
        <a href="#" title="Tancar" class="close" id="closereturn" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoreturn">TITULO</h2>
        <div id="contenidoResultadoreturn">contenido resultado</div>
      </div>
</div>
<?php
	break;
	
	//Profesores
	case '2':
	?>	

<div id="resultadologout" class="modalmask" style="display:none; margin-top: -32%; width: 16%; margin-left: 62%;">

      <div class="modalbox movedown" id="resultadoContentlogout">
        <a href="#" title="Tancar" class="close" id="closelogout" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadologout">TITULO</h2>
        <div id="contenidoResultadologout">contenido resultado</div>
      </div>
</div>

<div id="resultadoreturn" class="modalmask" style="display:none; margin-top: -31.7%; width: 12%; margin-left: 2%;">

      <div class="modalbox movedown" id="resultadoContentreturn">
        <a href="#" title="Tancar" class="close" id="closereturn" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoreturn">TITULO</h2>
        <div id="contenidoResultadoreturn">contenido resultado</div>
      </div>
</div>

<div id="resultadotut" class="modalmask" style="display:none; margin-top: -25.5%; width: 15%; margin-left: 63%;">

      <div class="modalbox movedown" id="resultadoContenttut">
        <a href="#" title="Tancar" class="close" id="closetut" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadotut">TITULO</h2>
        <div id="contenidoResultadotut">contenido resultado</div>
      </div>
</div>

<div id="resultadotut2" class="modalmask" style="display:none; text-align: left; margin-top: -26%; width: 11%; margin-left: 78.5%;">

      <div class="modalbox movedown" id="resultadoContenttut2">
        <a href="#" title="Tancar" class="close" id="closetut2" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadotut2">TITULO</h2>
        <div id="contenidoResultadotut2">contenido resultado</div>
      </div>
</div>

<div id="resultadotut3" class="modalmask" style="display:none; text-align: left; margin-top: -24.3%; width: 19.6%; margin-left: -1.5%;">

      <div class="modalbox movedown" id="resultadoContenttut3">
        <a href="#" title="Tancar" class="close" id="closetut3" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadotut3">TITULO</h2>
        <div id="contenidoResultadotut3">contenido resultado</div>
      </div>
</div>

<div id="resultadoCSV" class="modalmask" style="display:none; margin-top: 3%; width: 18%; margin-left: 46%;">

      <div class="modalbox movedown" id="resultadoContentCSV">
        <a href="#" title="Tancar" class="close" id="closeCSV" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoCSV">TITULO</h2>
        <div id="contenidoResultadoCSV">contenido resultado</div>
      </div>
</div>
<?php

	break;

    //cocina
	case '4':

?>

<div id="resultadologout" class="modalmask" style="display:none; margin-top: -32%; width: 16%; margin-left: 62%;">

      <div class="modalbox movedown" id="resultadoContentlogout">
        <a href="#" title="Tancar" class="close" id="closelogout" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadologout">TITULO</h2>
        <div id="contenidoResultadologout">contenido resultado</div>
      </div>
</div>

<div id="resultadoreturn" class="modalmask" style="display:none; margin-top: -31.7%; width: 12%; margin-left: 2%;">

      <div class="modalbox movedown" id="resultadoContentreturn">
        <a href="#" title="Tancar" class="close" id="closereturn" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoreturn">TITULO</h2>
        <div id="contenidoResultadoreturn">contenido resultado</div>
      </div>
</div>

<div id="resultado2" class="modalmask" style="display:none; margin-top: -29%; width: 40%; margin-left: 19%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Close" class="close" id="close" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button onclick="cocina_vis2(); cocina_vis3(); tutorialCSV();" class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado">TITULO</h2>
        <div id="contenidoResultado">contenido resultado</div>
      </div>
</div>

<div id="resultado3" class="modalmask" style="display:none; margin-top: -26%; width: 24%; margin-left: 8%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close3" title="Close3" class="close" id="close3" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style=" padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado3">TITULO</h2>
        <div id="contenidoResultado3">contenido resultado</div>
      </div>
</div>

<div id="resultado4" class="modalmask" style="display:none; margin-top: -27.5%; width: 18%; margin-left: 62.5%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close4" title="Close4" class="close" id="close4" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultado4">TITULO</h2>
        <div id="contenidoResultado4">contenido resultado</div>
      </div>
</div>

<div id="resultadoCSV" class="modalmask" style="display:none; margin-top: 3%; width: 18%; margin-left: 46%;">

      <div class="modalbox movedown" id="resultadoContentCSV">
        <a href="#" title="Close4" class="close" id="closeCSV" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoCSV">TITULO</h2>
        <div id="contenidoResultadoCSV">contenido resultado</div>
      </div>
</div>

<?php
break;

//Secretaria
case '3':

?>
<div id="resultadologout" class="modalmask" style="display:none; margin-top: -32%; width: 16%; margin-left: 62%;">

      <div class="modalbox movedown" id="resultadoContentlogout">
        <a href="#" title="Tancar" class="close" id="closelogout" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadologout">TITULO</h2>
        <div id="contenidoResultadologout">contenido resultado</div>
      </div>
</div>

<div id="resultadoreturn" class="modalmask" style="display:none; margin-top: -31.7%; width: 12%; margin-left: 2%;">

      <div class="modalbox movedown" id="resultadoContentreturn">
        <a href="#" title="Tancar" class="close" id="closereturn" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoreturn">TITULO</h2>
        <div id="contenidoResultadoreturn">contenido resultado</div>
      </div>
</div>

<div id="resultadotut" class="modalmask" style="display:none; margin-top: -26.5%; width: 15%; margin-left: 63.5%;">

      <div class="modalbox movedown" id="resultadoContenttut">
        <a href="#" title="Tancar" class="close" id="closetut" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadotut">TITULO</h2>
        <div id="contenidoResultadotut">contenido resultado</div>
      </div>
</div>

<div id="resultadoCSV" class="modalmask" style="display:none; margin-top: 0.9%; width: 18%; margin-left: 46%;">

      <div class="modalbox movedown" id="resultadoContentCSV">
        <a href="#" title="Tancar" class="close" id="closeCSV" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoCSV">TITULO</h2>
        <div id="contenidoResultadoCSV">contenido resultado</div>
      </div>
</div>
<?php

break;

    //Direccion
	case '5':

?>

<div id="resultadologout" class="modalmask" style="display:none; margin-top: -32%; width: 16%; margin-left: 62%;">

      <div class="modalbox movedown" id="resultadoContentlogout">
        <a href="#" title="Tancar" class="close" id="closelogout" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadologout">TITULO</h2>
        <div id="contenidoResultadologout">contenido resultado</div>
      </div>
</div>

<div id="resultadoreturn" class="modalmask" style="display:none; margin-top: -31.7%; width: 12%; margin-left: 2%;">

      <div class="modalbox movedown" id="resultadoContentreturn">
        <a href="#" title="Tancar" class="close" id="closereturn" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoreturn">TITULO</h2>
        <div id="contenidoResultadoreturn">contenido resultado</div>
      </div>
</div>

<div id="resultadotut2" class="modalmask" style="display:none; margin-top: -27.5%; width: 40%; margin-left: 19%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Tancar" class="close" id="closetut2" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button onclick="dir_enf_vis2(); tutorialCSV();" class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadotut2">TITULO</h2>
        <div id="contenidoResultadotut2">contenido resultado</div>
      </div>
</div>



<div id="resultadotut" class="modalmask" style="display:none; margin-top: -23.5%; width: 18%; margin-left: 65.5%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Tancar" class="close" id="closetut" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadotut">TITULO</h2>
        <div id="contenidoResultadotut">contenido resultado</div>
      </div>
</div>

<div id="resultadoCSV" class="modalmask" style="display:none; margin-top: 2.3%; width: 18%; margin-left: 46%;">

      <div class="modalbox movedown" id="resultadoContentCSV">
        <a href="#" title="Tancar" class="close" id="closeCSV" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoCSV">TITULO</h2>
        <div id="contenidoResultadoCSV">contenido resultado</div>
      </div>
</div>

<?php

break;	

    //Enfermeria
	case '6':

?>

<div id="resultadologout" class="modalmask" style="display:none; margin-top: -32%; width: 16%; margin-left: 62%;">

      <div class="modalbox movedown" id="resultadoContentlogout">
        <a href="#" title="Tancar" class="close" id="closelogout" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadologout">TITULO</h2>
        <div id="contenidoResultadologout">contenido resultado</div>
      </div>
</div>

<div id="resultadoreturn" class="modalmask" style="display:none; margin-top: -31.7%; width: 12%; margin-left: 2%;">

      <div class="modalbox movedown" id="resultadoContentreturn">
        <a href="#" title="Tancar" class="close" id="closereturn" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoreturn">TITULO</h2>
        <div id="contenidoResultadoreturn">contenido resultado</div>
      </div>
</div>

<div id="resultadotut2" class="modalmask" style="display:none; margin-top: -27.5%; width: 40%; margin-left: 19%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Tancar" class="close" id="closetut2" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button onclick="dir_enf_vis2(); tutorialCSV();" class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadotut2">TITULO</h2>
        <div id="contenidoResultadotut2">contenido resultado</div>
      </div>
</div>



<div id="resultadotut" class="modalmask" style="display:none; margin-top: -23.5%; width: 18%; margin-left: 65.5%;">

      <div class="modalbox movedown" id="resultadoContent">
        <a href="#close" title="Tancar" class="close" id="closetut" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadotut">TITULO</h2>
        <div id="contenidoResultadotut">contenido resultado</div>
      </div>
</div>

<div id="resultadoCSV" class="modalmask" style="display:none; margin-top: 2.3%; width: 18%; margin-left: 46%;">

      <div class="modalbox movedown" id="resultadoContentCSV">
        <a href="#" title="Tancar" class="close" id="closeCSV" style="color:black; background-color:#f1f1f1; margin-right:6%; margin-top: 1.5%;"><button class="btn btn-lg" style="padding: 6px; color: white; background-color:#2da0fa; ">OK</button></a>
        <h2 id="tituloResultadoCSV">TITULO</h2>
        <div id="contenidoResultadoCSV">contenido resultado</div>
      </div>
</div>

<?php

break;

}

}else{
	header("location: ../vista/home.php");
}
}
?>