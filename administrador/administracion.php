<!DOCTYPE html>

<html lang="es">

<head>
    <title>Area Administrador BookRoom</title>
    <meta charset="UTF-8">
    <meta name="author" content="Melanie Stella">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <style>
        .espacio {
            padding: 200px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    ?>
   <h3 class="py-2 text-center"><?php echo 'Bienvenido ' . $_SESSION['nombre']; ?></h3>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['usuarios'])) {
            header('location: crud_usuarios.php');
        }
        if (isset($_POST['salas'])) {
            header('location: crud_salas.php');
        }

        if (isset($_POST['salir'])) {
            session_destroy();
            header('location: ../index.php');
        }
    } else { ?>

        <div class="row justify-content-center align-items-center">

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <div class="col text-center espacio">
                    <input class="btn btn-sm" type="submit" value="administrar usuarios" name="usuarios">

                    <input class="btn btn-sm" type="submit" value="administrar salas" name="salas">

                    <input class="btn btn-sm" type="submit" value="salir" name="salir">
                </div>

        </div>

        </form>

    <?php
    }
    ?>
</body>

</html>