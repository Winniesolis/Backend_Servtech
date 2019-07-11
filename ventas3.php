<?php 
session_start();
if (empty($_SESSION['active'])) {
    header('location: login.php');
}
//Combos
include('conexion.php');
$query = mysqli_query($mysqli, "SELECT idempresa, nombreE FROM empresa");
if (isset($_POST['empresa'])) {
    $empresa = $_POST['empresa'];
}
//Combos


?>
    <?php 
    if (isset($_POST['guardar_us'])) {
        $nombreC = $_POST['nombreC'];
        $empresa = $_POST['empresa'];
        $RFC = $_POST['RFC'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        print_r($empresa);
        $table2 = 'cliente';
        $mysqli->query("INSERT INTO $table2 (nombreC, idempresa, RFC, telefonoC, correoC, direccionC) VALUES ('$nombreC',$empresa,'$RFC','$telefono','$correo' ,'$direccion')");
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Ventas │ ServTech</title>
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
 $page = 'ventas';
include ('header1.php');
 ?>

    <section class="content vent">       
        <form action="" class="form-" method="POST">
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

          
            <br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Productos</h1>
            <a href="./cart.php" class="btn btn-warning">Ver Carrito</a>
            <br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $mysqli->query("select * from producto");
?>
<table class="table table-bordered">
<thead>
    <th>Producto</th>
    <th>Precio</th>
    <th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
while($r=$products->fetch_object()):?>
<tr>
    <td><?php echo $r->nombrePD;?></td>
    <td>$ <?php echo $r->precioPD; ?></td>
    <td style="width:260px;">
    <?php
    $found = false;

    if(isset($_SESSION["cart"])){ 
        foreach ($_SESSION["cart"] as $c) {
         if($c["product_id"]==$r->idproducto){ $found=true; break; 
         }
        }
    }
    ?>
    <?php if($found):?>
        <a href="cart.php" class="btn btn-info">Agregado</a>
    <?php else:?>
    <form class="form-inline" method="post" action="./php/addtocart.php">
    <input  name="product_id" value="<?php echo $r->idproducto; ?>">
      <div class="form-group">
        <input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
      </div>
      <button type="submit" class="btn btn-primary">Agregar al carrito</button>
    </form> 
    <?php endif; ?>
    </td>
</tr>
<?php endwhile; ?>
</table>
<br><br><hr>
        </div>
    </div>
</div>
        </form>
        <!-- Modal-->
       

        <div class="ventana" id="vent">
            <a href="javascript:Cerrar()"><i class="fas fa-times"></i></a>
            <h3>Alta de Clientes</h3><br>
            <a href="clientes.php"></i></a>
            <form action="ventas.php" method="POST" class="form1 form-client">
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
                    <input type="submit" name="guardar_us" value="Guardar" class="btnform" href="Ventas.php">
                        <input type="submit" href="javascript:Cerrar()" name="cerrar" value="Cerrar" class="btnform">
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