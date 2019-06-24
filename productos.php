<?php 

    include("conexion.php");
    session_start();

if (empty($_SESSION['active'])) {
    header('location: login.php');
} 

    if (!empty($_POST)) 
    {
        $alert='';
        if(empty($_POST['nomprod']) || empty($_POST['desc']) || empty($_POST['precio']) || $_POST['precio'] <= 0 || empty($_POST['proveedor']) || empty($_POST['cantidad']) || $_POST['cantidad'] <= 0)
        {
        $alert='<p class="msg_error">Faltaron algunos campos.</p>';
        }
        else{
            $nomprod    = $_POST['nomprod'];
            $desc       = $_POST['desc'];
            $precio     = $_POST['precio'];
            $proveedor  = $_POST['proveedor'];
            $cantidad   = $_POST['cantidad'];

            $foto       = $_FILES['foto'];
            $nom_foto   = $foto['name'];
            $type       = $foto['type'];
            $url_temp   = $foto['tmp_name'];

            $imgProducto = 'img_producto.png';
            if ($nom_foto != '') 
            {
                $destino        = 'img/uploads/';
                $img_nombre     = 'img_'.md5(date('d-m-Y H:m:s' ));
                $imgProducto    = $img_nombre.'.jpg';
                $src            = $destino.$imgProducto;
            }
            echo $precio;
            $query_insert = mysqli_query($mysqli, "INSERT INTO producto (nombrePD, descripcionPD, precioPD, idproveedor, Cantidad, foto) VALUES ('$nomprod', '$desc', '$precio', '$proveedor', $cantidad,'$imgProducto')");
            if ($query_insert) {
                if ($nom_foto != '') {
                    move_uploaded_file($url_temp, $src);
                }
                $alert='<p class="msg_save">Producto guardado corectamente.</p>';
            }else{
                $alert='<p class="msg_save">Error al guardar.</p>';
            }
        }    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Productos │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/J-style.css">
    <!-- script´s -->
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script><!-- Importa la libreria -->
    <script type="text/javascript" src="js/functions.js"></script><!-- Llama a la funcion -->
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <header>
        <section class="principal">
            <img src="img/logo-ST.PNG" alt="">
            <h1>Producto</h1>
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
                            <li><a href="perfil.php">Ver Perfil</a></li>
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
               <li><a href="1productos.php"><i class="fas fa-laptop active"><br><span>Productos</span></i></a></li>
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
        <h3>Alta de Productos</h3>
        <a href="productos.php"></i></a>
        <form action="productos.php" method="POST"  class="form1" enctype="multipart/form-data">
                <label for="">Nombre:</label>
                <input type="text" placeholder="Nombre del prodcuto" name="nomprod">
                <br> <br>
                <label for="">Descripcion:</label>
                <input type="text" placeholder="Descripcion" name="desc">
                <br> <br>
                <label for="">Precio</label>
                <input type="number" step ="any"placeholder="precio" name="precio">
                <br> <br>
                <label for="">Proveedor:</label>
                <?php 
                    $query_proveedor = mysqli_query($mysqli,"SELECT idproveedor, nombrePV FROM proveedor ORDER BY nombrePV ASC");
                    $result_proveedor = mysqli_num_rows($query_proveedor);
                    mysqli_close($mysqli);
                ?>
                <select name="proveedor" id="proveedor" placeholder="proveedor">
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
                <label for="">Cantidad</label>
                <input type="number" placeholder="Cantidad" name="cantidad">
                <br><br><br><br><br>
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
          <section class="table1">
            <table>
                <tr class="tab-princ">
                    <td>ID</td>
                    <td>Producto</td>
                    <td>Descripcion</td>
                    <td>Precio</td>
                    <td>Proveedor</td>
                    <td>Cantidad</td>
                    <td>Foto</td>
                    <td>Acciones</td>
                </tr>
                <?php
                    include("conexion.php");
                    $sql_numr = mysqli_query($mysqli,"SELECT count(*) as total FROM producto");
                    $total_registros = mysqli_fetch_array($sql_numr);
                    $total_registro = $total_registros['total'];
                    $por_pagina = 10;
                    if (empty($_GET['pagina'])) 
                    {
                        $pagina = 1;
                    }
                    else
                    {
                        $pagina = $_GET['pagina'];
                    }
                    $desde = ($pagina - 1) * $por_pagina;
                    $tolalpagina = ceil($total_registro / $por_pagina);

                    $query = mysqli_query($mysqli, "SELECT producto.idproducto, producto.nombrePD, producto.descripcionPD, producto.precioPD, proveedor.nombrePV, producto.cantidad, producto.foto FROM producto INNER JOIN proveedor ON producto.idproveedor = proveedor.idproveedor ORDER BY 1 desc LIMIT $desde, $por_pagina");
                    $result = mysqli_num_rows($query);
                    if ($result > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                            if ($data ['foto' != 'img_producto.png']) 
                            {
                                   $foto = 'img/uploads/'.$data ['foto'];
                            }
                            else
                            {
                                $foto = 'img/uploads/'.$data['foto'];
                            }   
                              ?> 
                    <tr>
                        <td><?php echo $data["idproducto"]; ?></td>
                        <td><?php echo $data["nombrePD"]; ?></td>
                        <td><?php echo $data["descripcionPD"]; ?></td>
                        <td><?php echo $data["precioPD"]; ?></td>
                        <td><?php echo $data["nombrePV"]; ?></td>
                        <td><?php echo $data["cantidad"]; ?></td>
                        <td class="img_producto"><img src="<?php echo $foto; ?>" alt=""></td>
                        <td class="btn-table">
                            <button><i class="fas fa-edit"></i></button>
                            <button><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr> 
                    <?php
                          }  
                    }
                    ?>
            </table>
            <!--paginador-->
            <div class="paginador">
                <ul>
                    <?php 
                        if ($pagina != 1) 
                        {
                    ?>
                    <li><a href="?pagina=<?php    echo 1 ?>">|<</a></li>
                    <li><a href="?pagina=<?php  echo $pagina-1 ?>"><</a></li>      
                    <?php
                        }
                        for ($i=1; $i <= $tolalpagina ; $i ++) 
                        {
                            if ($i == $pagina) 
                            {
                                echo '<li class="pageselected">'.$i."</li>";
                            }
                            else
                            {
                                echo "<li><a  href='?pagina=".$i."'>".$i."</a></li>";
                            }                        
                        }
                        if ($pagina != $tolalpagina) {
                    ?>
                    <li><a href="?pagina=<?php  echo $pagina+1 ?>">></a></li>
                    <li><a href="?pagina=<?php  echo $tolalpagina ?>">>|</a></li>
                <?php } ?>
                </ul>
            </div>
            <!--paginador-->
        </section>
    </section>
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