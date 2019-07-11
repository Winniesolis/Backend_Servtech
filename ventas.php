<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "conexion.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Ventas │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/J-style.css">
    <link rel="icon" href="img/lg1/ico-vent3.ico"/>
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
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Productos</h1>
            <a href="./cart.php" class="btn btn-warning">Ver carrito<i class="fas fa-cart-plus"></i></a>
            <br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $mysqli->query("select * from producto");
?>
<table class="table table-bordered">
<thead class="tab-princ">
    <th>Producto</th>
    <th>Precio</th>
    <th>Foto</th>
    <th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
while($r=$products->fetch_object()):?>
   <?php
    $foto = 'img/uploads/'.$r->foto;
   ?>
<tr>
    <td><?php echo $r->nombrePD;?></td>
    <td>$ <?php echo $r->precioPD; ?></td>
    <td class="img_producto"><img src="<?php echo $foto; ?>" alt=""></td>
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
    <input  type="hidden"name="product_id" value="<?php echo $r->idproducto; ?>">
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
</body>
</html>