<!DOCTYPE html>

<html lang="es">

<head>
    <title>Inicio BookRoom</title>
    <meta charset="UTF-8">
    <meta name="author" content="Melanie Stella">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">


    <style>

    </style>
</head>

<body>
    <?php
    include_once '../comprobaciones/filtrado.php';
    include_once '../comprobaciones/Password.php';
    include_once '../conexion/conexion.php';
    session_start();
    $con = ConectaDB::singleton();


    if (isset($_REQUEST['Administrador'])) {
        header("location: ../administrador/entradaAdmin.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = filtrado($_POST['nombre']);
        $clave = filtrado($_POST['clave']);
        $dni = filtrado($_POST['dni_usu']);
        $errores = [];
        $existeusuario = $con->compruebaUsuario($dni);
        $clavebbdd = $con->getClave($nombre);


        if (empty($_POST['nombre'])) {
            $errores[] = "<span class='errores'><br>El nombre no puede estar vacío</span>";
        }
        if (empty($_POST['dni_usu'])) {
            $errores[] = "<span class='errores'><br>El dni no puede estar vacío</span>";
        }
        if (empty($_POST['clave'])) {
            $errores[] = "<span class='errores'><br>La contaseña no puede estar vacía</span>";
        }


        if ($existeusuario == false) {
            $errores[] = "<span>El usuario no existe</span>";
        } else if ($existeusuario) {

            if (!Password::verify($clave, $clavebbdd)) {

                $errores[] = "<span>La contraseña no es correcta</span>";
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] != 'GET' && empty($errores)) {

        $_SESSION['nombre'] = $nombre;
        $_SESSION['dni_usu'] = $dni;
        header('location: ./dashboard.php');
    } else {
    ?>
        <!-- <img src="img/bingo.jpg" alt="imagen"/>-->
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="fadeIn first">
                    <span class="material-symbols-outlined">Inicio</span>
                </div>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="text" id="nombre" class="fadeIn second" name="nombre" placeholder="nombre" value="<?php echo (!empty($_POST['nombre'])) ? $nombre : ''; ?>">
                    <input type="text" id="dni_usu" class="fadeIn second" name="dni_usu" placeholder="dni" value="<?php echo (!empty($_POST['dni_usu'])) ? $dni : ''; ?>">
                    <input type="password" id="clave" class="fadeIn third" name="clave" placeholder="password">
                    <input class="btn btn-primary btn-sm" type="submit" value="Entrar" name="enviar">
                    <input class="btn btn-secondary btn-sm" type="submit" value="Admin" name="Administrador">

                </form>
            <?php
            if (!empty($errores)) {
                echo implode('<br>', $errores);
            }
        }
            ?>
            </div>
        </div>


</body>

</html>