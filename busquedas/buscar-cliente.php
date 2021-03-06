<?php
session_start();

if (empty($_SESSION['active'])) {
    header('location: ../login.php');
}

if (isset($_GET['id'])) {
    $claveid = $_GET['id'];
}

include('../conexion.php');
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
    <title> Clientes │ ServTech</title>
    <link rel="icon" href="img/ico-vent3.ico" />

    <!-- style -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
<?php
 $page = 'clientes';
 $page2 = 'busqueda';
include ('../header1.php');
 ?>
    <section class="content">
        <?php
        if ($_SESSION['tpus'] != 2 && $_SESSION['tpus'] != 3) {
            echo "<br><br><br><br>";
        } else {
            echo "<a href='javascript:Abrir()'><i class='fas fa-plus-square'> Nuevo</i></a>";
        }
        ?>
        <div class="ventana" id="vent">
            <a href="javascript:Cerrar()"><i class="fas fa-times"></i></a>
            <h3>Alta de Clientes</h3>
            <a href="clientes.php"></i></a>
            <form action="clientes.php" method="POST" class="form1 form-client">
                <label for="">Nombre(s):</label>
                <input type="text" placeholder="Nombre(s)" name="nombreC">
                <br> <br>
                <label for="">Empresa:</label>
                <select name="empresa" id="">
                    <?php
                    while ($datossc = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $datossc['idempresa'] ?>"><?php echo $datossc['nombreE'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <label for="">RFC</label>
                <input type="text" placeholder="RFC" name="RFC">
                <br> <br>
                <label for="">Telefono:</label>
                <input type="tel" placeholder="Telefono" name="telefono">
                <br> <br>
                <label for="">Correo</label>
                <input type="email" placeholder="Correo" name="correo">
                <br> <br>
                <label for="">Dirección:</label>
                <input type="text" placeholder="Dirección" name="direccion">
                <br><br>
                <div class="btns">
                    <input type="submit" href="javascript:Cerrar()" name="cerrar" value="Cerrar" class="btnform">
                    <input type="submit" name="guardar_us" value="Guardar" class="btnform">
                </div>
                </center>
            </form>
<!-- busqueda -->
<form action="busquedas/buscar_cliente.php" method="get" class="form_search">
                    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" class="inp_search">
                    <input type="submit" value="Buscar" class="btn_search">
                </form>


<!-- busqueda -->
        </div>
        <section class="table1">
            <table>
                <tr class="tab-princ">
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Empresa</td>
                    <td>RFC</td>
                    <td>Telefono</td>
                    <td>Correo</td>
                    <td>Direccion</td>
                    <td></td>
                </tr>
                <?php
                $query3 = mysqli_query($mysqli, "SELECT * from cliente INNER JOIN empresa on cliente.idempresa = empresa.idempresa");
                while ($datostable = mysqli_fetch_array($query3)) {
                    ?>
                    <tr>
                        <td><?php echo $datostable['idcliente'] ?></td>
                        <td><?php echo $datostable['nombreC'] ?></td>
                        <td><?php echo $datostable['nombreE'] ?></td>
                        <td><?php echo $datostable['RFC'] ?></td>
                        <td><?php echo $datostable['telefonoC'] ?></td>
                        <td><?php echo $datostable['correoC'] ?></td>
                        <td><?php echo $datostable['direccionC'] ?></td>
                        <td class="btn-table <?php if ($_SESSION['tpus'] != 2 && $_SESSION['tpus'] != 3) { echo "disp--none"; } ?>" id="btn-ed">
                            <a href="edit_client.php?id=<?php echo $datostable['idcliente'] ?>"><button><i class="fas fa-edit"></i></button></a>
                            <a class="<?php if ($_SESSION['tpus'] != 2) { echo "disp--none"; } ?>" href="elim_client.php?id=<?php echo $datostable['idcliente'] ?>"><button><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                        <!-- <td class="btn-table">
                            <a href="edit_client.php?id=<?php echo $datostable['idcliente'] ?>"><button><i class="fas fa-edit"></i></button></a>
                            <a href="elim_client.php?id=<?php echo $datostable['idcliente'] ?>"><button><i class="fas fa-trash-alt"></i></button></a>
                        </td> -->
                    </tr>
                <?php
                }
                ?>
            </table>
        </section>
    </section>
    <?php
    if (isset($_POST['guardar_us'])) {
        $nombreC = $_POST['nombreC'];
        $empresa = $_POST['empresa'];
        $RFC = $_POST['RFC'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        print_r($empresa);
        $table2 = 'cliente';
        $mysqli->query("INSERT INTO $table2 (nombreC, idempresa, RFC, telefonoC, correoC, direccionC) VALUES ('$nombreC',$empresa,'$RFC','$telefono','$correo' ,'$direccion')");
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
    </script>
</body>

</html>