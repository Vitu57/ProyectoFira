<?php
header("Location: vista/login.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

    <title>Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  </head>
  <body>
    <header>
    </header>
    <main>
        <div class="text-center p-5" >
        <form action="services/index.proc.php" method="POST">
            <div class="form-group required">
              <input id="username" maxlength="40" class="form-control mb-2" placeholder="Usuari" name="username" value="<?php 
                        if (isset($_GET['us'])) {
                            $user=$_GET['us'];
                            echo "$user";
                        }
                    ?>" size="20" type="text" /><br>
            </div>
            <div class="form-group required">
              <input  id="password" maxlength="40"  class="form-control mb-2" placeholder="Contrasenya" name="password" size="20" type="password" /><br>
            </div>
          </div>
            <input class="btn btn-info btn" type="submit" name="submit" value="Entrar">
            </form>
            </div>
    </main>
</body>
</html>