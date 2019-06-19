<?php
session_start();

if (empty($_SESSION['active'])) {
    // $alert = "EL usuario o contraseña es incorrecto";
    header('location: login.php');

}
    include 'conexion.php';

//CONSULTAS 
$query4 = mysqli_query($mysqli, "SELECT idtiposervicio, nombreTS FROM tiposervicio ORDER BY `idtiposervicio` ASC");
$query5 = mysqli_query($mysqli, "SELECT * FROM empleado INNER JOIN persona ON empleado.idpersona = persona.idpersona INNER JOIN departamento on departamento.iddepartamento = empleado.iddepartamento ");




// END consultas
    if(isset($_GET['id']))
    {
        $claveid = $_GET['id'];
        
    }
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

    //
    if(isset($_POST['edtit-srv'])){
        $alert = '';
        if(empty($_POST['nombres'])  || empty($_POST['descripcion'])){
            $alert = "<script>alert('Datos incompletos');</script>";
        }else{
            $claveid = $_POST['id'];
            $codus = $_POST['id'];
            $nomb = $_POST['nombres'];
            $des = $_POST['descripcion'];
            $tipsrv = $_POST['tipserv'];
            $emplesrv = $_POST['emplesrv'];
            $mysqli->query("UPDATE servicio SET idtiposervicio = $tipsrv, nombreSV = '$nomb', descripcionSV = '$des', idempleado =$emplesrv WHERE idservicio = $claveid");
            if($mysqli){
                header ("location: servicios.php");
            }else{
            echo "<script>alert('Error al editar datos');</script>";
            }
        }
    }
    if(isset($_POST['cerrar'])){
        header ("location: servicios.php");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Servicios │ ServTech</title>
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
               <!-- <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt"><br><span>Ubicacion</span></i></a></li> -->
               <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
               <li><a href="otros.php"><i class="fas fa-ad"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <section class="tabedit">
            <h1>Editar servicio</h1>
            <form action="edit-srv.php" method="post" name="form-editus" class="form-editus">
            <input type="text" placeholder="id" name="id" class="disp-none" require value="<?php echo $data_srv['idtiposervicio'] ?>" >

            
                <label for="">Tipo de servicio</label>
                <br>
                <select name="tipserv" id="" class="notItemOne">
                <option value="<?php echo $data_srv['idtiposervicio']?>" selected><?php echo $data_srv['nombreTS']?></option>
                    <?php
                        while ($datos = mysqli_fetch_array($query4))
                        {
                    ?>
                    <option value="<?php echo$datos['idtiposervicio']?>"><?php echo $datos['nombreTS']?></option>
                    <?php
                        }
                    ?>
                </select>
                <br><br>
                <label for="">Nombre:</label>
                <input type="text" placeholder="Nombre" name="nombres" value="<?php echo $data_srv['nombreSV'] ?>">
                <br> <br>
                <label for="">Descripción:</label>
                <input type="text" placeholder="Descripcion" name="descripcion" value="<?php echo $data_srv['descripcionSV'] ?>">
                <br><br>
                <label for="">Empleado: </label>
                <select name="emplesrv" id="" class="notItemOne">
                <option value="<?php echo $data_srv['idempleado']?>" selected><?php echo $data_srv['nombres']?></option>
                    <?php
                        while ($datos2 = mysqli_fetch_array($query5))
                        {
                    ?>
                    <option value="<?php echo$datos2['idempleado']?>"><?php echo $datos2['nombres']?></option>
                    <?php
                        }
                    ?>
                </select>
                <br><br>
                <section>
                    <input type="submit" name="edtit-srv" value="Guardar" class="btnform">
                    <input type="submit" name="cerrar" value="Cerrar" class="btnform">
                </section>
            </form>


        </section>

    </section>
</body>
</html>