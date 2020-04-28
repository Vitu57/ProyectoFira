<?php

include "../services/conexion.php";

//Si hemos pulsado al botón de Exportar a Excel (CSV)...


        //El nombre del fichero tendrá el nombre de "usuarios_dia-mes-anio hora_minutos_segundos.csv"
        $ficheroExcel="dades usuaris ".date("d-m-Y H:i:s").".csv";
        
        //Indicamos que vamos a tratar con un fichero CSV
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=".$ficheroExcel);
        
        //Asignar UTF-8
        print "\xEF\xBB\xBF"; 
        
        // Vamos a mostrar en las celdas las columnas que queremos que aparezcan en la primera fila, separadas por ; 
        echo "Usuari;Nom;Cognoms;Departament\n";    
            
            //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT tbl_usuari.usuari, tbl_usuari.nom_usuari, tbl_usuari.cognom_usuari, tbl_tipus_usuari.nom_tipus FROM tbl_usuari INNER JOIN tbl_tipus_usuari ON tbl_tipus_usuari.id_tipus_usuari=tbl_usuari.id_tipus_usuari ORDER BY tbl_tipus_usuari.nom_tipus";

      $exe=mysqli_query($conn,$consulta);
     while ($val=mysqli_fetch_array($exe)){

     echo    $val[0].";"
            .$val[1].";"
            .$val[2].";"
            .$val[3]."\n";

}
     exit;              
   