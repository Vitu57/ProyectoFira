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
        echo "Sortida;Codi;Inici Sortida;Final Sortida;Clase;Etapa;profesor asignat;Acompanyants;Vetlladors;Alumnes;Transport;Hora sortida;Hora Arribada;Comentari Transport;Activitat;Lloc;Tipus Activitat;Àmbit;Jornada;Objectiu;Persona de Contacte;Email de Contacte;Telefon de contacte;Web de Contacte\n";    
      
      $fecha_actual = date('Y-m-d');

            //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_contacte_activitat ON tbl_contacte_activitat.id_contacte_activitat=tbl_activitat.id_contacte_activitat INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa WHERE tbl_sortida.inici_sortida > '$fecha_actual'";

      $exe=mysqli_query($conn,$consulta);
     while ($row=mysqli_fetch_array($exe)){

       echo  $row['nom_activitat'].";"
            .$row['codi_sortida'].";"
            .$row['inici_sortida'].";"
            .$row['final_sortida'].";"
            .$row['nom_classe'].";"
            .$row['nom_etapa'].";"
            .$row['profesor_asignat'].";"
            .$row['n_acompanyants'].";"
            .$row['n_vetlladors'].";"
            .$row['numero_alumnes'].";"
            .$row['nom_transport'].";"
            .$row['hora_sortida'].";"
            .$row['hora_arribada'].";"
            .$row['comentaris_transport'].";"
            .$row['nom_activitat'].";"
            .$row['lloc_activitat'].";"
            .$row['tipus_activitat'].";"
            .$row['ambit_activitat'].";"
            .$row['jornada_activitat'].";"
            .$row['objectiu_activitat'].";"
            .$row['persona_contacte'].";"
            .$row['email_contacte'].";"
            .$row['telefon_contacte'].";"
            .$row['web_contacte']."\n";

}
     exit;              
    
    }else{
            header("location: ../vista/home.php");
    }