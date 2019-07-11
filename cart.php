<?php
//unset($_SESSION["cart"]);
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "conexion.php";
?>
<!DOCTYPE html>
<html>
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
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Carrito</h1>
			<a href="./ventas.php" class="btn btn-default">Ventas</a>
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $mysqli->query("select * from producto");
if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
?>
<table class="table table-bordered">
<thead>
	<th>Cantidad</th>
	<th>Producto</th>
	<th>Precio Unitario</th>
	<th>Total</th>
	<th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
foreach($_SESSION["cart"] as $c):
$products = $mysqli->query("SELECT * from producto where idproducto='$c[product_id]'");

$r = $products->fetch_object();
?>
<tr>
<th><?php echo $c["q"];?></th>
	<td><?php echo $r->nombrePD;?></td>
	<td>$ <?php echo $r->precioPD; ?></td>
	<td>$ <?php echo $c["q"]*$r->precioPD; ?></td>
	<td style="width:260px;">
	<?php
	$found = false;
	foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->idproducto){ $found=true; break; }}
	?>
		<a href="php/delfromcart.php?id=<?php echo $c["product_id"];?>" class="btn btn-danger">Eliminar</a>
	</td>
</tr>
<?php endforeach; ?>
</table>
<section class="content vent">

<form class="form-horizontal" method="post" action="./php/process.php">
  <div class="form-group">
   
  </div> <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Procesar Venta</button>
    </div>
  </div>

           <div class="col1" id="panel_selector">
           			<h4>Datos del cliente</h4>
<hr>
<br>
                   
                    
                    <?php 
                        $query_cliente = mysqli_query ($mysqli, "SELECT idcliente, nombreC, RFC, telefonoC, correoC, direccionC FROM cliente ORDER BY nombreC");
                        $result_cliente = mysqli_num_rows($query_cliente);
                      //$result_cliente = mysqli_new_rows($query_cliente);
                    ?>
                    <select name="cliente" id="cliente" onchange="select_cliente();">
                        <option value="">Seleciona al cliente</option>
                    <?php 
                        if ($result_cliente > 0) 
                        {
                            while ($cliente = mysqli_fetch_array($query_cliente)) 
                            {
                                $idcliente = $cliente['idcliente'];
                                $nombrecliente= $cliente['nombreC'];
                    ?>
                        <option value="<?php echo $idcliente;?>"><?php echo $nombrecliente?></option> 
                       <?php
                            }
                        }
                    ?>
                    </select>
                    <br><br>
<input type="hidden" name="email" value="<?php echo $data['idcliente'] ?>"><br><br>
 <label for="">Cliente:</label>
<input  type="text"disabled> 
<br><br>
<label for="">RFC:</label>
<input  type="text" disabled> 
<br><br>
<label for="">Direción:</label>
<input type="text"  disabled>
<br><br>
<label for="">Teléfono: </label>
<input type="text"  disabled> 
<br><br>
<label for="">Correo: </label>
<input type="text" disabled> 
<br><br> 
          
                </div>
 
</form>
</section>

<?php else:?>
	<p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif;?>
<br><br><hr>
		</div>
	</div>
</div>
</body>
</html>