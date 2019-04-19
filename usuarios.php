<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Usuarios │ ServTech</title>
    <!-- style -->
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
            <img src="img/winnie.png" alt="">
            <p>Winnie Solis</p>
            <p>Administrador</p>
        </section>
        <nav>
            <ul>
               <li><a href="index.php"><i class="fas fa-home p-ico">
                <p>Inicio</p>
               </i></a></li>
               <li><a href="usuarios.php"><i class="fas fa-user">
                <p>Usuarios</p>
               </i></a></li>
               <li><a href="productos.php"><i class="fas fa-laptop">
                <p>Productos</p>
               </i></a></li>
               <li><a href="servicios.php"><i class="fas fa-handshake">
                <p>Servicios</p>
               </i></a></li>
               <li><a href="ubicacion.php"><i class="fas fa-map-marker-alt">
                <p>Ubicacion</p>
               </i></a></li>
               <li><a href="reportes.php"><i class="fas fa-file">
                <p>Reportes</p>
               </i></a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <article class="bann-art">
            <h2 class="usu">Usuarios</h2>
            <section class="buttons">
                <a href=""><i class="fas fa-plus-square"></i></a>
                <a href=""><i class="fas fa-edit"></i></a>
                <a href=""><i class="fas fa-trash-alt"></i></a>
            </section>
        </article>
        <form action="">
            <select>
                <option value="">Winnie Solis</option>
                <option value="">Julio Guillen</option>
                <option value="">Manuel Noh</option>
                <option value="">Jesus Nah</option>
            </select> 
            <br><br>
            <input type="text" placeholder="Nombres">
            <input type="text" placeholder="Apellidos">
            <br>
            <input type="tel" placeholder="Telefono">
            <input type="email" name="" id="" placeholder="E-mail">
            <br>
            <input type="text" name="" id="" placeholder="Tipo de usuario">
            <input type="text" name="" id="" Placeholder="Ubicación">
        </form>
        <div class="butn">
            <button> Aceptar</button>
        </div>

        
    </section>







</body>
</html>