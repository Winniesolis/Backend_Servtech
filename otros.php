<?php
session_start();

if (empty($_SESSION['active'])) {
    // $alert = "EL usuario o contraseña es incorrecto";
    header('location: login.php');

}
include("conexion.php");
$queryEst = mysqli_query($mysqli, "SELECT idestado, nombreES FROM estado ORDER BY `idestado` ASC");

$queryPer = mysqli_query($mysqli, "SELECT idpersona, nombres FROM persona ORDER BY `idpersona` ASC");

$queryDep = mysqli_query($mysqli, "SELECT iddepartamento, nombreDP FROM departamento ORDER BY `iddepartamento` ASC");
// tipo de usuario

if (isset($_POST['guardarTU'])) {
    $nombreTU = $_POST['nombreTU'];
    $table4 = 'tipousuario';
    $mysqli->query("INSERT INTO $table4 (nombreTU) VALUES ('$nombreTU')");
}
//END tipo de usuario

//Tipo de servicio

if (isset($_POST['guardarTS'])) {
    $nombreTS = $_POST['nombreTS'];
    $table4 = 'tiposervicio';
    $mysqli->query("INSERT INTO $table4 (nombreTS) VALUES ('$nombreTS')");
}

// END tipo de servicio

// Sucursal
if (isset($_POST['guardarSuc'])) {
    echo "Entramos sucursal";
    $NombreSC = $_POST['NombreSC'];
    $direccionSC = $_POST['direccionSC'];
    $telefonoSC = $_POST['telefonoSC'];
    $codigopostalSC = $_POST['codigopostalSC'];
    $tipSuc = $_POST['tipSuc'];
    $tableSC = 'sucursal';
    $mysqli->query("INSERT INTO $tableSC (nombreSC, direccionSC, telefonoSC, codigopostalSC,idestado ) VALUES ('$NombreSC','$direccionSC','$telefonoSC','$codigopostalSC',$tipSuc)");
}
//End Sucursal

// Proveedor
if (isset($_POST['guardarPV'])) {
    $nombrePV = $_POST['nombrePV'];
    $telefonoPV = $_POST['telefonoPV'];
    $correoPV = $_POST['correoPV'];
    $RFCPV = $_POST['RFCPV'];
    $direccionPV = $_POST['direccionPV'];
    $provest = $_POST['provest'];
    $tablePV = 'proveedor';
    $mysqli->query("INSERT INTO $tablePV (nombrePV, telefonoPV, correoPV, RFCPV, direcionPV, idestado) VALUES ('$nombrePV','$telefonoPV','$correoPV','$RFCPV','$direccionPV',$provest)");
}
//End proveedor

//Departamento

if (isset($_POST['guardarDP'])) {
    $nombreDP = $_POST['nombreDP'];
    $tipoDP = $_POST['tipoDP'];
    $table4 = 'departamento';
    $mysqli->query("INSERT INTO $table4 (nombreDP,tipoDP ) VALUES ('$nombreDP','$tipoDP')");
}

// Departamento

