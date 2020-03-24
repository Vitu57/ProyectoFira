<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">

  <title>Excursiones</title>
</head>

<body>
  <div class="panel panel-default">
    <div class="panel-body">
      <form action="form_excursiones.php" class="needs-validation">
        <div class="card rounded-0">
          <div class="card-header">
            <!--Sortida-->
            <h3 class="mb-0">Sortida</h3>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEmail4">Codi sortida</label>
            <input name="codi_sortida" type="email" class="form-control" id="inputEmail4" placeholder="">
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Inici sortida</label>
            <input name="inici_sortida" min="<?php echo date('Y-m-d')?>" type="date" class="form-control" id="">
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Final sortida</label>
            <input name="final_sortida" min="<?php echo date('Y-m-d')?>" type="date" class="form-control" id="">
          </div>
          <div class="form-group col-md-3">
            <label for="inputState">Etapa</label>
            <select name="etapa" id="etapa" class="form-control" onchange="select_curs(); return false;">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="inputState">Curs</label>
            <select name="curs" id="curs" class="form-control">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputAddress2">Número de alumnes</label>
            <input type="number" class="form-control" id="inputAddress2" placeholder="">
          </div>
          <div class="form-group col-md-4">
            <label for="inputAddress2">Número de professors</label>
            <input type="number" class="form-control" id="inputAddress2" placeholder="">
          </div>
          <div class="form-group col-md-3">
              <label for="inputState">Lista de profesores</label>
              <select multiple size="6" name="lista_prof" id="lista_prof" class="form-control tipus">
                <option value="0">Escollir...</option>
              </select>
            </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">num. vetlladors</label>
            <input name="num_vetlladors" type="number" class="form-control" id="inputEmail4" placeholder="">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">professors a part</label>
            <input name="prof_apart" type="number" class="form-control" id="inputEmail4" placeholder="">
          </div>
          <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Observacions de sortida</label>
            <textarea name="comentaris" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </div>
        <!--Activitat-->
        <div class="card rounded-0">
          <div class="card-header">
            <h3 class="mb-0">Activitat</h3>
          </div>
        </div>
          <div id="clone">
          <div class="tabcontent" id="fila0">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputAddress2">Nom activitat</label>
              <input name="nom_activitat" type="text" class="form-control" id="nom_activitat0" placeholder="">
            </div>
            <div class="form-group col-md-4">
              <label for="inputAddress2">Lloc activitat</label>
              <input name="lloc_activitat" type="text" class="form-control" id="lloc_activitat0" placeholder="">
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Tipus de activitat</label>
              <select name="tipus_act" id="tipus_activitat0" class="form-control tipus_act">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Ambit activitat</label>
              <select name="ambit" id="ambit_activitat0" class="form-control ambit">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Jornada de activitat</label>
              <select id="jornada_activitat0" class="form-control jornada">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="inputAddress2">Objectiu activitat</label>
              <textarea name="comentaris" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputAddress2">Persona de contacte</label>
                <input type="text" class="form-control" id="pers_contacte0" placeholder="">
              </div>
              <div class="form-group col-md-3">
                <label for="inputAddress">Telefón de contacte </label>
                <input type="number" class="form-control" id="tlf_contacte0" placeholder="">
              </div>
              <div class="form-group col-md-3">
                <label for="inputAddress2">Web de contacte</label>
                <input type="text" class="form-control" id="web_contacte0" placeholder="">
              </div>
              <div class="form-group col-md-3">
                <label for="inputAddress2">Email de contacte</label>
                <input type="text" class="form-control" id="email_contacte0" placeholder="">
              </div>
            </div>
          </div>
        </div>
      </div>
          <div class="form-row">
            <div class="form-group">
              <button onclick="clone(); return false" class="btn btn-success" >Afegir</button>
            </div>
            <div class="tab" id="buttonPages">
            <button id="first" class="tablinks" onclick="openTab(event,0); return false;">1</button>
            </div>
            </div>
          <!--Transport-->
          <div class="card rounded-0">
            <div class="card-header">
              <h3 class="mb-0">Transport</h3>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputAddress2">Nom del transport</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="">
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Tipus de transport</label>
              <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Cost</label>
              <input name="cost_transport" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Codi de contacte</label>
              <input name="codi_contacte" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>

          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Comentaris</label>
            <textarea name="comentaris" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </div>
        <!--Costes-->
        <div class="card rounded-0">
            <div class="card-header">
              <h3 class="mb-0">Costos</h3>
            </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Cost substitució</label>
              <input name="cost_transport" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Cost activitat individual</label>
              <input name="cost_transport" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Cost extra de activitat professor</label>
              <input name="codi_contacte" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Cost global activitat</label>
              <input name="codi_contacte" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Cost final</label>
              <input name="codi_contacte" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Preu fixe</label>
              <input name="codi_contacte" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Preu sense topal</label>
              <input name="codi_contacte" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Preu amb topal</label>
              <input name="codi_contacte" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Preu gestió</label>
              <input name="codi_contacte" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Overhead</label>
              <input name="codi_contacte" type="number" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Total a facturar</label>
              <input name="codi_contacte" type="number" class="form-control" id="inputEmail4" placeholder="">
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
            <textarea name="comentaris" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
            

          </div>
        </div>

        <div class="form-group">
        </div>
        <button type="submit" class="btn btn-primary">Desar</button>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="../js/codigo.js"></script>
</body>

</html>