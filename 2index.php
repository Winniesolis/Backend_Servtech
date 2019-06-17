<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend │ ServTech</title>
    <!-- style -->
    
    <link rel="stylesheet" href="../">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type="text/javascript" src="jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="dist/Chart.bundle.min.js"></script>
    <script type="text/javascript">
    
        $(document).ready(functin(){
            var datos ={
                type: "pie",
                data: {
                    datasets: [{
                        data: [
                            5,
                            10,
                            40,
                            12,
                            23,
                        ],
                        backgrundColor: [
                            "#f7464A",
                            "#46BFBD",
                            "#FBD45C",
                            "#949FB1",
                            "#4D5360",
                        ],
                    }],
                    labels: [
                        "DAtos 1",
                        "DAtos 2",
                        "DAtos 3",
                        "DAtos 4",
                        "DAtos 5",
                    ]
                }, 
                options: {
                    responsive: true;
                }
            };
        });

        var canvas = document.getElementById('chart').getConText('2d');
        window.pie = new Chart(canvas, datos);
    
    </script>
    


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
                            <li><a href="">Cambiar imagen</a></li>
                            <li><a href="respaldos/index-respaldo.php">Hacer Respaldo</a></li>

                        </div>
                    </ul>
                </li>
            </ul>   
        </section>
        <nav>
        <ul class="nav-icon">
               <li><a href="2index.php"><i class="fas fa-home p-ico active"><br><span>Inicio</span></i></a></li>
               <li><a href="usuarios.php" ><i class="fas fa-user"><br><span>Usuarios</span></i></a></li>
               <li><a href="productos.php"><i class="fas fa-laptop"><br><span>Productos</span></i></a></li>
               <li><a href="servicios.php"><i class="fas fa-handshake"><br><span>Servicios</span></i></a></li>
               <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt"><br><span>Ubicacion</span></i></a></li>
               <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
               <li><a href="otros.php"><i class="fas fa-ad"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
        
    <section class="content">
        <div id="canvas-container" style="width:50%;">
            <canvas id="chart" width="500" height="350"></canvas>
        </div>


    </section>











</body>
</html>