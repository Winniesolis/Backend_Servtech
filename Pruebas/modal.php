<?php
    include("../conexion.php");
    $query= mysqli_query($mysqli,"SELECT idProveedor, Nombre FROM proveedor ORDER BY `idProveedor` ASC");

    if(isset($_POST['prov']))
    {
        $prov =$_POST['prov'];
        echo $prov;
    }

    $queryS = mysqli_query($mysqli,"SELECT idTipoServicio, Nombre FROM tiposervicio ORDER BY `idTipoServicio` ASC");
    if(isset($_POST['tipserv']))
    {
        $tipo =$_POST['tipserv'];
        echo $tipo;
    }

    $queryE = mysqli_query($mysqli,"SELECT idEmpleado, Nombre FROM empleados ORDER BY `idEmpleado` ASC");
// proveedor tiposerv empleado
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="style-prueba.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <div class="ventana" id="vent">
        <a href="javascript:Cerrar()"><i class="fas fa-times"></i></a>
        <br>
        <section class="form-srv">
                <h3>Alta de servicios</h3>
            <form action="altaServ.php" METHOD="POST">
                    <section class="form-alta">
                        <select name="prov">
                            <?php
                                while($datos = mysqli_fetch_array($query))
                                {
                            ?>
                                <option value="<?php echo $datos['idProveedor']?>"> <?php echo $datos['Nombre']?></option>
                                
                            <?php
                                }
                            ?>
                        </select>
                        <!-- <input type="submit" value="Contestar"> -->
                        <br><br>
                        <input type="text" name="nombreserv" placeholder="Nombre del servicio" id="nom-serv">
                        <br><br>
                        <textarea type="text" name="descserv" cols="3" rows="3" placeholder="Descripcion del servicio" id="desc-serv"></textarea>
                        <br><br>
                        <select name="tipserv">
                            <?php
                                while($datossrv = mysqli_fetch_array($queryS))
                                {
                            ?>
                                <option value="<?php echo $datossrv['idTipoServicio ']?>"> <?php echo $datossrv['Nombre']?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <br><br><br>
                        <select name="empleado">
                            <?php
                                while($datosE = mysqli_fetch_array($queryE))
                                {
                            ?>
                                <option value="<?php echo $datosE['idEmpleado']?>"> <?php echo $datosE['Nombre']?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <br><br>
                        <button type="submit" name="guardar"><i class="far fa-save"></i></button>
                        <button type="reset" class="closse"><a  href="javascript:Cerrar()"><i href="" class="fas fa-window-close"></i></a></button>
                        <br><br>
                    </section>
            </form>
<?php
if(isset($_POST['guardar']))
{
    include("../conexion.php");
    $nombreserv = $_POST['nombreserv'];
    $descserv = $_POST['descserv'];
    
    $table = 'altaserv';
    $conex->query("INSERT INTO $table (nombre, descripcion) VALUES ('$nombreserv','$descserv')");
    }
?>
        </section>
    </div>


    <header></header>
    <nav></nav>
    <section id="contenedor">
        <a href="javascript:Abrir()">Abrir Ventana</a>

    </section>
    <footer></footer>

<script>
    function Abrir(){
        document.getElementById("vent").style.display="block";
    }
    function Cerrar(){
        document.getElementById("vent").style.display="none";
    }
</script>



</body>
</html>