// Empleado
if (isset($_POST['guardar_emp'])) {
    $persona = $_POST['persona'];
    $depa = $_POST['depa'];
    $tableEmp = 'empleado';
    $mysqli->query("INSERT INTO $tableEmp (idpersona,iddepartamento ) VALUES ($persona, $depa)");
}
// end Empleado

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend │ ServTech</title>
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
               <li><a href="usuarios.php" ><i class="fas fa-user"><br><span>Usuarios</span></i></a></li>
               <li><a href="productos.php"><i class="fas fa-laptop"><br><span>Productos</span></i></a></li>
               <li><a href="servicios.php"><i class="fas fa-handshake"><br><span>Servicios</span></i></a></li>
               <!-- <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt"><br><span>Ubicacion</span></i></a></li> -->
               <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
               <li><a href="otros.php"><i class="fas fa-ad active"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <center>
            <form action="otros.php" class="form-otros" method="POST">
                <h1>Seleccione el que quiere agregar</h1>
                <select name="otros" id="">
                    <option value="tipoUs">Tipo de usuario</option>
                    <option value="succursal">Sucursal</option>
                    <option value="prov">Proveedor</option>
                    <option value="tipserv">Tipo de servicio</option>
                    <option value="departamento">Departamento</option>
                    <option value="empleado">Empleado</option>
                </select>
                <button type="submit" name="most-otro" class="btn-most">Mostrar</button>
            </form>
            <?php
            if (isset($_POST['most-otro'])) {
                $varselect = $_POST['otros'];
                switch ($varselect) {
                    case "tipoUs":
                        echo '
                            <section class="sec1">
                                <section class="tipoUs">
                                    <center>
                                        <h1>Tipo de usuario</h1>
                                        <form action="otros.php" method="POST">
                                            <br>
                                            <input type="text" placeholder="Nombre" name="nombreTU">
                                            <br><br>
                                            <input type="submit" name="guardarTU" value="Guardar" class="btnform">
                                        </form>
                                    </center>
                                </section>
                            </section> 
                    ';

                        break;

                    case "succursal":
                        echo '
                            <section class="sucursal_add">
                                <center>
                                    <h1>Sucursal</h1>
                                    <form action="otros.php" method="POST">
                                    <br>
                                    <input type="text" placeholder="Nombre" name="NombreSC" ><br><br>
                                    <input type="text" placeholder="Direccion" name="direccionSC"><br><br>
                                    <input type="text" placeholder="Telefono" name="telefonoSC"><br><br>
                                    <input type="text" placeholder="Codigo postal" name="codigopostalSC"><br><br>
                                    <select name="tipSuc" id="">
                        ';

                        while ($datosEst = mysqli_fetch_array($queryEst)) {
                            ?>
                        <option value="<?php echo $datosEst['idestado'] ?>"><?php echo $datosEst['nombreES'] ?></option>
                    <?php
                }

                echo '
                                    </select>
                                    <br><br>
                                    <input type="submit" name="guardarSuc" value="Guardar" class="btnform">
                                    </form>
                                </center>
                            </section>    
                        ';

                break;
            case "prov":
                echo '
                    <section class="proveedir_add">
                    <center>
                        <h1>Proveedor</h1>
                        <form action="otros.php" method="POST">
                            <br>
                            <input type="text" name="nombrePV" placeholder="Nombre" ><br><br>
                            <input type="text" name="telefonoPV" placeholder="Telefono"><br><br>
                            <input type="text" name="correoPV" placeholder="Correo"><br><br>
                            <input type="text" name="RFCPV" placeholder="RFC"><br><br>
                            <input type="text" name="direccionPV" placeholder="Direccion"><br><br>
                            <select name="provest" id="">
                                ';
                while ($datosEst = mysqli_fetch_array($queryEst)) {
                    ?>
                        <option value="<?php echo $datosEst['idestado'] ?>"><?php echo $datosEst['nombreES'] ?></option>
                    <?php

                }

                echo '
                            </select>
                            <br><br>
                            <input type="submit" name="guardarPV" value="Guardar" class="btnform">
                        </form>
                    </center>
                </section>
                ';
                break;


            case "tipserv":
                echo '
                    <section class="sec1">
                        <section class="tipoTS">
                            <center>
                                <h1>Tipo de servicio</h1>
                                <form action="otros.php" method="POST">
                                    <br>
                                    <input type="text" placeholder="Nombre" name="nombreTS">
                                    <br><br>
                                    <input type="submit" name="guardarTS" value="Guardar" class="btnform">
                                </form>
                            </center>
                        </section>
                    </section> 
                    
                    ';

                break;
            case "departamento":
                echo '
                    <section class="sec1">
                        <section class="departamento">
                            <center>
                                <h1>Departamento</h1>
                                <form action="otros.php" method="POST">
                                    <br>
                                    <input type="text" placeholder="Nombre" name="nombreDP">
                                    <br><br>
                                    <input type="text" placeholder="Tipo de departamento" name="tipoDP">
                                    <br><br>
                                    <input type="submit" name="guardarDP" value="Guardar" class="btnform">
                                </form>
                            </center>
                        </section>
                    </section> 
                    ';
                break;


            case "empleado":
                echo '
            <center>
                <section class="sec-emple">
                <br>
                    <h1>Empleado</h1>
                    <br><br>
                    <form action="otros.php" method="POST" class="form1">
                        <label for="">Persona: </label>
                        <select name="persona" id="selper">
            ';
                while ($datosPer = mysqli_fetch_array($queryPer)) {
                    ?>
                        <option value="<?php echo $datosPer['idpersona'] ?>"><?php echo $datosPer['nombres'] ?></option>
                    <?php
                }
                echo '
                        </select>
                        <br><br>
                        <label class="dep" for="">Departamento: </label>
                        <select name="depa" class="selec-dep">
            ';
                while ($datosdep = mysqli_fetch_array($queryDep)) {
                    ?>
                        <option value="<?php echo $datosdep['iddepartamento'] ?>"><?php echo $datosdep['nombreDP'] ?></option>
                    <?php
                }

                echo '
                            <br><br>
                            <input type="submit" name="guardar_emp" value="Guardar" class="btnform btnfrm2">
                        </select>
                    </form>
                </section>
            </center>
            ';
                break;
        }
    }
    ?>
    </section>
</body>
</html>