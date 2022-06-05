<?php

include_once 'dashboard.php';
include_once '../comprobaciones/filtrado.php';
include_once '../comprobaciones/Password.php';
include_once '../conexion/conexion.php';
include_once '../conexion/conexion_limitado.php';

$conl= ConectaDB2::singleton();
$con = ConectaDB::singleton();
$datos = $con->selectSalas();
$dni_usu = $_SESSION['dni_usu'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descripcion = filtrado($_POST['descripcion']);
    $aforo = filtrado($_POST['aforo']);
    $fecha = filtrado($_POST['fecha']);
    $hora = filtrado($_POST['hora']);
    $fecha_actual = date("Y-m-d");
    $sala = $conl->selectSalaReservada($aforo, $descripcion);
    $_SESSION['fecha'] = $fecha;
    $_SESSION['hora'] = $hora;




    if (empty($_POST['fecha'])) {
        $errores[] = "<span class='errores'><br>Debe introducir la fecha </span>";
    } else if ($_POST['fecha'] < $fecha_actual) {
        $errores[] = "<span class='errores'><br>La fecha no puede ser anterior a la actual </span>";
    } else if (empty($_POST['hora'])) {
        $errores[] = "<span class='errores'><br>Debe introducir la hora</span>";
    } else {
        if (!empty($_POST['buscar'])) {
            $existesala = $conl->buscarSala($aforo, $descripcion);
            if (empty($existesala)) {
                $errores[] = "<span class='errores'><br>No existe una sala con esas características</span";
            } else {
                $estado = $conl->estadoSala($fecha, $hora, $aforo, $descripcion);
                if ($estado == 'reservada') {
                    $errores[] = "<span class='errores'><br>Esta sala se encuentra reservada en esa hora, elija otro rango de horario</span>";
                }
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] != 'GET' && empty($errores)) {


    echo 'sala disponible'; ?>

    <div class='col-8 align-items-end mt-4'>
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                SALA
            </h3>
            <div class="card-body">
                <div id="table" class="table-responsive padding-left: 40px">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-center">ID SALA</th>
                                <th class="text-center">AFORO</th>
                                <th class="text-center">DESCRIPCIÓN</th>
                                <th class="text-center">RESERVAR</th>

                                <?php foreach ($sala as $fila) { ?>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <td class="pt-3-half"><?php echo $fila['id_sala']; ?> </td>
                                    <td class="pt-3-half"><?php echo $fila['aforo']; ?></td>
                                    <td class="pt-3-half"><?php echo $fila['descripcion']; ?></td>

                                    <input type="hidden" name="id_sala" value="<?php echo $fila['id_sala']; ?>">
                                    <input type="hidden" name="descripcion" value="<?php echo $fila['descripcion']; ?>">
                                    <input type="hidden" name="aforo" value="<?php echo $fila['aforo']; ?>">

                                    <td> <button class="btn btn-primary" type="submit" name="submit" value="reservar"> reservar </button></td>
                                </form>
                            <?php
                                }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php } else {
?>
    <main class="main col">
        <div class="row mt-4">

            <div class="widget nueva_entrada ">
                <h3 class="titulo text-center">Encuentra tu sala</h3>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="col-md-12 text-center">

                        <label class="mr-sm-4 sr-only" for="inlineFormCustomSelect">Descripción</label>
                        <select name='descripcion' class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <?php
                            foreach ($datos as $fila) { ?>
                                <option name="descripcion" value="<?php echo $fila['descripcion']; ?>"> <?php echo  $fila['descripcion']; ?></option>

                            <?php } ?>
                        </select>



                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Aforo</label>
                        <select name="aforo" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <?php
                            foreach ($datos as $fila) { ?>
                                <option value="<?php echo  $fila['aforo']; ?>"><?php echo  $fila['aforo']; ?></option>
                            <?php } ?>
                        </select>

                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Fecha </label>
                        <input type="date" name="fecha" class="custom-select mr-sm-2" value="<?php echo (!empty($_POST['fecha'])) ? $fecha : ''; ?>">
                        <input type="time" name="hora" min="07:00:00" max="19:00:00" step="7200" value="<?php echo (!empty($_POST['hora'])) ? $hora : ''; ?>">




                        <input class="btn btn-primary btn-sm" type="submit" value="buscar" name="buscar">
                    </div>
                </form>
            </div>

        </div>

        <?php
        if (!empty($errores)) {
            echo implode('<br>', $errores);
        }
    }
    /*Si se reserva la sala se hará un insert de los datos en la tabla reservas y en la tabla agenda
      En la tabla agenda se insertará el campo datos como vacío para que el usuario pueda añadir lo que quiera en el calendario como notas propias.
      Los cambios en el calendario no afectan a la reserva, sólo a la tabla agenda .
    */

    if (isset($_REQUEST['submit'])) {
        $id = $_GET['id_sala'];
        $reservada = 'reservada';
        $reserva = $conl->insertarReservas($dni_usu, $_SESSION['fecha'], $_SESSION['hora'], $id, $reservada);
        $conl->insertarCalendario($dni_usu, $id, '', $_SESSION['fecha'], $_SESSION['hora']);
    

        //var_dump($reserva);
        ?>
        <div class="text-center">

            <h3>Reserva realizada con éxito,</br> pulse <a href="./reservas.php"> aquí </a>para ver sus reservas</h3>
        </div>
    <?php }

    ?>


    </main>
    </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    </body>

    </html>