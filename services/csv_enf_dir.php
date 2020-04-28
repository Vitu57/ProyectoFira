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
        echo "Codi;Activitat;Etapa;Clase;Inici Sortida;Final Sortida;Hora Sortida;Hora Arribada;Vetlladors;Profes a Part;Numero d'alumnes;Activitat;Profesor Asignat;Transport;Jornada\n";    
            
            //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa";

      $exe=mysqli_query($conn,$consulta);
     while ($row=mysqli_fetch_array($exe)){

       echo  $row['codi_sortida'].";"
            .$row['nom_activitat'].";"
            .$row['nom_etapa'].";"
            .$row['nom_classe'].";"
            .$row['inici_sortida'].";"
            .$row['final_sortida'].";"
            .$row['hora_sortida'].";"
            .$row['hora_arribada'].";"
            .$row['n_vetlladors'].";"
            .$row['profes_a_part'].";"
            .$row['numero_alumnes'].";"
            .$row['nom_activitat'].";"
            .$row['profesor_asignat'].";"
            .$row['nom_transport'].";"
            .$row['jornada_activitat']."\n";

}
     exit;              
    
    }else{
            header("location: ../vista/home.php");
    }