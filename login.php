<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
    // $alert = "EL usuario o contraseña es incorrecto";
    header('location: Graficas/Gindex.php');

} else {
    if (!empty($_POST)) {
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $alert = 'Ingrese su usuario y clave';
            echo $alert;
        } else {
            require_once "conexion.php";
            $user = $_POST['usuario'];
            $pas = $_POST['clave'];
            $pasencrip = md5($pas);
            echo $pasencrip."mostrando encriptacion";
            $query = mysqli_query($mysqli, "SELECT * FROM usuariolog WHERE nickName ='$user' AND pass = '$pasencrip'");
            $result = mysqli_num_rows($query);

            if ($result > 0) {
                $data = mysqli_fetch_array($query);
               
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['idusuarioLog'];
                $_SESSION['nickName'] = $data['nickName'];
                echo "Entro al sistema";
                header('location: Graficas/Gindex.php');
            }else{
                $alert = "El usuario o la clave son incorrectos";
            }
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
    <title>Login │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <div class="contenedor">
        <section class="sec-login">
            <center>
                <form action="login.php" method="post" name="form-login">
                    <h1>Login</h1><br><br>
                    <input type="text" placeholder="Usuario" name="usuario" require><br><br><br>
                    <input type="password" placeholder="Contraseña" name="clave" require><br><br><br>
                    <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?></div>
                    <input type="submit" name="entrar_log" value="Entrar" class="btn-entrar">
                </form>
            </center>
            <a href="sing-up.php">Registrarse</a>
        </section>
    </div>





</body>

</html>