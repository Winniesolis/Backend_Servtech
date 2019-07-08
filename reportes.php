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
    <title> Productos │ ServTech</title>
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
        <i class="fas fa-band-aid"></i>
        <h1>En mantenimiento</h1>
    </section>



        <!-- <section class="table1">
            <table>
                <tr class="tab-princ">
                    <td>Imagen</td>
                    <td>Nombre</td>
                    <td>Descipción</td>
                    <td>Precio</td>
                    <td>Proveedor</td>
                    <td>Tipo de Producto</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Imagen</td>
                    <td>Switch</td>
                    <td>Switch Administrable</td>
                    <td>$5220</td>
                    <td>Dell</td>
                    <td>Redes</td>
                    <td> 
                        <a href=""><i class="fas fa-plus-square"></i></a>
                        <a href=""><i class="fas fa-edit"></i></a>
                        <a href=""><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Imagen</td>
                    <td>Switch</td>
                    <td>Switch Administrable</td>
                    <td>$5220</td>
                    <td>Dell</td>
                    <td>Redes</td>
                    <td> 
                        <a href=""><i class="fas fa-plus-square"></i></a>
                        <a href=""><i class="fas fa-edit"></i></a>
                        <a href=""><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Imagen</td>
                    <td>Switch</td>
                    <td>Switch Administrable</td>
                    <td>$5220</td>
                    <td>Dell</td>
                    <td>Redes</td>
                    <td> 
                        <a href=""><i class="fas fa-plus-square"></i></a>
                        <a href=""><i class="fas fa-edit"></i></a>
                        <a href=""><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Imagen</td>
                    <td>Switch</td>
                    <td>Switch Administrable</td>
                    <td>$5220</td>
                    <td>Dell</td>
                    <td>Redes</td>
                    <td> 
                        <a href=""><i class="fas fa-plus-square"></i></a>
                        <a href=""><i class="fas fa-edit"></i></a>
                        <a href=""><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            </table>
        </section> -->
    </section>







</body>
</html>