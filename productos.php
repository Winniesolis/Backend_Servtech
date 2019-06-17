<?php
    include ('conexion.php');
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
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<header>
        <section class="principal">
            <img src="img/logo-ST.PNG" alt="">
            <h1>Productos</h1>
        </section>
        <section class="usuario">
            <ul>
                <li><a href=""><img src="img/winnie.png" alt=""></a>
                    <ul class="sub-nav">
                        <div>
                            <div>
                                <h5>Winnie Solis</h5>
                                <h6>Administrador</h6>
                            </div>
                            <li><a href="salir.php">Cerrar Sesion</a></li>
                            <li><a href="http://www.servtechweb.com.mx/">Ir al FrontEnd</a></li>
                            <li><a href="respaldos/index-respaldo.php">Hacer Respaldo</a></li>
                        </div>
                    </ul>
                </li>
            </ul>   
        </section>
        <nav>
            <ul class="nav-icon">
               <li><a href="2index.php"><i class="fas fa-home p-ico"><br><span>Inicio</span></i></a></li>
               <li><a href="usuarios.php" ><i class="fas fa-user"><br><span>Usuarios</span></i></a></li>
               <li><a href="productos.php"><i class="fas fa-laptop active"><br><span>Productos</span></i></a></li>
               <li><a href="servicios.php"><i class="fas fa-handshake"><br><span>Servicios</span></i></a></li>
               <!-- <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt"><br><span>Ubicacion</span></i></a></li> -->
               <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
               <li><a href="otros.php"><i class="fas fa-ad"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <section class="table1">
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
        </section>
    </section>







</body>
</html>