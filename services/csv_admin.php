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
        echo "Codi;Sortida;Inici;Final;Clase;Etapa;Acompanyants;Alumnes;Professor Assignat;Vetlladors;SIEI;Professors;Professors Computables;Lloc;Tipus;Àmbit;Jornada;Objectiu\n";    
            
        $consulta="select tbl_sortida.codi_sortida,tbl_sortida.inici_sortida,tbl_sortida.final_sortida,tbl_clase.nom_classe,tbl_etapa.nom_etapa,tbl_sortida.n_acompanyants,tbl_sortida.numero_alumnes,tbl_sortida.profesor_asignat,tbl_sortida.n_vetlladors,tbl_sortida.id_clase,tbl_sortida.id_sortida,tbl_activitat.nom_activitat,tbl_activitat.lloc_activitat,tbl_activitat.tipus_activitat,tbl_activitat.ambit_activitat,tbl_activitat.jornada_activitat,tbl_activitat.objectiu_activitat,tbl_activitat.id_activitat,tbl_sortida.id_precios,tbl_activitat.id_contacte_activitat,tbl_sortida.id_transport from tbl_etapa inner join tbl_clase on tbl_etapa.id_etapa=tbl_clase.id_etapa inner join tbl_sortida on tbl_clase.id_clase=tbl_sortida.id_clase inner join tbl_activitat on tbl_sortida.id_sortida=tbl_activitat.id_sortida";

        // Recorremos la consulta SQL y lo mostramos
    $consultax=mysqli_query($conn,$consulta);
    //Por cada resultado, metemos en una variable de tipo array
    
    while ($exe=mysqli_fetch_array($consultax)) {

      echo   $exe[0].";"
            .$exe[11].";"
            .$exe[1].";"
            .$exe[2].";"
            .$exe[3].";"
            .$exe[4].";"
            .$exe[5].";"
            .$exe[6].";"
            .$exe[7].";"
            .$exe[8].";";

//A continuacion veremos si hay algun niño especial en esa clase
            $csiei="select count(tbl_usuari.id_usuari) from tbl_usuari inner join tbl_clase_user ON tbl_clase_user.id_usuari=tbl_usuari.id_usuari where computable='alumne' and tbl_clase_user.id_clase='".$exe[9]."' and siei='si'";   
            $alusiei=mysqli_query($conn,$csiei);
            $nsiei=mysqli_fetch_array($alusiei);
            if ($nsiei[0]==0) {
                echo "No;";
            }else{
                echo "Si;";
            }
            //Ahora necesitamos saber el nombre de profesores que van a venir (Profesores de las clases que van a la salida)
            $conprof="select tbl_usuari.nom_usuari,tbl_usuari.cognom_usuari from tbl_lista_profesores inner join tbl_usuari on tbl_lista_profesores.id_profesor=tbl_usuari.id_usuari where tbl_lista_profesores.id_excursion='".$exe[10]."'";
            $qprof=mysqli_query($conn,$conprof);

            if (mysqli_num_rows($qprof)!=0){

            while ($mprof=mysqli_fetch_array($qprof)) {
                echo $mprof[0]." ".$mprof[1].";";    
            }

        }else{
            echo ";";
        }
            //Por ultimo, necesitamos saber que profesores de los anteriores son computables
            $conprof="select tbl_usuari.nom_usuari,tbl_usuari.cognom_usuari from tbl_lista_profesores inner join tbl_usuari on tbl_lista_profesores.id_profesor=tbl_usuari.id_usuari where tbl_lista_profesores.id_excursion='".$exe[10]."' and tbl_usuari.computable='si'";
            $qprof=mysqli_query($conn,$conprof);
        
        if (mysqli_num_rows($qprof)!=0){

            while ($mprof=mysqli_fetch_array($qprof)) {
                echo $mprof[0]." ".$mprof[1].";";    
            }
            
            }else{
                echo ";";
            }

            echo $exe[12].";"
                .$exe[13].";"
                .$exe[14].";"
                .$exe[15].";"
                .$exe[16]." \n";
    
    }  
     exit;              
    
    }else{
            header("location: ../vista/home.php");
    }