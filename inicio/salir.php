<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Salida</title>
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
    <div class="row text-center espacio ">
        <h1>Has cerrado sesión</h1>
        <p>Pulsa aquí para volver a la página de inicio</p>
        <?php
        //Al pulsar el botón nos devuelve a la página de inicio y cierra la sesión.
        if (isset($_REQUEST['cerrarSesion'])) {
            session_destroy();
            header("location:../index.php");
        }
        ?>
        <div class="col text-center">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input class="btn btn-sm" type="submit" name="cerrarSesion" value="Inicio">
            </form>
        </div>
    </div>
</body>

</html>