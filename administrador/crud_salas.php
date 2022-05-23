<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administración de salas</title>
    <meta charset="UTF-8">
    <meta name="author" content="Melanie Stella">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../js/bootstrap.bundle.min.js">
</head>

<body>
    <?php
    //script para la sección de administrador
    include_once '../conexion/conexion.php';
    include_once '../comprobaciones/filtrado.php';

    //exporta el conneto de la clase patronSingleton
    $conn = ConectaDB::singleton();

    $datos = $conn->selectSalas();

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {

        $id = filtrado($_POST['id_sala2']);
        $descripcion = filtrado($_POST['descripcion2']);
        $aforo = filtrado($_POST['aforo2']);
      

        //CÓMO HACER PARA QUE AL CAMBIAR O DAR DE ALTA A UN NUEVO USUARIO LA CONTRASEÑA SE HASHEE .
        if (isset($_REQUEST['crear'])) {

            $conn->insertarSalas($id, $descripcion, $aforo);
            //var_dump($_POST);
            header('location:crud_salas.php');
        }
        if (isset($_REQUEST['borrar'])) {
            $conn->borrarSalas($id);
            header('location:crud_salas.php');
        }
        if (isset($_REQUEST['modificar'])) {

            $conn->modificarSalas($id, $descripcion, $aforo);
            //var_dump($_POST); Para verificar que me recoge los datos
            header('location:crud_salas.php');
        }
    } else { ?>

        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                Listado de salas
            </h3>
            <div class="card-body">
                <div id="table" class="table-responsive padding-left: 40px">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-center">SALA</th>
                                <th class="text-center">DESCRIPCIÓN</th>
                                <th class="text-center">AFORO</th>
                                <th class="text-center">SELECCIONAR</th>

                                <?php foreach ($datos as $fila) { ?>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-3-half"><?php echo  $fila['id_sala']; ?> </td>
                                <td class="pt-3-half"><?php echo $fila['descripcion']; ?></td>
                                <td class="pt-3-half"><?php echo $fila['aforo']; ?></td>
                                <td class="pt-3-half">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                                        <input type="hidden" name="id_sala" value="<?php echo $fila['id_sala']; ?>">
                                        <input type="hidden" name="descripcion" value="<?php echo $fila['descripcion']; ?>">
                                        <input type="hidden" name="aforo" value="<?php echo $fila['aforo']; ?>">

                                        <button class="btn btn-primary" type="submit" name="submit" value="ver"> </button>
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
                    <div class="col-sm-10 ">

                        <form class="input" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">


                            <input type="text" name="id_sala2" value="<?php if (empty($_REQUEST['submit'])) { //Si no pulso el botón submit me muestra una cadena vacia, sino me muestra los datos del GET.
                                                                            echo " ";
                                                                        } else {
                                                                            echo $_GET['id_sala'];
                                                                        } ?>">
                            <input type="text" name="descripcion2" value="<?php if (empty($_REQUEST['submit'])) {
                                                                                echo " ";
                                                                            } else {
                                                                                echo $_GET['descripcion'];
                                                                            } ?>">
                            <input type="text" name="aforo2" value="<?php if (empty($_REQUEST['submit'])) {
                                                                        echo " ";
                                                                    } else {
                                                                        echo $_GET['aforo'];
                                                                    } ?>">
                        


                            <button type="submit" name="crear" value="Crear">CREAR </button>
                            <button type="submit" name="borrar" value="borrar">BORRAR </button>
                            <button type="submit" name="modificar" value="modificar">MODIFICAR </button>



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