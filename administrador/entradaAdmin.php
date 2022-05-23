<!DOCTYPE html>

<html lang="es">

<head>
    <title>Inicio Administrador BookRoom</title>
    <meta charset="UTF-8">
    <meta name="author" content="Melanie Stella">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../js/bootstrap.bundle.min.js">

</head>

<body>
    <?php
    include_once '../comprobaciones/filtrado.php';
    include_once '../comprobaciones/Password.php';
    include_once '../conexion/conexion.php';
    $con = ConectaDB::singleton();
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = filtrado($_POST['nombre']);
        $clave = filtrado($_POST['clave']);
        $dni = filtrado($_POST['dni_usu']);
        $_SESSION['nombre']=$nombre;
        $errores = [];
        $existeusuario = $con->compruebaUsuario($nombre, $dni);
        $clavebbdd = $con->getClave($nombre);
        $compruebarol = $con->compruebarol($nombre);


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
            if ($compruebarol !== 'administrador') {
                $errores[] = "<span> Este usuario no tiene rol de administrador </span>";
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] != 'GET' && empty($errores)) {
        session_start();


        header('location: administracion.php');
    } else {
    ?>
   <div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
    <span class="material-symbols-outlined">Inicio administrador</span>
    </div>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="text" id="nombre" class="fadeIn second" name="nombre" placeholder="login">
      <input type="text" id="dni_usu" class="fadeIn second" name="dni_usu" placeholder="dni" value="<?php echo (!empty($_POST['dni_usu'])) ? $dni : ''; ?>">
      <input type="password" id="clave" class="fadeIn third" name="clave" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
    <div class="error">
          <?php
        if (!empty($errores)) {
          echo implode("<br>", $errores);
      }
      ?>
  </div>
  </div>
</div>
  <?php
  }
  ?>
</body>

</html>