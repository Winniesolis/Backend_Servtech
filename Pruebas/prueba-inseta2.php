<?php
    include('../conexion.php');
    $query = mysqli_query($mysqli,"SELECT idsucursal, nombre FROM sucursal ORDER BY `idsucursal` ASC");

    if(isset($_POST['sucursal']))
    {
        $sucursal =$_POST['sucursal'];
        echo $sucursal;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<header>
    <section class="principal">
        <img src="../img/logo-ST.PNG" alt="">
    </section>
    <nav>
        <ul>
            <li><a href=""><i class="fas fa-home p-ico"><p>Inicio</p></i></a></li>
            <li><a href=""><i class="fas fa-user"><p>Usuarios</p></i></a></li>
            <li><a href=""><i class="fas fa-laptop"><p>Productos</p></i></a></li>
            <li><a href=""><i class="fas fa-handshake"><p>Servicios</p></i></a></li>
            <li><a href=""><i class="fas fa-map-marker-alt"><p>Ubicacion</p></i></a></li>
            <li><a href=""><i class="fas fa-file"><p>Reportes</p></i></a></li>
        </ul>
    </nav>
    <section class="usuario">
        <img src="../img/winnie.png" alt="">
        <p>Winnie Solis</p>
        <p>Administrador</p>
    </section>
    </header>

    <section class="content ">
        <center>
        <form action="prueba-inseta2.php" method="POST"  class="form1">
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
                <input type="submit" name="guardar_us" value="Guardar">
            </center>

        </form>
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
        echo "imprimiendo sucursal"."\n";
        echo $sucursal;
        $table2 = 'persona';
        $mysqli->query("INSERT INTO $table2 (nombres, apellidos, correo, telefono, idsucursal) VALUES ('$nombres','$apellidos','$correo','$telefono' ,$sucursal)");
        echo"se incertaron correctamente";    
        // include ("cerrarconex.php");
    }
?>




</body>
</html>