<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../images/logo_pag.ico">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/style_form.css">
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap CSS -->
  <!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/toastr/toastr.css">
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../plugin/toastr/toastr.min.js"></script>
  <title>Afegir Sortida</title>
</head>

<body class="body_design"> >
   <a href="../vista/home.php">
  <i class="fas fa-arrow-circle-left fa-3x" style="float: left; margin-top: 2%; color: white;" class="btn btn-secondary"></i>
</a>  
        <div id="sortides" class="text-center border border-light p-5 div_form" style="display: block;">
        <form action="#" class="needs-validation" id="form_exc" onsubmit="validar_insercion(3); return false">
        <div class="card rounded-0">
          <div class="card-header">
            <!--Sortida-->
            <h3 class="mb-0">Sortida</h3>
          </div>
        </div>
        <div class="form-row" style="margin-top: 15px;">
          <div class="form-group col-md-4">
            <label for="inputEmail4">Codi sortida</label>
            <input name="codi_sortida" type="text" class="form-control" id="codi_sortida" placeholder="">
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Inici sortida</label> <label class="text-danger">*</label>
            <input name="inici_sortida" min="<?php echo date('Y-m-d')?>" type="date" class="form-control" id="inici_sortida" value="0">
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Final sortida</label> <label class="text-danger">*</label>
            <input name="final_sortida" min="<?php echo date('Y-m-d')?>" type="date" class="form-control" id="final_sortida" value="0">
          </div>
          <div class="form-group col-md-3">
            <label for="inputState">Etapa</label> <label class="text-danger">*</label>
            <select name="etapa" id="etapa" class="form-control" onchange="select_curs(); return false;">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="inputState">Curs</label> <label class="text-danger">*</label>
            <select name="curs" id="curs" class="form-control" onchange="select_professor(); return false;">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputAddress2">Número de alumnes</label>
            <input type="number" class="form-control" id="num_alumnes" placeholder="">
          </div>
          <div class="form-group col-md-4">
            <label for="inputAddress2">Professor asignat</label>
            <input type="text" class="form-control" id="professor_asignat" placeholder="">
          </div>
            <div class="form-group col-md-2">
            <label for="inputEmail4">Vetlladors</label>
            <input name="num_vetlladors" type="number" class="form-control" id="num_vetlladors" placeholder="">
          </div>
          <div class="form-group col-md-2">
            <label for="inputEmail4">Acompanyants</label>
            <input name="" type="number" class="form-control" id="num_acomp" placeholder="">
          </div>
          <div class="form-group col-md-2">
            <label for="inputEmail4">Prof. a part</label>
            <input name="prof_apart" type="number" class="form-control" id="prof_apart" placeholder="">
          </div>
          <div class="form-group col-md-4">
              <label for="inputState">Llista de professors</label>
              <select multiple size="6" name="lista_prof[]" id="lista_prof" class="form-control tipus">
                <option value="0">Escollir...</option>
              </select>
            </div>
          <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Observacions de sortida</label>
            <textarea name="comentaris" class="form-control" id="comentaris_sort" rows="3"></textarea>
          </div>
            <div style="margin-left: 1%; margin-top: 2%;">
                <button id="btn1-1" class="btn btn-secondary active" style="margin-right: 2px;" title="Sortides">1</button>
                <button id="btn2-1" class="btn btn-secondary" title="Activitat" style="margin-right: 2px;" onclick="MostrarActivitat(); return false;">2</button>
                <button id="btn3-1" class="btn btn-secondary" title="Transport" style="margin-right: 2px;" onclick="PaginacionSortida3(); return false;" value="0">3</button>
                <button id="btn4-1" class="btn btn-secondary" title="Costos" style="margin-right: 2px;" onclick="PaginacionSortida4(); return false;" value="0">4</button>
            </div>
            <div style="margin-left:490px; margin-top:-5.5%;">
                <button class="btn btn-info" disabled>Enrere</button><button class="btn btn-info" style="margin-left: 20px;" onclick="MostrarActivitat(); return false;">Següent</button>
            </div>
        </div>
		</div>
        <!--Activitat-->
        <div id="activitat" class="text-center border border-light p-5 div_form" style="display:none;">
        <div class="card rounded-0">
          <div class="card-header">
            <h3 class="mb-0">Activitat</h3>
          </div>
        </div>
          <div class="form-row" style="margin-top: 15px;">
            <div class="form-group col-md-4">
              <label for="inputAddress2">Nom activitat</label>
              <input name="nom_activitat" type="text" class="form-control" id="nom_activitat" placeholder="">
            </div>
            <div class="form-group col-md-4">
              <label for="inputAddress2">Lloc activitat</label>
              <input name="lloc_activitat" type="text" class="form-control" id="lloc_activitat" placeholder="">
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Tipus de activitat</label>
              <select name="tipus_act" id="tipus_activitat" class="form-control tipus_act">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Ambit activitat</label>
              <select name="ambit" id="ambit_activitat" class="form-control ambit">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Jornada de activitat</label> <label class="text-danger">*</label>
              <select id="jornada_activitat" class="form-control jornada">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="inputAddress2">Objectiu activitat</label>
              <textarea name="comentaris" class="form-control" id="comentaris_objectiu" rows="3"></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputAddress2">Persona de contacte</label>
                <input type="text" class="form-control" id="pers_contacte" placeholder="">
              </div>
              <div class="form-group col-md-3">
                <label for="inputAddress">Telefón de contacte </label>
                <input type="number" class="form-control" id="tlf_contacte" placeholder="">
              </div>
              <div class="form-group col-md-3">
                <label for="inputAddress2">Web de contacte</label>
                <input type="text" class="form-control" id="web_contacte" placeholder="">
              </div>
              <div class="form-group col-md-3">
                <label for="inputAddress2">Email de contacte</label>
                <input type="email" class="form-control" id="email_contacte" placeholder="">
              </div>
            </div>
          </div>
        
		
          <div class="form-row" style="margin-top: 10px;">
            </div>
            <div style="margin-left: -77%; margin-top: 2%;">
                <button id="btn1-2" class="btn btn-secondary" style="margin-right: 2px;" title="Sortides" onclick="ActivitatEnrere(); return false;">1</button>
                <button id="btn2-2" class="btn btn-secondary active" title="Activitat" style="margin-right: 2px;" onclick="return false">2</button>
                <button id="btn3-2" class="btn btn-secondary" title="Transport" style="margin-right: 2px;" onclick="ActivitatSeg(); return false;">3</button>
                <button id="btn1-2" class="btn btn-secondary" title="Costos" style="margin-right: 2px;" onclick="PaginacionActivitat4(); return false;">4</button>
            </div>
            <div style="margin-left:490px; margin-top:-5.5%;">
                <button class="btn btn-info" onclick="ActivitatEnrere(); return false;">Enrere</button><button class="btn btn-info" style="margin-left: 20px;" onclick="ActivitatSeg(); return false;">Següent</button>
            </div>
        </div>
          <!--Transport-->
          <div id="transport" class="text-center border border-light p-5 div_form" style="display:none;">
          <div class="card rounded-0">
            <div class="card-header">
              <h3 class="mb-0">Transport</h3>
            </div>
          </div>
          <div class="form-row" style="margin-top: 15px;">
            <div class="form-group col-md-3">
              <label for="inputState">Tipus de transport</label> <label class="text-danger">*</label>
              <select id="tipus_transport" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Cost del transport</label>
              <input name="" type="number" class="form-control" id="cost_transport" placeholder="">
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Hora de sortida</label>
              <input name="" type="time" class="form-control" id="hora_sortida" placeholder="">
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Hora d'arribada</label>
              <input name="" type="time" class="form-control" id="hora_arribada" placeholder="" value="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Codi de contacte</label>
              <input name="codi_contacte" type="number" class="form-control" id="codi_contacte" placeholder="">
            </div>

          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Comentaris</label>
            <textarea name="comentaris" class="form-control" id="comentaris_transport" rows="3"></textarea>
          </div>
          <div style="margin-left: -76%; margin-top: 2%;">
                <button id="btn1-3" class="btn btn-secondary" style="margin-right: 2px;" title="Sortides" onclick="PaginacionTransport(); return false;">1</button>
                <button id="btn2-3" class="btn btn-secondary" title="Activitat" style="margin-right: 2px;" onclick="TransportEnrere(); return false;">2</button>
                <button id="btn3-3" class="btn btn-secondary active" title="Transport" style="margin-right: 2px;" onclick="return false">3</button>
                <button id="btn4-3" class="btn btn-secondary" title="Costos" style="margin-right: 2px;" onclick="TransportSeg(); return false;">4</button>
          </div>
          <div style="margin-left:490px; margin-top:-5.5%">
                <button class="btn btn-info" onclick="TransportEnrere(); return false;">Enrere</button><button class="btn btn-info" style="margin-left: 20px;" onclick="TransportSeg(); return false;">Següent</button>
            </div>
        </div>
        <!--Costes-->
        <div id="costes" class="text-center border border-light p-5 div_form" style="display:none;">
        <div class="card rounded-0">
            <div class="card-header">
              <h3 class="mb-0">Costos</h3>
            </div>
          </div>
          <div class="form-row" style="margin-top: 15px;">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Cost substitució</label>
              <input name="cost_substitucio" type="number" class="form-control" id="cost_substitucio" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Cost activitat individual</label>
              <input name="cost_act_ind" type="number" class="form-control" id="cost_act_ind" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Cost extra de activitat professor</label>
              <input name="" type="number" class="form-control" id="cost_ext_act_prof" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Cost global activitat</label>
              <input name="" type="number" class="form-control" id="cost_glob_act" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Cost final</label>
              <input name="" type="number" class="form-control" id="cost_final" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Preu fixe</label>
              <input name="" type="number" class="form-control" id="preu_fixe" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Preu sense topal</label>
              <input name="" type="number" class="form-control" id="preu_sense_topal" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Preu amb topal</label>
              <input name="" type="number" class="form-control" id="preu_amb_topal" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Preu gestió</label>
              <input name="preu_gestio" type="number" class="form-control" id="preu_gestio" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Overhead</label>
              <input name="overhead" type="number" class="form-control" id="overhead" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Total a facturar</label>
              <input name="" type="number" class="form-control" id="total_facturar" placeholder="">
            </div>
            <div class="form-group col-md-3">
            <label for="inputState">Fraccionat</label>
            <select name="fraccionat" id="fraccionat" class="form-control">
              <option selected>si</option>
              <option>no</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Observacions</label>
            <textarea name="" class="form-control" id="observacions_costos" rows="3"></textarea>
          </div>
          </div>
            <div style="margin-left: -76%; margin-top: 2%;">
                <button id="btn1-4" class="btn btn-secondary" style="margin-right: 2px;" title="Sortides" onclick="PaginacionCostes1(); return false;">1</button>
                <button id="btn2-4" class="btn btn-secondary" title="Activitat" style="margin-right: 2px;" onclick="PaginacionCostes2   (); return false;">2</button>
                <button id="btn3-4" class="btn btn-secondary" title="Transport" style="margin-right: 2px;"  onclick="CostesEnrere(); return false;">3</button>
                <button id="btn4-4" class="btn btn-secondary active" title="Costos" style="margin-right: 2px;" onclick="return false">4</button>
            </div>
            <div style="margin-left:400px; margin-top:-5.5%;">
                <button class="btn btn-info" onclick="CostesEnrere(); return false;">Enrere</button><button type="submit" class="btn btn-info" style="margin-left: 20px;">Afegir sortida</button>
            </div>
          </div>
        <!--<button type="submit" class="btn btn-info btn-block">Afegir Sortida</button> -->
        </form>
        </div><br>
  <script type="text/javascript" src="../js/codigo.js"></script>
<div class="footer page-footer">
  <img src="../images/logo_fje.svg">
</div>
</body>
</html>