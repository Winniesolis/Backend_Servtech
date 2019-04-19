<?php

 
    $host ="localhost";
    $usuario = "root";
    $clave = "";
    $db = "servtech_v0";
    
    $conexion = mysqli_connect($host,$usuario,$clave,$bd);

    if($conexion){
        echo "Conectado correctamente";
    }else{
        echo "algo fallo";
    }

?>