<?php 
$idcliente = $_POST['idcliente'];
include('conexion.php');
 $query_cliente = mysqli_query ($mysqli, "SELECT idcliente, nombreC, RFC, telefonoC, correoC, direccionC FROM cliente WHERE idcliente = '$idcliente'");
 $data = mysqli_fetch_array($query_cliente);
$nombreC 	= $data['nombreC'];
$RFC 		= $data['RFC'];
$telefonoC	= $data['telefonoC'];
$correoC 	= $data['correoC'];
$direccionC	= $data ['direccionC'];

?>
<h4>Datos del cliente</h4>
<hr>
<br>
<?php 
    $query_cliente = mysqli_query ($mysqli, "SELECT idcliente, nombreC, RFC, telefonoC, correoC, direccionC FROM cliente ORDER BY nombreC");
    $result_cliente = mysqli_num_rows($query_cliente);
                      //$result_cliente = mysqli_new_rows($query_cliente);
?>
<select name="cliente" id="cliente" placeholder="Cliente" onchange="select_cliente();">
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
</select><br><br>
<input type="hidden" name="email" value="<?php echo $data['idcliente'] ?>"><br><br>
 <label for="">Cliente:</label>
<input  type="text" value="<?php echo $data['nombreC'] ?>" disabled> 
<br><br>
<label for="">RFC:</label>
<input  type="text" value="<?php echo $data['RFC'] ?>" disabled> 
<br><br>
<label for="">Direción:</label>
<input type="text" value="<?php echo $data['direccionC'] ?>" disabled>
<br><br>
<label for="">Teléfono: </label>
<input type="text" value="<?php echo $data['telefonoC'] ?>" disabled> 
<br><br>
<label for="">Correo: </label>
<input type="text" value="<?php echo $data['correoC'] ?>" disabled> 
<br><br>         		
<?php 

?>