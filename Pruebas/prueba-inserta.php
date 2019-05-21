<?php
    include('conexion-prueba.php');
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
    <title> Servicios │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="style-prueba.css">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <header></header>
    <section class="content">
        <center>
        <h3>prueba Combo</h3>
        <form action="prueba-inserta.php" method="post" class="form1">
            <input type="text" name="descripcion" placeholder="Descripcion">
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
            <input type="submit" name="guardar_us" value="Guardar">
        </form>
        </center>
<?php

        if(isset($_POST['guardar_us']))
    {

        echo"entro aqui"."\n";

        $sucursal = $_POST['sucursal'];
        $descripcion =$_POST['descripcion'];
        echo "imprimiendo sucursal"."\n";
        echo $sucursal;
        // $apellidos = $_POST['apellidos'];
        // $correo = $_POST['correo'];
        // $telefono = $_POST['telefono'];
        // $estado = $_POST['estado'];
        // $table1 = 'usuario';
        $table2 = 'prueba';
        $mysqli->query("INSERT INTO $table2 (Descripcion, idsucursal) VALUES ('$descripcion',$sucursal)");
        echo"se incertaron correctamente";    
        // include ("cerrarconex.php");
    }
?>
        
</section>