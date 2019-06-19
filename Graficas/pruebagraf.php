<?php
	include '../conexion.php';
    // invitado
    $query1 = mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 1");
    while($datostable = mysqli_fetch_array($query1)){
        $cont = $datostable['count(*)'];
        print_r($cont)."\r";
    }
   //sUPERVISOR
   $query2 = mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 2");
   while($datostable2 = mysqli_fetch_array($query2)){
       $cont2 = $datostable2['count(*)'];
       print_r($cont2)."\r";
   }
   //EJECUTIVO
   $query3 = mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 3");
   while($datostable3 = mysqli_fetch_array($query3)){
       $cont3 = $datostable3['count(*)'];
       print_r($cont3)."\r";
   }
     //OPERACIONAL
     $query4 = mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 4");
     while($datostable4 = mysqli_fetch_array($query4)){
         $cont4 = $datostable4['count(*)'];
         print_r($cont4)."\r";
     }
   //CLIENTES
   $query5 = mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 5");
   while($datostable5 = mysqli_fetch_array($query5)){
       $cont5 = $datostable5['count(*)'];
       print_r($cont5)."\r";
   }








    // $querycont1= mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 1");
    // $querycont1=mysql_query($sql) or die (mysql_error());
    // while($row=mysql_fetch_array($querycont1)){
    //    $count=$row[0];
    // }
    

	

?>