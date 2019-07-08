<?php
session_start();

if (empty($_SESSION['active'])) {
    header('location: login.php');
}

if (isset($_GET['id'])) {
    $claveid = $_GET['id'];
}

include('conexion.php');
$query = mysqli_query($mysqli, "SELECT idsucursal, nombreSC FROM sucursal ORDER BY `idsucursal` DESC");
if (isset($_POST['sucursal'])) {
    $sucursal = $_POST['sucursal'];
    // echo $sucursal;
}
// tipo de usuario
$query1 = mysqli_query($mysqli, "SELECT idtipousuario, nombreTU FROM tipousuario ORDER BY `idtipousuario` DESC");

if (isset($_POST['tipUs'])) {
    $tipUs = $_POST['tipUs'];
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
    <link rel="stylesheet" href="css/J-style.css">
    <link rel="icon" href="img/lg1/ico-vent3.ico" />
     <!-- script´s -->
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script><!-- Importa la libreria -->
    <script type="text/javascript" src="js/functions.js"></script><!-- Llama a la funcion -->
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
<?php
 $page = 'usuarios';
include ('header1.php');
 ?>
    <section class="content">
        <!-- <a href="javascript:Abrir()"><i class="fas fa-plus-square"> Nuevo</i></a> -->
        <?php
        if ($_SESSION['tpus'] != 2 && $_SESSION['tpus'] != 3) {
            echo "<br><br><br><br>";
        } else {
            echo "<a href='javascript:Abrir()'><i class='fas fa-plus-square'> Nuevo</i></a>";
        }
        ?>
        <div class="ventana" id="vent">
            <a href="javascript:Cerrar()"><i class="fas fa-times"></i></a>
            <h3>Alta de Usuario</h3>
            <a href="usuarios.php"></i></a>
            <form action="usuarios.php" method="POST" class="form1" enctype="multipart/form-data">
                <label for="">Nombre(s):</label>
                <input type="text" placeholder="Nombre(s)" name="nombres">
                <br> <br>
                <label for="">Apellido(s):</label>
                <input type="text" placeholder="Apellido(s)" name="apellidos">
                <br> <br>
                <label for="">Correo</label>
                <input type="email" placeholder="correo" name="correo">
                <br> <br>
                <label for="">Telefono:</label>
                <input type="tel" placeholder="telefono" name="telefono">
                <br> <br>
                <label for="">NickName:</label>
                <input type="text" placeholder="NickName" name="NickName">
                <br> <br>
                <label for="">Contraseña:</label>
                <input type="password" placeholder="Contraseña" name="contraseña">
                <br> <br>
                <label for="">Contraseña:</label>
                <input type="password" placeholder="Confirme su contraseña" name="conf-contra">
                <br> <br><br><br>
                <label for="">Sucursal: </label>
                <select name="sucursal" id="">
                    <?php
                    while ($datossc = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $datossc['idsucursal'] ?>"><?php echo $datossc['nombreSC'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <label for="">Tipo de usuario: </label>
                <select name="tipUs" id="">
                    <?php
                    while ($datos1 = mysqli_fetch_array($query1)) {
                        ?>
                        <option value="<?php echo $datos1['idtipousuario'] ?>"><?php echo $datos1['nombreTU'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <!--Foto-->
                <div class="photo">
                        <label for="foto">Foto</label>
                        <div class="prevPhoto">
                        <span class="delPhoto notBlock">X</span>
                        <label for="foto"></label>
                        </div>
                        <div class="upimg">
                        <input type="file" name="foto" id="foto">
                        </div>
                        <div id="form_alert"></div>
                </div>
                <!--Foto-->
                <input type="submit" name="guardar_us" value="Guardar" class="btnform">
                <input type="submit" href="javascript:Cerrar()" name="cerrar" value="Cerrar" class="btnform">
                </center>
            </form>
        </div>
<!-- busqueda -->
                <form action="busquedas/buscar_usuario.php" method="get" class="form_search">
                    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" class="inp_search">
                    <input type="submit" value="Buscar" class="btn_search">
                </form>


<!-- busqueda -->
        <section class="table1">
            <table>
                <tr class="tab-princ">
                    <td>ID</td>
                    <td>Usuario</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Correo</td>
                    <td>Telefono</td>
                    <td>Sucursal</td>
                    <td>Tipo de usuario</td>
                    <td>Foto</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $query3 = mysqli_query($mysqli, "SELECT * FROM persona INNER JOIN usuariolog ON persona.idpersona = usuariolog.idpersona INNER JOIN sucursal ON sucursal.idsucursal = persona.idsucursal INNER JOIN tipousuario ON usuariolog.idtipousuario = tipousuario.idtipousuario ORDER BY `idusuarioLog` DESC ");
                while ($datostable = mysqli_fetch_array($query3)) {
                    $foto = 'img/uploads/'.$datostable['foto'];
                    ?>
                    <tr>
                        <td><?php echo $datostable['idusuarioLog'] ?></td>
                        <td><?php echo $datostable['nickName'] ?></td>
                        <td><?php echo $datostable['nombres'] ?></td>
                        <td><?php echo $datostable['apellidos'] ?></td>
                        <td><?php echo $datostable['correo'] ?></td>
                        <td><?php echo $datostable['telefono'] ?></td>
                        <td><?php echo $datostable['nombreSC'] ?></td>
                        <td><?php echo $datostable['nombreTU'] ?></td>
                        <td class="img_producto"><img src="<?php echo $foto; ?>" alt=""></td>
                        <td class="btn-table <?php if ($_SESSION['tpus'] != 2 && $_SESSION['tpus'] != 3) {
                                                    echo "disp--none";
                                                } ?>" id="btn-ed">
                            <a href="edit-us.php?id=<?php echo $datostable['idpersona'] ?>"><button><i class="fas fa-edit"></i></button></a>

                            <a class="<?php if ($_SESSION['tpus'] != 2) { echo "disp--none";
                            } ?>" href="elim-us.php?id=<?php echo $datostable['idusuarioLog']; ?>"><button><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </section>
    </section>
    <?php
    if (isset($_POST['guardar_us'])) {
        // echo"entro aqui"."\n";
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $sucursal = $_POST['sucursal'];
        $tipUs = $_POST['tipUs'];
        $contraseña = $_POST['contraseña'];
        $contraenv = md5($contraseña);
        $contraseña2 = $_POST['conf-contra'];
        $nick = $_POST['NickName'];
        // echo "imprimiendo sucursal"."\n";
        // echo $sucursal;
        $table2 = 'persona';
        $table3 = 'usuariolog';

        //variables de la foto
        $foto       = $_FILES['foto'];
            $nom_foto   = $foto['name'];
            $type       = $foto['type'];
            $url_temp   = $foto['tmp_name'];

            $imgUsuario = 'usuario.png';
            if ($nom_foto != '') 
            {
                $destino        = 'img/uploads/';
                $img_nombre     = 'img_'.md5(date('d-m-Y H:m:s' ));
                $imgUsuario    = $img_nombre.'.jpg';
                $src            = $destino.$imgUsuario;
            }
        //variables de la foto

        if ($contraseña == $contraseña2) {
            $mysqli->query("INSERT INTO $table2 (nombres, apellidos, correo, telefono, idsucursal) VALUES ('$nombres','$apellidos','$correo','$telefono' ,$sucursal)");
            // echo"se incertaron correctamente";
            $queryPer = mysqli_query($mysqli, "SELECT idpersona,correo FROM persona WHERE correo = '$correo' ");
            $conperso = mysqli_fetch_array($queryPer);
            $idprs = $conperso['idpersona'];
            $mysqli->query("INSERT INTO $table3 (idpersona,nickName,pass,idtipousuario, foto) VALUES ($idprs,'$nick','$contraenv',$tipUs ,'$imgUsuario')");
            if ($mysqli) {
                if ($nom_foto != '') {
                    move_uploaded_file($url_temp, $src);
                }
                $alert='<p class="msg_save">Producto guardado corectamente.</p>';
            }

        } else {
            echo "<script>alert('Las contraseñas no coinciden');</script>";
        }
    }
    ?>
    <script>
        function Abrir() {
            document.getElementById("vent").style.display = "block";
        }

        function Cerrar() {
            document.getElementById("vent").style.display = "none";
        }

        function AbTip() {
            document.getElementById("vent").style.display = "none";
            document.getElementById("vent-us").style.display = "block";
        }

        function prueb() {
            document.getElementById("btn-ed").style.display = "none";
        }
    </script>
</body>

</html>