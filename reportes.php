<?php
session_start();

if (empty($_SESSION['active'])) {
    // $alert = "EL usuario o contraseña es incorrecto";
    header('location: login.php');

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Reportes │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/lg1/ico-vent3.ico"/>
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<?php
 $page = 'reportes';
include ('header1.php');
 ?>
    <section class="content">
    <section class="mantenimiento">
        <label for="">Generar reporte de Productos</label>
        <a target="_blank" href="rproducto.php"><i class="fas fa-file-pdf"></i></a>
        <br><br>
         <label for="">Generar reporte de Usuarios</label>
        <a target="_blank" href="rusuario.php"><i class="fas fa-file-pdf"></i></a>
        <br><br>
         <label for="">Generar reporte de Servicios</label>
        <a target="_blank" href="rservicios.php"><i class="fas fa-file-pdf"></i></a>
    </section>
    </section>
</body>
</html>