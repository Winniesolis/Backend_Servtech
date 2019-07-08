<?php
session_start();

if (empty($_SESSION['active'])) {
    // $alert = "EL usuario o contraseña es incorrecto";
    header('location: login.php');
}
include('../conexion.php');
if (isset($_GET['id'])) {
    $claveid = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Respaldo | Servtech</title>
    <link rel="stylesheet" href="../css/style.css">
     <link rel="icon" href="../img/lg1/ico-vent3.ico"/>
     <!-- font-awasome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<?php
 $page = 'respaldo';
include ('../header1.php');
 ?>
<body class="resp-idx">
	<a class="ind-resp" href="./Backup.php">Realizar copia de seguridad</a>
	<form action="./Restore.php" method="POST">
		<label>Selecciona un punto de restauración</label><br>
		<select name="restorePoint">
			<option value="" disabled="" selected="">Selecciona un punto de restauración</option>
			<?php
				include_once './conect.php';
				$ruta=BACKUP_PATH;
				if(is_dir($ruta)){
				    if($aux=opendir($ruta)){
				        while(($archivo = readdir($aux)) !== false){
				            if($archivo!="."&&$archivo!=".."){
				                $nombrearchivo=str_replace(".sql", "", $archivo);
				                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                $ruta_completa=$ruta.$archivo;
				                if(is_dir($ruta_completa)){
				                }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                }
				            }
				        }
				        closedir($aux);
				    }
				}else{
				    echo $ruta." No es ruta válida";
				}
			?>
		</select>
		<button type="submit" >Restaurar</button>
	</form>
</body>
</html>
