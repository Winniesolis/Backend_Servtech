<?php
	include('conexion.php');

	$imagen=$_files['imagen']['temp_name'];
	$ruta="imagen";
	move_uploaded_file($imagen,$ruta)
	$query1=mysql_query("INSERT INTO galeria VALUES('','".$ruta."')");

	if ($query1) {
		echo "se inserto";
	}

?>