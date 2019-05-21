<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Servicios │ ServTech</title>
    <!-- style -->
    <link rel="stylesheet" href="style-prueba.css">
    <!-- font-awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <header></header>
    <section class="content">
    <a href="javascript:Abrir()"><i class="fas fa-plus-square"> Nuevo</i></a> <!-- BOTON NUEVO QUE ABRE VENTANA  -->
    <div class="ventana" id="vent">
        <h3>Alta de Usuario</h3>
        <a href="javascript:Cerrar()"><i class="fas fa-times"></i></a>
        <form action="" class="form1">
            <label for="">Nombre(s):</label>
            <input type="text" name="nombreserv" placeholder="Nombre(s)" id="nom-serv">
            <br><br>
            <label for="">Teléfono:</label>
            <input type="text" name="nombreserv" placeholder="Telefono" id="nom-serv">
            <br><br>
            <label for="">Contraseña:</label>
            <input type="text" name="apellido" placeholder="Contraseña" id="nom-serv">
            <br><br>
            <label for="">Tipo de servicio</label>
            <select name="tipserv">
                <?php
                    while($datossrv = mysqli_fetch_array($queryS))
                    {
                ?>
                    <option value="<?php echo $datossrv['idTipoServicio ']?>"> <?php echo $datossrv['Nombre']?></option>
                <?php
                    }
                ?>
            </select>
        </form>
        <form action="" class="form2">
            <label for="">Apellido(s):</label>
            <input type="text" name="apellido" placeholder="Apellido(s)" id="nom-serv">
            <br><br>
            <label for="">Correo:</label>
            <input type="text" name="apellido" placeholder="Correo" id="nom-serv">
            <br><br>
            <label for="">Confirmar:</label>
            <input type="text" name="apellido" placeholder="Confirme contraseña" id="nom-serv">
            <br><br>
            <label for="">Tipo de servicio</label>
            <select name="tipserv">
                <?php
                    while($datossrv = mysqli_fetch_array($queryS))
                    {
                ?>
                    <option value="<?php echo $datossrv['idTipoServicio ']?>"> <?php echo $datossrv['Nombre']?></option>
                <?php
                    }
                ?>
            </select>
        </form>
        <section class="btn-sv">
            <button type="submit" name="guardar">Guardar</button>
            <button type="submit" name="cancelar">Cancelar</button>
        </section>
    </div>
    </section>
        <script>
        function Abrir(){
            document.getElementById("vent").style.display="block";
        }
        function Cerrar(){
            document.getElementById("vent").style.display="none";
        }
    </script>
</body>
</html>