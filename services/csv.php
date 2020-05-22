<?php

if (isset($_SESSION['tipo'])) {

include "../services/conexion.php";

        //El nombre del fichero tendrá el nombre de "usuarios_dia-mes-anio hora_minutos_segundos.csv"
       
       if (isset($_REQUEST['users'])) {
        $ficheroExcel="dades d'usuaris ".date("d-m-Y H:i:s").".csv";
        }else{
        $ficheroExcel="dades de sortides ".date("d-m-Y H:i:s").".csv";	
        }

        //Indicamos que vamos a tratar con un fichero CSV
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=".$ficheroExcel);
        
        //Asignar UTF-8
        print "\xEF\xBB\xBF"; 

         $fecha_actual = date('Y-m-d');     
	
switch ($_SESSION['tipo']) {

case '1':
	//Admin

if (isset($_REQUEST['users'])) {
	

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


}else{

        // Vamos a mostrar en las celdas las columnas que queremos que aparezcan en la primera fila, separadas por ; 
        echo "Codi;Sortida;Inici;Final;Clase;Etapa;Acompanyants;Alumnes;Professor Assignat;Vetlladors;SIEI;Professors;Professors Computables;Lloc;Tipus;Àmbit;Jornada;Objectiu\n";    
            
        $consulta="SELECT tbl_sortida.codi_sortida,tbl_sortida.inici_sortida,tbl_sortida.final_sortida,tbl_clase.nom_classe,tbl_etapa.nom_etapa,tbl_sortida.n_acompanyants,tbl_sortida.numero_alumnes,tbl_sortida.profesor_asignat,tbl_sortida.n_vetlladors,tbl_sortida.id_clase,tbl_sortida.id_sortida,tbl_activitat.nom_activitat,tbl_activitat.lloc_activitat,tbl_activitat.tipus_activitat,tbl_activitat.ambit_activitat,tbl_activitat.jornada_activitat,tbl_activitat.objectiu_activitat,tbl_activitat.id_activitat,tbl_sortida.id_precios,tbl_activitat.id_contacte_activitat,tbl_sortida.id_transport from tbl_etapa inner join tbl_clase on tbl_etapa.id_etapa=tbl_clase.id_etapa inner join tbl_sortida on tbl_clase.id_clase=tbl_sortida.id_clase inner join tbl_activitat on tbl_sortida.id_sortida=tbl_activitat.id_sortida";

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
    }           
    
break;

case '2':
//Profesores

   // Vamos a mostrar en las celdas las columnas que queremos que aparezcan en la primera fila, separadas por ; 
        echo "Sortida;Codi;Inici Sortida;Final Sortida;Clase;Etapa;profesor asignat;Acompanyants;Vetlladors;Alumnes;Transport;Hora sortida;Hora Arribada;Comentari Transport;Activitat;Lloc;Tipus Activitat;Àmbit;Jornada;Objectiu;Persona de Contacte;Email de Contacte;Telefon de contacte;Web de Contacte\n";    

            //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_contacte_activitat ON tbl_contacte_activitat.id_contacte_activitat=tbl_activitat.id_contacte_activitat INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa WHERE tbl_sortida.inici_sortida >= '$fecha_actual'";

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
	break;

case '3':
//Secretaria

      // Vamos a mostrar en las celdas las columnas que queremos que aparezcan en la primera fila, separadas por ; 
        echo "Codi;Sortida;Etapa;Clase;Inici;Final;Professor Assignat;Vetlladors;Professors;Alumnes;Activitat;Lloc;Jornada;Tipus;Ambit;Objectiu;Transport;Hora Sortida; Hora Arribada;Comentari Transport;Persona de Contacte; Web de Contacte; Telefon de Contacte; Email de Contacte\n";    
            
      $consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_contacte_activitat ON tbl_contacte_activitat.id_contacte_activitat=tbl_activitat.id_contacte_activitat INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa";
    $exe=mysqli_query($conn,$consulta);

     while ($row=mysqli_fetch_array($exe)){


             echo  $row['codi_sortida'].";"
                  .$row['nom_activitat'].";"
                  .$row['nom_etapa'].";"
                  .$row['nom_classe'].";"
                  .$row['inici_sortida'].";"
                  .$row['final_sortida'].";"
                  .$row['profesor_asignat'].";"
                  .$row['n_vetlladors'].";"
                  .$row['profes_a_part'].";"
                  .$row['numero_alumnes'].";"
                  .$row['nom_activitat'].";" 
                  .$row['lloc_activitat'].";"
                  .$row['tipus_activitat'].";"
                  .$row['ambit_activitat'].";"
                  .$row['jornada_activitat'].";"
                  .$row['objectiu_activitat'].";"
                  .$row['nom_transport'].";"
                  .$row['hora_sortida'].";"
                  .$row['hora_arribada'].";"
                  .$row['comentaris_transport'].";"
                  .$row['persona_contacte'].";"
                  .$row['web_contacte'].";"
                  .$row['telefon_contacte'].";"
                  .$row['email_contacte']."\n";

}

	break;

case '4':
//cocina

   // Vamos a mostrar en las celdas las columnas que queremos que aparezcan en la primera fila, separadas por ; 
        echo "Nom Sortida;Inici Sortida;Final Sortida;Clase;Etapa;Acompanyants;Alumnes;Profesor asignat\n";    

            //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT tbl_sortida.id_sortida,tbl_sortida.codi_sortida,tbl_activitat.nom_activitat,tbl_sortida.inici_sortida,tbl_sortida.final_sortida,tbl_sortida.comanda_menu,tbl_clase.nom_classe,tbl_etapa.nom_etapa,tbl_sortida.n_acompanyants,tbl_sortida.numero_alumnes,tbl_sortida.profesor_asignat,tbl_sortida.n_vetlladors,tbl_sortida.id_clase,tbl_sortida.id_sortida from tbl_etapa inner join tbl_clase on tbl_etapa.id_etapa=tbl_clase.id_etapa inner join tbl_sortida on tbl_clase.id_clase=tbl_sortida.id_clase inner join tbl_activitat on tbl_sortida.id_sortida=tbl_activitat.id_sortida WHERE tbl_sortida.inici_sortida >= '$fecha_actual'";

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
	break;

case '5':
  // Vamos a mostrar en las celdas las columnas que queremos que aparezcan en la primera fila, separadas por ; 
        echo "Codi;Activitat;Etapa;Clase;Inici Sortida;Final Sortida;Hora Sortida;Hora Arribada;Vetlladors;Profes a Part;Nº d'alumnes;Activitat;Profesor Asignat;Transport;Jornada\n";    
           
            //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa WHERE tbl_sortida.inici_sortida >= '$fecha_actual'";

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
	break;


case '6':
  // Vamos a mostrar en las celdas las columnas que queremos que aparezcan en la primera fila, separadas por ; 
        echo "Codi;Activitat;Etapa;Clase;Inici Sortida;Final Sortida;Hora Sortida;Hora Arribada;Vetlladors;Profes a Part;Nº d'alumnes;Activitat;Profesor Asignat;Transport;Jornada\n";    
           
            //consulta para saber los datos de las salidas y el transporte
$consulta="SELECT * FROM tbl_sortida INNER JOIN tbl_activitat ON tbl_activitat.id_sortida=tbl_sortida.id_sortida INNER JOIN tbl_transport ON tbl_transport.id_transport=tbl_sortida.id_transport INNER JOIN tbl_nom_transport ON tbl_transport.id_nom_transport=tbl_nom_transport.id_nom_transport INNER JOIN tbl_clase ON tbl_clase.id_clase=tbl_sortida.id_clase INNER JOIN tbl_etapa ON tbl_clase.id_etapa=tbl_etapa.id_etapa WHERE tbl_sortida.inici_sortida >= '$fecha_actual'";

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
	break;

}

     exit;    
}else{
	header("location: ../vista/home.php");
}
?>