<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<header>
        <section class="principal">
            <img src="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>img/lg1/logoj2.png" alt="">
        </section>
        <section class="usuario">
            <ul>
                <!-- <li><a href=""><img src="img/winnie.png" alt=""></a> -->
                <li><a href=""><img src="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>img/uploads/<?php echo $_SESSION['fot'];?>" alt=""></a>
                    <span><?php echo $_SESSION['nickName']; ?></span>
                    <ul class="sub-nav">
                        <div>
                            <div>
                                <h5>Winnie Solis</h5>
                                <h6>Administrador</h6>
                            </div>
                            <li><a href=" <?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>perfil.php?id=<?php echo $_SESSION['idUser']; ?>">Ver Perfil</a></li>
                            <li><a href="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>salir.php">Cerrar Sesion</a></li>
                            <li><a href="http://www.servtechweb.com.mx/">Ir al FrontEnd</a></li>
                            <li><a href="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>respaldos/index-respaldo.php">Hacer Respaldo</a></li>
                        </div>
                    </ul>
                </li>
            </ul>
        </section>
        <nav>
            <ul class="nav-icon">
                <li class="<?php if ($_SESSION['tpus'] == 5) { echo "disp--none";
                } ?>"><a href="<?php if($page == 'respaldo'){echo '../';} ?>Graficas/Gindex.php"><i class="fas fa-home p-ico <?php if($page == 'graficas'){echo 'active' ;} ?>">
                <br><span>Inicio</span></i></a></li>
                
                <li><a href="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>usuarios.php"><i class="fas fa-user <?php if($page == 'usuarios'){echo 'active' ;} ?>">
                <br><span>Usuarios</span></i></a></li>
                
                <li><a href="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>clientes.php"><i class="fas fa-user-tie <?php if($page == 'clientes'){echo 'active' ;} ?>">
                <br><span>Clientes</span></i></a></li>
                
                <li><a href="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>productos.php"><i class="fas fa-laptop <?php if($page == 'productos'){echo 'active' ;} ?>">
                    <br><span>Productos</span></i></a></li>
                
                <li><a href="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>servicios.php"><i class="fas fa-handshake <?php if($page == 'servicios'){echo 'active' ;} ?>">
                <br><span>Servicios</span></i></a></li>
                
                <li><a href="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>reportes.php"><i class="fas fa-file <?php if($page == 'reportes'){echo 'active' ;} ?>">
                <br><span>Reportes</span></i></a></li>
                
                <li class="<?php if ($_SESSION['tpus'] != 2) { echo "disp--none";
                } ?>"><a href="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>otros.php"><i class="fas fa-ad <?php if($page == 'otros'){echo 'active' ;} ?>">
                <br><span>Otros</span></i></a></li>

                <li class="<?php if ($_SESSION['tpus'] != 2) { echo "disp--none";
                } ?>"><a href="<?php if($page == 'graficas' || $page == 'respaldo'){echo '../';} ?>ventas.php"><i class="fas fa-shopping-cart <?php if($page == 'ventas'){echo 'active' ;} ?>">
                <br><span>Ventas</span></i></a></li>
            </ul>
        </nav>
    </header>
</body>
</html>