<?php
session_start();

if (empty($_SESSION['active'])) {
    header('location: login.php');
} 

    if(isset($_GET['id']))
    {
        $claveid = $_GET['id'];
        
    }

    include('conexion.php');
    $query = mysqli_query($mysqli,"SELECT idsucursal, nombreSC FROM sucursal ORDER BY `idsucursal` ASC");
    if(isset($_POST['sucursal']))
    {
        $sucursal =$_POST['sucursal'];
        // echo $sucursal;
    }
    // tipo de usuario
    $query1 = mysqli_query($mysqli,"SELECT idtipousuario, nombreTU FROM tipousuario ORDER BY `idtipousuario` ASC");

    if(isset($_POST['tipUs']))
    {
        $tipUs =$_POST['tipUs'];
        // echo $tipUs;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Usuarios │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/J-style.css">
    <!-- font-awasome -->
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script><!-- Importa la libreria -->
    <script type="text/javascript" src="js/functions.js"></script><!-- Llama a la funcion -->
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <header>
        <section class="principal">
            <img src="img/logo-ST.PNG" alt="">
            <h1>Usuarios</h1>
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
               <li><a href="Graficas/Gindex.php"><i class="fas fa-home p-ico"><br><span>Inicio</span></i></a></li>
               <li><a href="usuarios.php" ><i class="fas fa-user active"><br><span>Usuarios</span></i></a></li>
               <li><a href="productos.php"><i class="fas fa-laptop"><br><span>Productos</span></i></a></li>
               <li><a href="servicios.php"><i class="fas fa-handshake"><br><span>Servicios</span></i></a></li>
               <!-- <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt"><br><span>Ubicacion</span></i></a></li> -->
               <li><a href="reportes.php"><i class="fas fa-file"><br><span>Reportes</span></i></a></li>
               <li><a href="otros.php"><i class="fas fa-ad"><br><span>Otros</span></i></a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <a href="javascript:Abrir()"><i class="fas fa-plus-square"> Nuevo</i></a> <!-- BOTON NUEVO QUE ABRE VENTANA  -->
        <div class="ventana" id="vent">
        <a href="javascript:Cerrar()"><i class="fas fa-times"></i></a>
        <h3>Alta de Usuario</h3>
        <a href="usuarios.php"></i></a>
        <form action="usuarios.php" method="POST"  class="form1" enctype="multipart/form-data">
                <label for="">Nombre(s):</label>
                <input type="text" placeholder="Nombre(s)" name="nombres">
                <br> <br>
                <label for="">Apellido(s):</label>
                <input type="text" placeholder="Apellido(s)" name="apellidos">
                <br> <br>
                <label for="">Correo</label>
                <input type="email" placeholder="correo" name="correo">
                <br> <br>
                <label for="">Telefono:</label>
                <input type="tel" placeholder="telefono" name="telefono">
                <br> <br>
                <label for="">NickName:</label>
                <input type="text" placeholder="NickName" name="NickName">
                <br> <br>
                <label for="">Contraseña:</label>
                <input type="password" placeholder="Contraseña" name="contraseña">
                <br> <br>
                <label for="">Contraseña:</label>
                <input type="password" placeholder="Confirme su contraseña" name="conf-contra">
                <br> <br><br><br>
                <label for="">Sucursal: </label>
                <select name="sucursal" id="">
                    <?php
                        while ($datossc = mysqli_fetch_array($query))
                        {
                    ?>
                    <option value="<?php echo$datossc['idsucursal']?>"><?php echo $datossc['nombreSC']?></option>
                    <?php
                        }
                    ?>
                </select>
                <br><br>
                <label for="">Tipo de usuario: </label>
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
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Correo</td>
                    <td>Telefono</td>
                    <td>Sucursal</td>
                    <td>Tipo de usuario</td>
                    <td>Foto</td>
                    <td></td>
                </tr>
                <?php
                //inicial el conteo del paginador
                    include("conexion.php");
                    $sql_numr = mysqli_query($mysqli,"SELECT count(*) as total FROM usuariolog");
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
                    //finaliza el conteo del paginador
                
                    $query3 = mysqli_query($mysqli,"SELECT * FROM persona INNER JOIN usuariolog ON persona.idpersona = usuariolog.idpersona INNER JOIN sucursal ON sucursal.idsucursal = persona.idsucursal INNER JOIN tipousuario ON usuariolog.idtipousuario = tipousuario.idtipousuario ORDER BY 1 desc LIMIT $desde, $por_pagina");
                    $result = mysqli_num_rows($query);
                    if ($result > 0) {
                        # code...
                    
                    while($datostable = mysqli_fetch_array($query3))
                    {
                        $foto = 'img/uploads/'.$datostable ['foto'];
                    ?>
                    <tr>
                        <td><?php echo $datostable['idpersona']?></td>
                        <td><?php echo $datostable['nombres']?></td>
                        <td><?php echo $datostable['apellidos']?></td>
                        <td><?php echo $datostable['correo']?></td>
                        <td><?php echo $datostable['telefono']?></td>
                        <td><?php echo $datostable['nombreSC']?></td>
                        <td><?php echo $datostable['nombreTU']?></td>
                        <td class="img_producto"><img src="<?php echo $foto; ?>" alt=""></td>
                        <td class="btn-table">
                            <a href="edit-us.php?id=<?php echo $datostable['idpersona']?>"><button><i class="fas fa-edit"></i></button></a>
                            <a href="elim-us.php?id=<?php echo $datostable['idpersona']?>"><button><i class="fas fa-trash-alt"></i></button></a>
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
<?php
    if(isset($_POST['guardar_us']))
    {
        // echo"entro aqui"."\n";
        $nombres =$_POST['nombres'];
        $apellidos =$_POST['apellidos'];
        $correo =$_POST['correo'];
        $telefono =$_POST['telefono'];
        $sucursal = $_POST['sucursal'];
        $tipUs = $_POST['tipUs'];
        $contraseña = $_POST['contraseña'];
        $contraenv = md5($contraseña);
        $contraseña2 = $_POST['conf-contra'];
        $nick = $_POST['NickName'];

        $foto       = $_FILES['foto'];
        $nom_foto   = $foto['name'];
        $type       = $foto['type'];
        $url_temp   = $foto['tmp_name'];

        $imgUsuario = 'usuario.png';
            if ($nom_foto != '') 
            {
                $destino        = 'img/uploads/';
                $img_nombre     = 'img_'.md5(date('d-m-Y H:m:s' ));
                $imgUsuario    = $img_nombre.'.jpg';
                $src            = $destino.$imgUsuario;
            }



        print_r($_FILES) ;
        print_r($_POST);
        // echo "imprimiendo sucursal"."\n";
        // echo $sucursal;
        $table2 = 'persona';
        $table3 = 'usuariolog';
        if($contraseña == $contraseña2){
            $mysqli->query("INSERT INTO $table2 (nombres, apellidos, correo, telefono, idsucursal) VALUES ('$nombres','$apellidos','$correo','$telefono' ,$sucursal)");
            // echo"se incertaron correctamente";
            $queryPer = mysqli_query($mysqli,"SELECT idpersona,correo FROM persona WHERE correo = '$correo' ");
            $conperso = mysqli_fetch_array($queryPer);
            $idprs = $conperso['idpersona'];
            $mysqli->query("INSERT INTO $table3 (idpersona,nickName,pass,idtipousuario,foto) VALUES ($idprs,'$nick','$contraenv',$tipUs,'$imgUsuario')") ;

            if ($nom_foto != '') {
                    move_uploaded_file($url_temp, $src);
                }
            
        }else{
            echo "<script>alert('Las contraseñas no coinciden');</script>";

        }
       
    }
?>
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