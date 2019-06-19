<?php
session_start();

if (empty($_SESSION['active'])) {
    // $alert = "EL usuario o contraseña es incorrecto";
    header('location: login.php');

}
    if(isset($_GET['id']))
    {
        $claveid = $_GET['id'];
    }
    include('conexion.php');
    if(empty($_REQUEST['id'])){
        header("location: servicios.php");
    }else{
        $claveid = $_REQUEST['id'];
        if(!is_numeric($claveid)){

            header("location: servicios.php");
        }
    } 
    $querysrv = mysqli_query($mysqli, "SELECT * FROM servicio INNER JOIN tiposervicio ON servicio.idtiposervicio = tiposervicio.idtiposervicio INNER JOIN empleado ON servicio.idempleado = empleado.idempleado INNER JOIN persona ON empleado.idpersona = persona.idpersona  WHERE servicio.idservicio = $claveid ");
   
    $result_serv = mysqli_num_rows($querysrv);
    if($result_serv > 0){
        $data_srv = mysqli_fetch_assoc($querysrv);
        print_r($data_srv);
    }

    if(isset($_POST['elim'])){
        $alert = '';

        $mysqli->query("DELETE FROM servicio WHERE servicio.idservicio =  $claveid ");
        
        if($mysqli){
            echo "<script>alert('Se ha eliminado el registro satisfactoriamente');</script>";
            header ("location: servicios.php");
        }else{
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
    <title>ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
     <!-- font-awasome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<header>
        <section class="principal">
            <img src="img/logo-ST.PNG" alt="">
        </section>
        <section class="usuario">
            <ul>
                <li><a href=""><img src="img/winnie.png" alt=""></a>
                    <ul class="sub-nav">
                        <div>
                            <div>
                                <h5>Winnie Solis</h5>
                                <h6>Administrador</h6>
                            </div>
                            <li><a href="salir.php">Cerrar Sesion</a></li>
                            <li><a href="http://www.servtechweb.com.mx/">Ir al FrontEnd</a></li>
                            <li><a href="respaldos/index-respaldo.php">Hacer Respaldo</a></li>
                        </div>
                    </ul>
                </li>
            </ul>   
        </section>
        <nav>
            <ul class="nav-icon">
               <li><a href="2index.php"><i class="fas fa-home p-ico"><br><span>Inicio</span></i></a></li>
               <li><a href="usuarios.php" ><i class="fas fa-user "><br><span>Usuarios</span></i></a></li>
               <li><a href="productos.php"><i class="fas fa-laptop"><br><span>Productos</span></i></a></li>
               <li><a href="servicios.php"><i class="fas fa-handshake active"><br><span>Servicios</span></i></a></li>
               <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt"><br><span>Ubicacion</span></i></a></li>
               <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
               <li><a href="otros.php"><i class="fas fa-ad"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
<section class="content">
    <?php include "conexion.php"; ?>
    <center>
        <section class="content_delete">
            <div class="img-profile">
                <i class="fas fa-user-circle"></i>
            </div>
            <h3>¿Está seguro que desea eliminar el siguiente registro?</h3>
            <br>
            <p>Nombre del servicio: <span><?php echo $data_srv ['nombreSV'];  ?></span></p>
            <p>Descripción del servicio: <span><?php echo $data_srv ['descripcionSV'];  ?></span></p>
            <p>Empleado: <span><?php echo $data_srv ['nombres'];  ?></span></p>
            <form action="" method="post" >
                <input type="hidden" name="idus" value="<?php echo $idus; ?>">
                <a href="usuarios.php" class="btn-cancel">Cancelar</a>
                <button type="submit" name="elim" class="btn-eli">Eliminar</button>
            </form>
        
        </section>
    </center>
</section>
</body>
</html>