<?php
session_start();

if (empty($_SESSION['active'])) {
    // $alert = "EL usuario o contraseña es incorrecto";
    header('location: login.php');

}


    //if(isset($_GET['id']))
    //{
      //  $claveid = $_GET['id'];
        
    //}
    // echo $claveid."       mostrando clave id";

    include('conexion.php');
//combos

// mostrar datos en inputs
    if(empty($_REQUEST['id']))
    {
        header("location: productos.php");
        //mysqli_close($mysqli);.................
    }
    else
    {
        $claveid = $_REQUEST['id'];
        if(!is_numeric($claveid))
        {

            header("location: productos.php");
            mysqli_close($mysqli);
        }
    } 


    $query = mysqli_query($mysqli, "SELECT producto.idproducto, producto.nombrePD, producto.descripcionPD, producto.precioPD, proveedor.nombrePV, producto.cantidad, producto.foto, producto.idproveedor FROM producto INNER JOIN proveedor ON producto.idproveedor = proveedor.idproveedor WHERE producto.idproducto = $claveid");
    $result_producto = mysqli_num_rows($query);

    $foto = '';
    $classRemove= 'notBlock';


    if($result_producto == 0)
    {
        header("location: productos.php");
    }
    else
    {
        $data_producto= mysqli_fetch_assoc($query);
        if ($data_producto ['foto'] != 'img_producto.png') {
            $foto = '<img id="img" src="img/uploads/'.$data_producto['foto'].'"alt="Producto">';
            $classRemove= '';
        }
    }
    if(isset($_POST['edit-pro']))
    {
        $alert = '';
        if (empty($_POST['nombrePD']) || empty($_POST['descripcionPD']) || empty($_POST['precioPD']) || $_POST['precioPD']< 0 || empty($_POST['cantidad']) || $_POST['cantidad'] < 0 || empty($_POST['foto_actual']) || empty($_POST['foto_remove'])) {
            $alert = "<script>alert('Datos incompletos');</script>";
        }
        else
        {
            $idproducto         = $_POST['idproducto'];
            $nombrePD           = $_POST['nombrePD'];
            $descripcionPD      = $_POST['descripcionPD'];
            $precioPD           = $_POST['precioPD'];
            $cantidad           = $_POST['cantidad'];
            $idproveedor        = $_POST['idproveedor'];
            $imgProducto        = $_POST['foto_actual'];
            $imgRemove          = $_POST['foto_remove'];

            print_r($_FILES)

            $foto       = $_FILES['foto'];
            $nom_foto   = $foto['name'];
            $type       = $foto['type'];
            $url_temp   = $foto['tmp_name'];

            $upd = '';
            if ($nom_foto != '') 
            {
                $destino        = 'img/uploads/';
                $img_nombre     = 'img_'.md5(date('d-m-Y H:m:s' ));
                $imgProducto    = $img_nombre.'.jpg';
                $src            = $destino.$imgProducto;
            }
            else
            {
                if ($_POST['foto_actual'] != $_POST['foto_remove']) {
                       $imgProducto = 'img_producto.png';
                   }   
            }


            $mysqli->query("UPDATE producto SET nombrePD='$nombrePD', descripcionPD='$descripcionPD', precioPD=$precioPD, cantidad=$cantidad, idproveedor=$idproveedor, foto = '$imgProducto' WHERE idproducto=$idproducto");
            if($mysqli){
                header ("location: productos.php");
                if (($nom_foto != '' && ($_POST['foto_actual'] != 'imgProducto.png')) || ($_POST['foto_actual'] != $_POST['foto_remove'])) 
                {
                    if ($_POST['foto_actual'] == 'img_producto.png') {
                        # code...
                    }
                    else{
                        unlink('img/uploads/'.$_POST['foto_actual']);
                    }
                    
                }
                if ($nom_foto != '') {
                    move_uploaded_file($url_temp, $src);
                }
            }else{
            echo "<script>alert('Error al editar datos');</script>";
            }
        }
    }
    if(isset($_POST['cerrar'])){
        header ("location: productos.php");
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
    <title> Producto │ ServTech</title>
    <!-- script´s -->
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script><!-- Importa la libreria -->
    <script type="text/javascript" src="js/functions.js"></script><!-- Llama a la funcion -->
    <!-- style -->
    <link rel="stylesheet" href="css/J-style.css">
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
               <li><a href="usuarios.php" ><i class="fas fa-user "><br><span>Usuarios</span></i></a></li>
               <li><a href="productos.php"><i class="fas fa-laptop active"><br><span>Productos</span></i></a></li>
               <li><a href="servicios.php"><i class="fas fa-handshake"><br><span>Servicios</span></i></a></li>
               <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt"><br><span>Ubicacion</span></i></a></li>
               <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
               <li><a href="otros.php"><i class="fas fa-ad"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <section class="tabedit tabedit2 ">
            <h1>Editar Producto</h1>
            <form action="edit-pro.php" method="POST" name="form-editus" class="form-editus" enctype="multipart/form-data">
                <input type="hidden" name="idproducto"value="<?php echo $data_producto['idproducto']; ?>">
                <input type="hidden" id="foto_actual"name="foto_actual"value="<?php echo $data_producto['foto']; ?>">
                <input type="hidden" id="foto_remove"name="foto_remove"value="<?php echo $data_producto['foto']; ?>">
                <label for="">Producto</label>
                <br>
                <input type="text" placeholder="Producto" name="nombrePD" require value="<?php echo $data_producto['nombrePD']; ?>">
                <br><br>
                <label for="">Descripcion</label>
                <br>
                <input type="text" placeholder="Descripcion" name="descripcionPD" require value="<?php echo $data_producto['descripcionPD'] ?>">
                <br><br>
                <label for="">Precio</label><br>
                <input type="text" placeholder="Precio" name="precioPD" require value="<?php echo $data_producto['precioPD'] ?>">
                <br><br>
                <label for="">Cantidad</label>
                <br>
                <input type="text" placeholder="cantidad" name="cantidad" require value="<?php echo $data_producto['cantidad'] ?>"> 
                <br><br>
                <label for="">Proveedor:</label>
                <?php 
                    $query_proveedor = mysqli_query($mysqli,"SELECT idproveedor, nombrePV FROM proveedor ORDER BY nombrePV ASC");
                    $result_proveedor = mysqli_num_rows($query_proveedor);
                    mysqli_close($mysqli);
                ?>
                <select name="idproveedor" id="proveedor" placeholder="proveedor">
                    <option value="<?php echo $data_producto['idproveedor']?>" selected ><?php echo $data_producto['nombrePV']?></option>
                    <?php
                        if ($result_proveedor >0) {
                            while ($proveedor = mysqli_fetch_array($query_proveedor)) {
                    ?> 
                        <option value="<?php echo $proveedor['idproveedor']; ?>"><?php echo $proveedor['nombrePV']; ?>
                        </option>

                    <?php           
                            }
                        }
                    ?>

                </select>
                <!--Foto-->
                <div class="photo">
                        <label for="foto">Foto</label>
                        <div class=" prevPhoto prevPhotopro">
                        <span class="delPhoto <?php echo $classRemove;?>">X</span>
                        <label for="foto"></label>
                        <?php echo $foto; ?>
                        </div>
                        <div class="upimg">
                        <input type="file" name="foto" id="foto">
                        </div>
                        <div id="form_alert"></div>
                </div>
                <!--Foto-->

                <br><br>
                <section>
                    <input type="submit" name="edit-pro" value="Guardar" class="btnform">
                    <input type="submit" name="cerrar" value="Cerrar" class="btnform">
                </section>
            </form>


        </section>

    </section>
</body>
</html>