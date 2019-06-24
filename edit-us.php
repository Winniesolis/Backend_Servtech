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
    // echo $claveid."       mostrando clave id";

    include('conexion.php');
//combos
    $query = mysqli_query($mysqli,"SELECT idsucursal, nombreSC FROM sucursal ORDER BY `idsucursal` ASC");
    if(isset($_POST['sucursal']))
    {
        $sucursal =$_POST['sucursal'];
    }
    // tipo de usuario
    $query1 = mysqli_query($mysqli,"SELECT idtipousuario, nombreTU FROM tipousuario ORDER BY `idtipousuario` ASC");

    if(isset($_POST['tipUs']))
    {
        $tipUs =$_POST['tipUs'];
    }
//combos

// mostrar datos en inputs
    if(empty($_REQUEST['id'])){
        header("location: usuarios.php");
    }else{
        $claveid = $_REQUEST['id'];
        if(!is_numeric($claveid)){

            header("location: usuarios.php");
        }
    } 
    $queryus = mysqli_query($mysqli, "SELECT * FROM persona INNER JOIN usuariolog ON persona.idpersona = usuariolog.idpersona INNER JOIN tipousuario ON usuariolog.idtipousuario = tipousuario.idtipousuario INNER JOIN sucursal ON persona.idsucursal = sucursal.idsucursal WHERE persona.idpersona = $claveid ");
   
    $result_usuario = mysqli_num_rows($queryus);
    if($result_usuario > 0){
        $data_usuario = mysqli_fetch_assoc($queryus);

        // print_r($data_usuario);
    }

    if(isset($_POST['edtit-us'])){
        $alert = '';
        if(empty($_POST['nombres'])  || empty($_POST['apellidos'])  || empty($_POST['correo'])  || empty($_POST['telefono'])){
            echo 'entramos a editar';
            $alert = "<script>alert('Datos incompletos');</script>";
        }else{
            $claveid = $_POST['id'];
            $codus = $_POST['id'];
            $nomb = $_POST['nombres'];
            $ape = $_POST['apellidos'];
            $cor = $_POST['correo'];
            $tel = $_POST['telefono'];
            $suc = $_POST['sucursal'];
            $tipus = $_POST['tipUs'];

            $mysqli->query("UPDATE persona SET nombres = '$nomb', apellidos = '$ape', correo = '$cor', telefono ='$tel', idsucursal = $suc WHERE idpersona = $claveid");
            if($mysqli){
                header ("location: usuarios.php");
            }else{
            echo "<script>alert('Error al editar datos');</script>";
            }
        }

    }
    if(isset($_POST['cerrar'])){
        header ("location: usuarios.php");

    }




    // $queryus = mysqli_query($mysqli, "SELECT * FROM persona WHERE idpersona = $claveid ");
    //     $datosus = mysqli_fetch_array($queryus);

    //     $idtipus = $datosus['idtipousuario'];
    //     echo $idtipus."   Mostrando datos tip US";
    // $querytipus = mysqli_query($mysqli, "SELECT * FROM tipousuario WHERE idpersona = $claveid ");





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Usuarios │ ServTech</title>
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
               <li><a href="usuarios.php" ><i class="fas fa-user active"><br><span>Usuarios</span></i></a></li>
               <li><a href="productos.php"><i class="fas fa-laptop"><br><span>Productos</span></i></a></li>
               <li><a href="servicios.php"><i class="fas fa-handshake"><br><span>Servicios</span></i></a></li>
               <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt"><br><span>Ubicacion</span></i></a></li>
               <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
               <li><a href="otros.php"><i class="fas fa-ad"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <section class="tabedit">
            <h1>Editar usuario</h1>
            <form action="edit-us.php" method="post" name="form-editus" class="form-editus">
            <input type="text" placeholder="id" name="id" class="disp-none" require value="<?php echo $data_usuario['idpersona'] ?>" >

            
                <label for="">Nombre(s)</label>
                <br>
                <input type="text" placeholder="Nombre(s)" name="nombres" require value="<?php echo $data_usuario['nombres'] ?>" >
                <br><br>
                <label for="">Apellido(s)</label>
                <br>
                <input type="text" placeholder="Apellido(s)" name="apellidos" require value="<?php echo $data_usuario['apellidos'] ?>">
                <br><br>
                <label for="">Coreo</label><br>
                <input type="email" placeholder="Correo" name="correo" require value="<?php echo $data_usuario['correo'] ?>">
                <br><br>
                <label for="">Telefono</label>
                <br>
                <input type="tel" placeholder="Telefono" name="telefono" require value="<?php echo $data_usuario['telefono'] ?>"> 
                <br><br>
                <label for="">Sucursal</label>
                <br>
                <select name="sucursal" id="" class="notItemOne">
                <option value="<?php echo $data_usuario['idsucursal']?>" selected><?php echo $data_usuario['nombreSC']?></option>
                    <?php
                        while ($datos = mysqli_fetch_array($query))
                        {
                    ?>
                    <option value="<?php echo$datos['idsucursal']?>"><?php echo $datos['nombreSC']?></option>
                    <?php
                        }
                    ?>
                </select>
                <br><br>
                <label for="">Tipo de usuario</label>
                <br>
                <select name="tipUs" id="" class="notItemOne">
                    <option value="<?php echo $data_usuario['idtipousuario']?>" selected><?php echo $data_usuario['nombreTU']?></option>
                    <?php
                        while ($datos1 = mysqli_fetch_array($query1))
                        {
                    ?>
                    <option value="<?php echo$datos1['idtipousuario']?>"><?php echo $datos1['nombreTU']?></option>
                    <?php
                        }
                    ?>
                </select>
                <section>
                    <input type="submit" name="edtit-us" value="Guardar" class="btnform">
                    <input type="submit" name="cerrar" value="Cerrar" class="btnform">
                </section>
            </form>


        </section>

    </section>
</body>
</html>