<?php
ob_start();
include_once 'dashboard.php';
include_once '../comprobaciones/filtrado.php';
include_once '../comprobaciones/Password.php';
include_once '../conexion/conexion_limitado.php';

$con = ConectaDB2::singleton();
$dni = $_SESSION['dni_usu'];
$datos = $con->misReservas($dni);

if ($datos == false) {
    echo 'no tiene reservas';
} else {


    if ($_SERVER['REQUEST_METHOD'] != 'GET') {

        $id = filtrado($_POST['id_reserva2']);
        $fecha = filtrado($_POST['fecha2']);
        $hora = filtrado($_POST['hora2']);
        $sala = filtrado($_POST['id_sala2']);
        $estado = filtrado($_POST['estado2']);

        if (isset($_POST['cancelar'])) {
            $con->borrarReservas($dni, $id);
            header('location: reservas.php');
        }
    } else { ?>

        <main class="main col">
            <div class="row">

                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                        Listado de reservas
                    </h3>
                    <div class="card-body">
                        <div id="table" class="table-responsive padding-left: 40px">
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID RESERVA</th>
                                        <th class="text-center">FECHA</th>
                                        <th class="text-center">HORA</th>
                                        <th class="text-center">SALA</th>
                                        <th class="text-center">ESTADO</th>
                                        <?php foreach ($datos as $fila) { ?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="pt-3-half"><?php echo  $fila['id_reserva']; ?> </td>
                                        <td class="pt-3-half"><?php echo $fila['fecha']; ?></td>
                                        <td class="pt-3-half"><?php echo $fila['hora']; ?></td>
                                        <td class="pt-3-half"><?php echo $fila['id_sala']; ?></td>
                                        <td class="pt-3-half"><?php echo $fila['estado']; ?></td>
                                        <td class="pt-3-half">
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                                                <input type="hidden" name="id_reserva" value="<?php echo $fila['id_reserva']; ?>">
                                                <input type="hidden" name="fecha" value="<?php echo $fila['fecha']; ?>">
                                                <input type="hidden" name="hora" value="<?php echo $fila['hora']; ?>">
                                                <input type="hidden" name="id_sala" value="<?php echo $fila['id_sala']; ?>">
                                                <input type="hidden" name="estado" value="<?php echo $fila['estado']; ?>">

                                                <button class="btn btn-primary" type="submit" name="submit" value="ver"> editar </button>
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


                                    <input type="text" name="id_reserva2" value="<?php if (empty($_REQUEST['submit'])) { //Si no pulso el botón submit me muestra una cadena vacia, sino me muestra los datos del GET.
                                                                                        echo " ";
                                                                                    } else {
                                                                                        echo $_GET['id_reserva'];
                                                                                    } ?>">
                                    <input type="text" name="fecha2" value="<?php if (empty($_REQUEST['submit'])) {
                                                                                echo " ";
                                                                            } else {
                                                                                echo $_GET['fecha'];
                                                                            } ?>">
                                    <input type="text" name="hora2" value="<?php if (empty($_REQUEST['submit'])) {
                                                                                echo " ";
                                                                            } else {
                                                                                echo $_GET['hora'];
                                                                            } ?>">

                                    <input type="text" name="id_sala2" value="<?php if (empty($_REQUEST['submit'])) {
                                                                                    echo " ";
                                                                                } else {
                                                                                    echo $_GET['id_sala'];
                                                                                } ?>">
                                    <input type="text" name="estado2" value="<?php if (empty($_REQUEST['submit'])) {
                                                                                    echo " ";
                                                                                } else {
                                                                                    echo $_GET['estado'];
                                                                                } ?>">


                                    <button type="submit" name="cancelar" value="cancelar">cancelar reserva </button>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
    }
}
ob_end_flush();?>

            </div>


        </main>
        </div>
        </div>

        <script src="../js/bootstrap.bundle.min.js"></script>
        </body>

        </html>