<?php
    include('conexion.php');
    $query = mysqli_query($mysqli,"SELECT idsucursal, nombre FROM sucursal ORDER BY `idsucursal` ASC");
    if(isset($_POST['sucursal']))
    {
        $sucursal =$_POST['sucursal'];
        // echo $sucursal;
    }
    // tipo de usuario
    $query1 = mysqli_query($mysqli,"SELECT idtipousuario, nombreTU FROM tipousuario ORDER BY `idtipousuario` ASC");

    if(isset($_POST['tipUs']))
    {
        $tipUs =$_POST['tipUs'];
        // echo $tipUs;
    }
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
            <h1>Usuarios</h1>
        </section>
        <section class="usuario">
            <img src="img/winnie.png" alt="">
            <p>Winnie Solis</p>
            <p>Administrador</p>
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
        <a href="javascript:Abrir()"><i class="fas fa-plus-square"> Nuevo</i></a> <!-- BOTON NUEVO QUE ABRE VENTANA  -->
        <div class="ventana" id="vent">
        <a href="javascript:Cerrar()"><i class="fas fa-times"></i></a>
        <h3>Alta de Usuario</h3>
        <a href="usuarios.php"></i></a>
        <form action="usuarios.php" method="POST"  class="form1">
                <label for="">Nombre(s):</label>
                <input type="text" placeholder="Nombre(s)" name="nombres">
                <br> <br>
                <label for="">Apellido(s):</label>
                <input type="text" placeholder="Apellido(s)" name="apellidos">
                <br> <br>
                <label for="">Correo</label>
                <input type="text" placeholder="correo" name="correo">
                <br> <br>
                <label for="">Telefono:</label>
                <input type="text" placeholder="telefono" name="telefono">
                <br> <br>
                <label for="">Contraseña:</label>
                <input type="text" placeholder="Contraseña" name="contraseña">
                <br> <br>
                <label for="">Contraseña:</label>
                <input type="text" placeholder="Confirme su contraseña" name="conf-contra">
                <br> <br>
                <label for="">Sucursal: </label>
                <select name="sucursal" id="">
                    <?php
                        while ($datos = mysqli_fetch_array($query))
                        {
                    ?>
                    <option value="<?php echo$datos['idsucursal']?>"><?php echo $datos['nombre']?></option>
                    <?php
                        }
                    ?>
                </select>
                <br><br>
                <label for="">Tipo de usuario: </label>
                <select name="tipUs" id="">
                    <?php
                        while ($datos1 = mysqli_fetch_array($query1))
                        {
                    ?>
                    <option value="<?php echo$datos1['idtipousuario']?>"><?php echo $datos1['nombreTU']?></option>
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
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Correo</td>
                    <td>Telefono</td>
                    <td>Sucursal</td>
                    <td>Tipo de usuario</td>
                    <td></td>
                </tr>
                <?php
                    $query3 = mysqli_query($mysqli,"SELECT * FROM persona INNER JOIN usuario ON persona.idpersona = usuario.idpersona INNER JOIN sucursal ON sucursal.idsucursal = persona.idsucursal INNER JOIN tipousuario ON usuario.idtipousuario = tipousuario.idtipousuario");
                    while($datostable = mysqli_fetch_array($query3))
                    {
                    ?>
                    <tr>
                        <td><?php echo $datostable['idpersona']?></td>
                        <td><?php echo $datostable['nombres']?></td>
                        <td><?php echo $datostable['apellidos']?></td>
                        <td><?php echo $datostable['correo']?></td>
                        <td><?php echo $datostable['telefono']?></td>
                        <td><?php echo $datostable['nombreSC']?></td>
                        <td><?php echo $datostable['nombreTU']?></td>
                        <td class="btn-table">
                            <button><i class="fas fa-edit"></i></button>
                            <button><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
            </table>
        </section>
    </section>
<?php
    if(isset($_POST['guardar_us']))
    {
        echo"entro aqui"."\n";
        $nombres =$_POST['nombres'];
        $apellidos =$_POST['apellidos'];
        $correo =$_POST['correo'];
        $telefono =$_POST['telefono'];
        $sucursal = $_POST['sucursal'];
        $tipUs = $_POST['tipUs'];
        $contraseña = $_POST['contraseña'];
        // echo "imprimiendo sucursal"."\n";
        // echo $sucursal;
        $table2 = 'persona';
        $table3 = 'usuario';
        $mysqli->query("INSERT INTO $table2 (nombres, apellidos, correo, telefono, idsucursal) VALUES ('$nombres','$apellidos','$correo','$telefono' ,$sucursal)");
        // echo"se incertaron correctamente";
        $queryPer = mysqli_query($mysqli,"SELECT idpersona,correo FROM persona WHERE correo = '$correo' ");
        $conperso = mysqli_fetch_array($queryPer);
        $idprs = $conperso['idpersona'];
        $mysqli->query("INSERT INTO $table3 (idpersona,contrase,idtipousuario) VALUES ($idprs,'$contraseña',$tipUs)") ;
    }
?>
<script>
    function Abrir(){
        document.getElementById("vent").style.display="block";
    }
    function Cerrar(){
        document.getElementById("vent").style.display="none";
    }
    function AbTip(){
        document.getElementById("vent").style.display="none";
        document.getElementById("vent-us").style.display="block";

    }
   
</script>
</body>
</html>