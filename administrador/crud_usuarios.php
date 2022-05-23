<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../js/bootstrap.bundle.min.js">
    <title>Administración de usuarios</title>


</head>


<style>

</style>
</head>

<body>
    <?php
    //script para la sección de administrador
    include_once '../conexion/conexion.php';
    include_once '../comprobaciones/filtrado.php';
    include_once '../comprobaciones/Password.php';

    //exporta el conneto de la clase patronSingleton
    $conn = ConectaDB::singleton();



    $datos = $conn->selectUsuario();

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {

        $dni = filtrado($_POST['dni_usu2']);
        $nombre = filtrado($_POST['nombre2']);
        $email = filtrado($_POST['email2']);
        $rol = filtrado($_POST['rol2']);
        $alta = filtrado($_POST['alta2']);

        //CÓMO HACER PARA QUE AL CAMBIAR O DAR DE ALTA A UN NUEVO USUARIO LA CONTRASEÑA SE HASHEE .
        if (isset($_REQUEST['crear'])) {

            $conn->insertarUsuario($dni, $nombre, Password::hash($clave));
            //var_dump($_POST);
            header('location:crud_usuarios.php');
        }
        if (isset($_REQUEST['borrar'])) {
            $conn->borrarUsuario($dni);
            header('location:crud_usuarios.php');
        }
        if (isset($_REQUEST['modificar'])) {

            var_dump($conn->modificarUsuario($dni, $nombre, $email, $rol, $alta));
            //var_dump($_POST); Para verificar que me recoge los datos
            header('location:crud_usuarios.php');
        }
    } else { ?>


        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                Listado de usuarios registrados
            </h3>
            
             
            
            <div class="card-body">
              
                <div id="table" class="table-responsive padding-left: 40px">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-center">DNI</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">ROL</th>
                                <th class="text-center">ALTA</th>
                                <th class="text-center">SELECCIONAR</th>
                                <?php foreach ($datos as $fila) { ?>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-3-half"><?php echo  $fila['dni_usu']; ?> </td>
                                <td class="pt-3-half"><?php echo $fila['nombre']; ?></td>
                                <td class="pt-3-half"><?php echo $fila['email']; ?></td>
                                <td class="pt-3-half"><?php echo $fila['rol']; ?></td>
                                <td class="pt-3-half"><?php echo $fila['alta']; ?></td>
                                <td class="pt-3-half">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                                        <input type="hidden" name="dni_usu" value="<?php echo $fila['dni_usu']; ?>">
                                        <input type="hidden" name="nombre" value="<?php echo $fila['nombre']; ?>">
                                        <input type="hidden" name="email" value="<?php echo $fila['email']; ?>">
                                        <input type="hidden" name="rol" value="<?php echo $fila['rol']; ?>">
                                        <input type="hidden" name="alta" value="<?php echo $fila['alta']; ?>">
                                        <button class="btn btn-primary" type="submit" name="submit" value="ver">  </button>
                                    </form>
                                </td>
                            <?php
                                }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>




                <div class="row justify-content-center">
                    <div class="col-lg-8  ">

                        <form class="input" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">


                            <input type="text" name="dni_usu2" value="<?php if (empty($_REQUEST['submit'])) { //Si no pulso el botón submit me muestra una cadena vacia, sino me muestra los datos del GET.
                                                                            echo " ";
                                                                        } else {
                                                                            echo $_GET['dni_usu'];
                                                                        } ?>">
                            <input type="text" name="nombre2" value="<?php if (empty($_REQUEST['submit'])) {
                                                                            echo " ";
                                                                        } else {
                                                                            echo $_GET['nombre'];
                                                                        } ?>">
                           <input type="text" name="email2" value="<?php if (empty($_REQUEST['submit'])) {
                                                                            echo " ";
                                                                        } else {
                                                                            echo $_GET['email'];
                                                                        } ?>">
                            <input type="text" name="rol2" value="<?php if (empty($_REQUEST['submit'])) {
                                                                            echo '';
                                                                        } else {
                                                                            echo $_GET['rol'];
                                                                        } ?>">
                            <input type="text" name="alta2" value="<?php if (empty($_REQUEST['submit'])) {
                                                                            echo " ";
                                                                        } else {
                                                                            echo $_GET['alta'];
                                                                        } ?>">


                            <button class="btn btn-sm btn-primary" type="submit" name="crear" value="Crear">CREAR </button>
                            <button class="btn btn-sm btn-primary" type="submit" name="borrar" value="borrar">BORRAR </button>
                            <button class="btn btn-sm btn-primary" type="submit" name="modificar" value="modificar">MODIFICAR </button>



                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
<a class="btn btn-primary" href="administracion.php" role="button">volver</a>
</body>

</html>