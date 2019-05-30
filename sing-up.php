<?php
    include('conexion.php');
    $queryPer = mysqli_query($mysqli,"SELECT idpersona, nombres FROM persona ORDER BY `idpersona` ASC");

    if(isset($_POST['persona']))
    {
        $persona =$_POST['persona'];
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <section class="sec-login form-reg">
        <article>
            <center>
                <form action="sing-up.php" method="POST" name="form-login">
                    <h1 class="registro">Registro</h1><br><br><br><br>
                    <label for="">Nombre del usuario</label><br><br>
                    <select name="persona" id="">
                    <?php
                        while ($datosPer = mysqli_fetch_array($queryPer))
                        {
                    ?>
                    <option value="<?php echo$datosPer['idpersona']?>"><?php echo $datosPer['nombres']?></option>
                    <?php
                        }
                    ?>
                </select>
                <br>
                    <input type="text" placeholder="NickName" name="nickName"><br><br><br>
                    <input type="password" placeholder="Contraseña" name="pass"><br><br><br>
                    <input type="submit" name="crear" value="Crear Cuenta" class="btn-entrar">
                </form>
            </center>
            <a href="login.php">Iniciar Sesion</a>
    </article>
    </section>
<?php
    if(!empty($_POST['nickName']) && !empty($_POST['pass']))
    {
        $persona =$_POST['persona'];
        $nickName =$_POST['nickName'];
        $pass =$_POST['pass'];
        $mysqli->query("INSERT INTO usuarioLog (idpersona,nickName,pass,idtipousuario) VALUES ($persona,'$nickName','$pass',2)");
    }else{
        echo "<script>alert('Datos incompletos');</script>";
    }

?>  





</body>
</html>