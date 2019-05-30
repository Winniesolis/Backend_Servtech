<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Ventas │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
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
            <h1>Ventas</h1>
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
               <li><a href="1productos.php"><i class="fas fa-laptop"><br><span>Productos</span></i></a></li>
               <li><a href="servicios.php"><i class="fas fa-handshake"><br><span>Servicios</span></i></a></li>
               <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt"><br><span>Ubicacion</span></i></a></li>
               <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
               <li><a href="otros.php"><i class="fas fa-ad"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <label for="">Cliente:</label>
                <?php 
                include ("conexion.php");
                    $query_cliente = mysqli_query($mysqli,"SELECT idproveedor, nombrePV FROM proveedor ORDER BY nombrePV ASC");
                    $result_proveedor = mysqli_num_rows($query_cliente);
                    mysqli_close($mysqli);
                ?>
                <select name="proveedor" id="proveedor" placeholder="proveedor">
                    <?php
                        if ($result_proveedor >0) {
                            while ($proveedor = mysqli_fetch_array($query_cliente)) {
                    ?> 
                        <option value="<?php echo $proveedor['idproveedor']; ?>"><?php echo $proveedor['nombrePV']; ?>
                        </option>

                    <?php           
                            }
                        }
                    ?>

                </select>
        <br><br><br>
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
                                $foto = 'img/'.$data['foto'];
                            }   
                              ?> 

                    <tr>
                        <td><?php echo $data["idproducto"]; ?></td>
                        <td><?php echo $data["nombrePD"]; ?></td>
                        <td><?php echo $data["descripcionPD"]; ?></td>
                        <td><?php echo $data["precioPD"]; ?></td>
                        <td><?php echo $data["nombrePV"]; ?></td>
                        <td><?php echo $data["cantidad"]; ?></td>
                        <td><img src='img/uploads/".$data['foto']."'alt=''></td>
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
                                echo "<li class='paginaseleccionada'>".$i."</li>";
                            }
                            else
                            {
                                echo "<li><a href='?pagina=".$i."'>".$i."</a></li>";
                            }                        
                        }
                        if ($pagina != $tolalpagina) {
                    ?>
                    <li><a href="?pagina=<?php  echo $pagina+1 ?>">></a></li>
                    <li><a href="?pagina=<?php  echo $tolalpagina ?>">>|</a></li>
                <?php } ?>
                </ul>
            </div>
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