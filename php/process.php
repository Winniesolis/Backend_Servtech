<?php 
session_start();
include "conection.php";
if(!empty($_POST)){
$q1 = $con->query("insert into venta(idcliente,totalVN) value(\"$_POST[email]\",123)");
if($q1){
$cart_id = $con->insert_id;
foreach($_SESSION["cart"] as $c){
$q1 = $con->query("insert into detalleventa(idproducto,cantidad,precio,idventa) value($c[product_id],$c[q],$c[q],$cart_id)");
}
unset($_SESSION["cart"]);
}
}
print "<script>alert('Venta procesada exitosamente');window.location='../ventas.php';</script>";
?>