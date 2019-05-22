





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<header>
    <section class="principal">
        <img src="img/logo-ST.PNG" alt="">
        <h1></h1>
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
    <center>
        <form action="otros.php" class="form-otros" method="POST">
            <h1>Seleccione el que quiere agregar</h1>
            <!-- <label for="">Seleccione el que quiere agregar</label><br><br> -->
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
        </form>
    </center>
    <section class="sec1">
    <center>                
        <section class="tipoUs">
            <center>
                <h1>Tipo de usuario</h1>
                <form action="otros.php">
                    <br>
                    <input type="text" value="Nombre" >
                    <br><br>
                    <button type="submit">Guardar</button>
                </form>
            </center>
        </section>
        <section class="tiposerv">
            <center>
                <h1>Tipo de usuario</h1>
                <form action="otros.php">
                    <br>
                    <input type="text" value="Nombre">
                    <br><br>
                    <button type="submit">Guardar</button>
                </form>
            </center>
        </section>
    </center> 
    </section>
    <section class="sec2">
    <center>
        <section class="sucursal_add">
            <center>
                <h1>Sucursal</h1>
                <form action="otros.php">
                    <br>
                    <input type="text" value="Nombre" ><br><br>
                    <input type="text" value="Direccion"><br><br>
                    <input type="text" value="Telefono"><br><br>
                    <input type="text" value="Codigo postal"><br><br>
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
                    <button type="submit">Guardar</button>
                </form>
            </center>
        </section>    
        <section class="proveedir_add">
            <center>
                <h1>Proveedor</h1>
                <form action="otros.php">
                    <br>
                    <input type="text" value="Nombre" ><br><br>
                    <input type="text" value="Telefono"><br><br>
                    <input type="text" value="Correo"><br><br>
                    <input type="text" value="RFC"><br><br>
                    <input type="text" value="Direccion"><br><br>
                    <select name="estado" id="">
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
                    <button type="submit">Guardar</button>
                </form>
            </center>
        </section>
    </center>
    </section>                    
</section>






</body>
</html>