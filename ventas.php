<?php 
session_start();
if (empty($_SESSION['active'])) {
    header('location: login.php');
}
include('conexion.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Usuarios │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/J-style.css">
     <!-- script´s -->
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script><!-- Importa la libreria -->
    <script type="text/javascript" src="js/functions.js"></script><!-- Llama a la funcion -->
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <header>
        <section class="principal">
            <img src="img/logo-ST.PNG" alt="">
            <!-- <h1>Usuarios</h1> -->
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
               <li><a href="Graficas/Gindex.php"><i class="fas fa-home p-ico"><br><span>Inicio</span></i></a></li>
               <li><a href="usuarios.php" ><i class="fas fa-user active"><br><span>Usuarios</span></i></a></li>
               <li><a href="productos.php"><i class="fas fa-laptop"><br><span>Productos</span></i></a></li>
               <li><a href="servicios.php"><i class="fas fa-handshake"><br><span>Servicios</span></i></a></li>
               <!-- <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt"><br><span>Ubicacion</span></i></a></li> -->
               <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
               <li><a href="otros.php"><i class="fas fa-ad"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <h1>Datos del cliente</h1>
    <label for="">cliente</label>
    <select name="" id="">
        <option value="">julio</option>
        <option value="">winnie</option>
        <option value="">otros</option>
    </select>
    <label for="">RFC:</label>
    <input type="text" value="prueba"> 
    <label for="">Direciion:</label>
    <input type="text" value="prueba">
    <label for="">Telefono: </label>
    <input type="text" value="prueba"> 
    <br><br>
    <h1>Vendedor</h1>
    <label for="">Julio</label><br><br>
    <button>Buscar Producto</button>
    <br><br>
    <table>
        <tr class="tab-princ">
                    <td>ID</td>
                    <td>Producto</td>
                    <td>Descripcion</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Acciones</td>
                </tr>
    </table>
    <label for="">Subtotal</label>
    <input type="text">
    <br>
    <label for="">IVa</label>
    <input type="text">
    <br>
    <label for="">Total</label>
    <input type="text">
    </section>
    </section>
</body>
</html>