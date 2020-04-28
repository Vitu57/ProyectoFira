<?php

include "../services/conexion.php";

//Si hemos pulsado al botón de Exportar a Excel (CSV)...
if(isset($_POST["exportarCSV"])) {

        //El nombre del fichero tendrá el nombre de "usuarios_dia-mes-anio hora_minutos_segundos.csv"
        $ficheroExcel="dades de sortides ".date("d-m-Y H:i:s").".csv";
        
        //Indicamos que vamos a tratar con un fichero CSV
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=".$ficheroExcel);
        
        //Asignar UTF-8
        print "\xEF\xBB\xBF"; 
        
        // Vamos a mostrar en las celdas las columnas que queremos que aparezcan en la primera fila, separadas por ; 
        echo "Nom Sortida;Inici Sortida;Final Sortida;Clase;Etapa;Acompanyants;Alumnes;Profesor asignat\n";    
        
        $fecha_actual = date('Y-m-d');    
            //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT tbl_sortida.id_sortida,tbl_sortida.codi_sortida,tbl_activitat.nom_activitat,tbl_sortida.inici_sortida,tbl_sortida.final_sortida,tbl_sortida.comanda_menu,tbl_clase.nom_classe,tbl_etapa.nom_etapa,tbl_sortida.n_acompanyants,tbl_sortida.numero_alumnes,tbl_sortida.profesor_asignat,tbl_sortida.n_vetlladors,tbl_sortida.id_clase,tbl_sortida.id_sortida from tbl_etapa inner join tbl_clase on tbl_etapa.id_etapa=tbl_clase.id_etapa inner join tbl_sortida on tbl_clase.id_clase=tbl_sortida.id_clase inner join tbl_activitat on tbl_sortida.id_sortida=tbl_activitat.id_sortida WHERE tbl_sortida.inici_sortida > '$fecha_actual'";

      $exe=mysqli_query($conn,$consulta);
     while ($row=mysqli_fetch_array($exe)){

     echo    $row[2].";"
            .$row[3].";"
            .$row[4].";"
            .$row[6].";"
            .$row[7].";"
            .$row[8].";"
            .$row[9].";"
            .$row[10]."\n";

}
     exit;              
    
    }else{
            header("location: ../vista/home.php");
    }