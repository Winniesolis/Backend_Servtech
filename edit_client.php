<?php
session_start();
if (empty($_SESSION['active'])) {
    // $alert = "EL usuario o contraseña es incorrecto";
    header('location: login.php');
}
if($_SESSION['tpus'] != 2 && $_SESSION['tpus'] != 3){
    header("location: Graficas/Gindex.php");
}     
include 'conexion.php';
//CONSULTAS 
$query4 = mysqli_query($mysqli, "SELECT idempresa, nombreE FROM empresa");
$query5 = mysqli_query($mysqli, "SELECT * FROM empleado INNER JOIN persona ON empleado.idpersona = persona.idpersona INNER JOIN departamento on departamento.iddepartamento = empleado.iddepartamento ");
// END consultas
if (isset($_GET['id'])) {
    $claveid = $_GET['id'];
}
if (empty($_REQUEST['id'])) {
    header("location: clientes.php");
} else {
    $claveid = $_REQUEST['id'];
    if (!is_numeric($claveid)) {

        header("location: clientes.php");
    }
}
$querysrv = mysqli_query($mysqli, "SELECT * FROM cliente INNER JOIN empresa ON cliente.idempresa = empresa.idempresa  WHERE cliente.idcliente = $claveid ");
$result_serv = mysqli_num_rows($querysrv);
if ($result_serv > 0) {
    $data_srv = mysqli_fetch_assoc($querysrv);
    // print_r($data_srv);
}
if (isset($_POST['edtit-srv'])) {
    $alert = '';
    if (empty($_POST['nombres'])   || empty($_POST['RFC']) || empty($_POST['telefono'])  || empty($_POST['correo']) || empty($_POST['direccion'])) {
        $alert = "<script>alert('Datos incompletos');</script>";
    } else {
        $claveid = $_POST['id'];
        $codus = $_POST['id'];
        $nombreC = $_POST['nombres'];
        $empresa = $_POST['tipserv'];
        $RFC = $_POST['RFC'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        print_r("");
        $mysqli->query("UPDATE cliente SET nombreC = '$nombreC', idempresa = $empresa, RFC = '$RFC', telefonoC ='$telefono', correoC = '$correo', direccionC ='$direccion' WHERE idcliente = $claveid");
        if ($mysqli) {
            header("location: clientes.php");
        } else {
            echo "<script>alert('Error al editar datos');</script>";
        }
    }
}
if (isset($_POST['cerrar'])) {
    header("location: clientes.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Clientes │ ServTech</title>
    <link rel="icon" href="img/lg1/ico-vent3.ico" />
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <?php
 $page = 'clientes';
include ('header1.php');
 ?>
    <section class="content">
        <section class="tabedit">
            <h1>Editar Cliente</h1>
            <form action="edit_client.php" method="post" name="form-editus" class="form-editus">
                <input type="text" placeholder="id" name="id" class="disp-none" require value="<?php echo $data_srv['idcliente'] ?>">
                <label for="">Nombre:</label>
                <input type="text" placeholder="Nombre" name="nombres" value="<?php echo $data_srv['nombreC'] ?>">
                <br> <br>
                <label for="">Empresa</label>
                <br>
                <select name="tipserv" id="" class="notItemOne">
                    <option value="<?php echo $data_srv['idempresa'] ?>" selected><?php echo $data_srv['nombreE'] ?></option>
                    <?php
                    while ($datos = mysqli_fetch_array($query4)) {
                        ?>
                        <option value="<?php echo $datos['idempresa'] ?>"><?php echo $datos['nombreE'] ?></option>
                    <?php
                }
                ?>
                </select>
                <br><br>
                <label for="">RFC</label>
                <input type="text" placeholder="Nombre" name="RFC" value="<?php echo $data_srv['RFC'] ?>">
                <br> <br>
                <label for="">Teléfono:</label>
                <input type="text" placeholder="Descripcion" name="telefono" value="<?php echo $data_srv['telefonoC'] ?>">
                <br><br>
                <label for="">Correo: </label>
                <input type="text" placeholder="Descripcion" name="correo" value="<?php echo $data_srv['correoC'] ?>">
                <br><br>
                <label for="">Dirección: </label>
                <input type="text" placeholder="Descripcion" name="direccion" value="<?php echo $data_srv['direccionC'] ?>">
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