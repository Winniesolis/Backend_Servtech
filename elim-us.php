<?php

session_start();

if (empty($_SESSION['active'])) {
    // $alert = "EL usuario o contraseña es incorrecto";
    header('location: login.php');
}

if ($_SESSION['tpus'] != 2) {
    header("location: Graficas/Gindex.php");
}

if (isset($_GET['id'])) {
    $claveid = $_GET['id'];
}
include('conexion.php');
if (empty($_REQUEST['id'])) {
    header("location: usuarios.php");
} else {
    $claveid = $_REQUEST['id'];
    if (!is_numeric($claveid)) {

        header("location: usuarios.php");
    }
}
$queryus = mysqli_query($mysqli, "SELECT * FROM persona INNER JOIN usuariolog ON persona.idpersona = usuariolog.idpersona INNER JOIN tipousuario ON usuariolog.idtipousuario = tipousuario.idtipousuario INNER JOIN sucursal ON persona.idsucursal = sucursal.idsucursal WHERE usuariolog.idusuarioLog = $claveid ");
$result_usuario = mysqli_num_rows($queryus);
if ($result_usuario > 0) {
    $data_usuario = mysqli_fetch_assoc($queryus);
    $foto = '<img class = "imgproeli" id="img" src="img/uploads/'.$data_usuario['foto'].'"alt="Producto">';
    // print_r($data_usuario);
}

if (isset($_POST['elim'])) {
    $alert = '';

    $mysqli->query("DELETE FROM usuariolog WHERE usuariolog.idusuarioLog =  $claveid ");

    if ($mysqli) {
        echo "<script>alert('Se ha eliminado el registro satisfactoriamente');</script>";
        header("location: usuarios.php");
    } else {
        echo "<script>alert('Error al eliminar datos');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar Usuario │ServTech</title>
    <link rel="icon" href="img/lg1/ico-vent3.ico" />
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/J-style.css">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<?php
 $page = 'usuarios';
include ('header1.php');
 ?>
    <section class="content">
        <?php include "conexion.php"; ?>
        <center>
            <section class="content_delete">
                <i class="fas fa-user-circle"></i>
                <h3>¿Está seguro que desea eliminar el siguiente registro?</h3>
                <br>
                <p>NicName <span><?php echo $data_usuario['nickName'] ?></span></p>
                <p>Tipo Usuario: <span><?php echo $data_usuario['nombreTU'];  ?></span></p>
                <p>Contraseña: <span>******</span></p>
                <p>Sucursal del usuario: <span><?php echo $data_usuario['nombreSC'];  ?></span></p>
                
                <p><span><?php echo $foto; ?></span></p>
                <form action="" method="post">
                    <input type="hidden" name="idus" value="<?php echo $idus; ?>">
                    <a href="usuarios.php" class="btn-cancel">Cancelar</a>
                    <button type="submit" name="elim" class="btn-eli">Eliminar</button>
                </form>

            </section>
        </center>
    </section>



    //


</body>

</html>