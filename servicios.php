<?php
session_start();

if (empty($_SESSION['active'])) {
    // $alert = "EL usuario o contraseña es incorrecto";
    header('location: login.php');

}
include('conexion.php');
    if(isset($_GET['id']))
        {
            $claveid = $_GET['id'];
            
        }

$query4 = mysqli_query($mysqli, "SELECT idtiposervicio, nombreTS FROM tiposervicio ORDER BY `idtiposervicio` ASC");
if (isset($_POST['tipserv'])) {
    $tipserv = $_POST['tipserv'];
}
// tipo de usuario
$query1 = mysqli_query($mysqli, "SELECT * FROM empleado INNER JOIN persona ON empleado.idpersona = persona.idpersona INNER JOIN departamento on departamento.iddepartamento = empleado.iddepartamento ");

if (isset($_POST['emple'])) {
    $emple = $_POST['emple'];
    // echo $tipUs;
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
    <link rel="icon" href="img/lg1/ico-vent3.ico"/>
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <header>
        <section class="principal">
            <img src="img/lg1/logoj2.png" alt="">
            <h1>Servicios</h1>
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
                            <li><a href="http://www.servtechweb.com.mx">Ir al FrontEnd</a></li>
                            <li><a href="respaldos/index-respaldo.php">Hacer Respaldo</a></li>
                        </div>
                    </ul>
                </li>
            </ul>
        </section>
        <nav>
            <ul class="nav-icon">
                <li><a href="Graficas/Gindex.php"><i class="fas fa-home p-ico"><br><span>Inicio</span></i></a></li>
                <li><a href="usuarios.php"><i class="fas fa-user"><br><span>Usuarios</span></i></a></li>
                <li><a href="clientes.php"><i class="fas fa-user-tie"><br><span>Clientes</span></i></a></li>
                <li><a href="productos.php"><i class="fas fa-laptop"><br><span>Productos</span></i></a></li>
                <li><a href="servicios.php"><i class="fas fa-handshake active"><br><span>Servicios</span></i></a></li>
                <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
                <li><a href="otros.php"><i class="fas fa-ad"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <a href="javascript:Abrir()"><i class="fas fa-plus-square"> Nuevo</i></a> <!-- BOTON NUEVO QUE ABRE VENTANA  -->
        <div class="ventana" id="vent">
            <a href="javascript:Cerrar()"><i class="fas fa-times"></i></a>
            <h3>Alta de Servicios</h3>
            <a href="usuarios.php"></i></a>
            <form action="servicios.php" method="POST" class="form1">
                <label for="">Tipo de servicio: </label>
                <select name="tipserv" id="">
                    <?php
                    while ($datos = mysqli_fetch_array($query4)) {
                        ?>
                        <option value="<?php echo $datos['idtiposervicio'] ?>"><?php echo $datos['nombreTS'] ?></option>
                    <?php
                }
                ?>
                </select>
                <br><br>
                <label for="">Nombre:</label>
                <input type="text" placeholder="Nombre" name="nombres">
                <br> <br>
                <label for="">Descripción:</label>
                <input type="text" placeholder="Descripcion" name="descripcion">
                <br><br>
                <label for="">Empleado: </label>
                <select name="emple" id="">
                    <?php
                    while ($datos1 = mysqli_fetch_array($query1)) {
                        ?>
                        <option value="<?php echo $datos1['idempleado'] ?>"><?php echo $datos1['nombres'] ?></option>
                    <?php
                }
                ?>
                </select>
                <br><br>
                <input type="submit" name="guardar_us" value="Guardar" class="btnform">
                <input type="submit" href="javascript:Cerrar()" name="cerrar" value="Cerrar" class="btnform">
                </center>
            </form>
        </div>
        <section class="table1">
            <table>
                <tr class="tab-princ">
                    <td>ID</td>
                    <td>Tipo de servicio</td>
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Empleado</td>
                    <td></td>
                </tr>
                <?php
                $query3 = mysqli_query($mysqli, "SELECT * FROM servicio INNER JOIN empleado ON servicio.idempleado = empleado.idempleado INNER JOIN persona ON empleado.idpersona = persona.idpersona INNER JOIN tiposervicio ON servicio.idtiposervicio = tiposervicio.idtiposervicio ORDER BY `idservicio` ASC");
                while ($datostable2 = mysqli_fetch_array($query3)) {
                    ?>
                    <tr>
                        <td><?php echo $datostable2['idservicio'] ?></td>
                        <td><?php echo $datostable2['nombreTS'] ?></td>
                        <td><?php echo $datostable2['nombreSV'] ?></td>
                        <td><?php echo $datostable2['descripcionSV'] ?></td>
                        <td><?php echo $datostable2['nombres'] ?></td>
                        <td class="btn-table">
                            <a href="edit-srv.php?id=<?php echo $datostable2['idservicio']?>"><button><i class="fas fa-edit"></i></button></a>
                            <a href="elim-srv.php?id=<?php echo $datostable2['idservicio']?>"><button><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                        <?php
                        $id_serv = $datostable2['idservicio'];
                        ?>
                    </tr>
                <?php
            }
            ?>
            </table>
        </section>
    </section>
    <?php
    if (isset($_POST['guardar_us'])) {
        $tipserv = $_POST['tipserv'];
        $nombres = $_POST['nombres'];
        $descripcion = $_POST['descripcion'];
        $emple = $_POST['emple'];
        $table3 = 'servicio';
        $mysqli->query("INSERT INTO $table3 (idtiposervicio,nombreSV,descripcionSV,idempleado) VALUES ($tipserv,'$nombres','$descripcion',$emple)");
    }
    ?>
    <script>
        function Abrir() {
            document.getElementById("vent").style.display = "block";
        }

        function Cerrar() {
            document.getElementById("vent").style.display = "none";
        }
    </script>
</body>

</html>