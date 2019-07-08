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
    <link rel="icon" href="img/lg1/ico-vent3.ico" />

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
 <?php
 $page = 'productos';
include ('header1.php');
 ?>
    
    <section class="content vent">
        <form action="" class="form-venta" method="POST">
        <h3>Vendedor:</h3>
            <select name="" id="">
                <option value="Julio"></option>
                <option value="Winnie"></option>
                <option value="Chucho"></option>
                <option value="Pastrana"></option>
                <option value="Crespo"></option>
            </select>
            <br><br>
            <section class="cliente">
                <div class="col1">
                    <h4>Datos del cliente</h4>
                    <hr>
                    <br>
                    <label for="">Cliente:</label>
                    <select name="" id="">
                        <option value="">julio</option>
                        <option value="">winnie</option>
                        <option value="">otros</option>
                    </select>
                    <br><br>
                    <label for="">RFC:</label>
                    <input type="text" value="prueba"> 
                    <br><br>
                    <label for="">Direción:</label>
                    <input type="text" value="prueba">
                    <br><br>
                    <label for="">Teléfono: </label>
                    <input type="text" value="prueba"> 
                    <br><br>
                </div>
                <div class="prod">
                <button>Cargar Producto</button>
                </div>
            </section>
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
        <div class="coltot">
                <hr>
                <label for="">Subtotal</label>
                <input type="text">
                <br><br>
                <label for="">IVa</label>
                <input type="text">
                <br><br>
                <label for="">Total</label>
                <input type="text">
                <br><br>
            </div>
            <button name="btn-gr" class="btn-gd">Guardar</button>
            <br><br>
            <button class="btn-gd">Generar Factura</button>
        </form>
        




    </section>




</body>
</html>