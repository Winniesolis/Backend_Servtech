<?php 
session_start();
if (empty($_SESSION['active'])) {
    header('location: login.php');
}
//Combos

//Combos
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
    //modal
        
    //modal
 ?>
    
    <section class="content vent">


        <form action="" class="form-venta" method="POST">
        <h3>Vendedor:</h3>
        <?php 
            $queryvendedor = mysqli_query($mysqli,"SELECT idusuarioLog, nickName FROM usuariolog ORDER BY nickName ASC ");
            $result_vendedor = mysqli_num_rows($queryvendedor);
        ?>
            <select name="vendedor" id="vendedor" placeholder="Vendedor">
        <?php 
            if ($result_vendedor > 0) 
            {
                while ( $vendedor = mysqli_fetch_array($queryvendedor)) {
                    
        ?>
                <option value="<?php echo $vendedor['idusuarioLog']; ?>"><?php echo $vendedor['nickName']?></option>
        <?php
                }
            }
        ?>

            </select>
            <br><br>
            <section class="cliente">
                <div class="col1">
                    <h4>Datos del cliente</h4>
                    <hr>
                    <br>
                    <label for="">Cliente:</label>
                    <?php 
                        $query_cliente = mysqli_query ($mysqli, "SELECT idcliente, nombreC, RFC, telefonoC, correoC, direccionC FROM cliente ORDER BY nombreC");
                        $result_cliente = mysqli_num_rows($query_cliente);
                      //$result_cliente = mysqli_new_rows($query_cliente);
                    ?>
                    <select name="cliente" id="cliente" placeholder="Cliente">
                    <?php 
                        if ($result_cliente > 0) 
                        {
                            while ($cliente = mysqli_fetch_array($query_cliente)) 
                            {
                    ?>
                        <option value="<?php echo $cliente['idcliente'];?>"><?php echo $cliente['nombreC']?></option> 
                       <?php
                            }
                        }
                    ?>
                    </select>
                    <br><br>
                     <label for="">Cliente:</label>
                    <input  type="text" value="<?php echo $cliente['RFC'];?>" disabled> 
                    <br><br>
                    <label for="">RFC:</label>
                    <input  type="text" value="asdas" disabled> 
                    <br><br>
                    <label for="">Direción:</label>
                    <input type="text" value="" disabled>
                    <br><br>
                    <label for="">Teléfono: </label>
                    <input type="text" value="" disabled> 
                    <br><br>
                    <label for="">Correo: </label>
                    <input type="text" value="" disabled> 
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
            <tr class="">
                <td>1</td>
                <td>Server</td>
                <td>ksdhfh </td>
                <td>100001</td>
                <td>1</td>
                <td class="btn-table">
                    <a onclick="event.preventDefault(); del_product_detalle(1);"><button><i class="fas fa-trash-alt"></i></button>
                    </td>
            </tr>
        </table>
        <div class="coltot">
                <hr>
                <label for="">Subtotal</label>
                <input type="text" value="">
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
        <!-- Modal-->
         <?php
        if ($_SESSION['tpus'] != 2 && $_SESSION['tpus'] != 3) {
            echo "<br><br><br><br>";
        } else {
            echo "<a href='javascript:Abrir()'><i class='nuevo fas fa-plus-square'> Nuevo</i></a>";
        }
        ?>
        <div class="ventana" id="vent">
            <a href="javascript:Cerrar()"><i class="fas fa-times"></i></a>
            <h3>Alta de Clientes</h3>
            <a href="clientes.php"></i></a>
            <form action="clientes.php" method="POST" class="form1 form-client">
                <label for="">Nombre(s):</label>
                <input type="text" placeholder="Nombre(s)" name="nombreC">
                <br> <br>
                <label for="">Empresa:</label>
                <select name="empresa" id="">
                    <?php
                    while ($datossc = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $datossc['idempresa'] ?>"><?php echo $datossc['nombreE'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <label for="">RFC</label>
                <input type="text" placeholder="RFC" name="RFC">
                <br> <br>
                <label for="">Telefono:</label>
                <input type="tel" placeholder="Telefono" name="telefono">
                <br> <br>
                <label for="">Correo</label>
                <input type="email" placeholder="Correo" name="correo">
                <br> <br>
                <label for="">Dirección:</label>
                <input type="text" placeholder="Dirección" name="direccion">
                <br><br>
                <div class="btns">
                    <input type="submit" href="javascript:Cerrar()" name="cerrar" value="Cerrar" class="btnform">
                    <input type="submit" name="guardar_us" value="Guardar" class="btnform">
                </div>
                </center>
            </form>

        </div>
        
        <!-- Modal-->
    </section>
      <script>
        function Abrir() {
            document.getElementById("vent").style.display = "block";
        }

        function Cerrar() {
            document.getElementById("vent").style.display = "none";
        }

        function AbTip() {
            document.getElementById("vent").style.display = "none";
            document.getElementById("vent-us").style.display = "block";

        }
    </script>
</body>
</html>