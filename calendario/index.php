<?php 
require_once('../conexion/conexion_limitado.php');
include_once '../inicio/dashboard.php'; 
$conn= ConectaDB2::singleton();
$dni_usu=$_SESSION['dni_usu'];



?>
   
<main class="main col">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient" id="topNavBar">
        <div class="container justify-content-center">
            <div>
                <b class="text-light">Mi agenda de reservas</b>
            </div>
        </div>
    </nav>
    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
            <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title text-center">Apunte su reserva</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <!--Envío los datos introducidos por el usuario más el campo del id y el dni del usuario como hidden-->
                            <form action="guardar.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                
                                <input type="hidden" name="dni_usu" value="<?php echo $dni_usu; ?>">
                                <div class="form-group mb-2">
                                    <label for="sala" class="control-label">Sala</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="sala" id="sala" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="datos" class="control-label">Datos</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="datos" id="datos" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="fecha" class="control-label">Fecha</label>
                                    <input type="date" class="form-control form-control-sm rounded-0" name="fecha" id="fecha" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="hora" class="control-label">Hora</label>
                                    <input type="time" class="form-control form-control-sm rounded-0" min="07:00:00" max="19:00:00" step="7200" name="hora" id="hora" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal, es el modal que aparece cuando cliclamos sobre la reserva -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Detalles de la reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Sala</dt>
                            <dd id="sala" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Datos</dt>
                            <dd id="datos" class=""></dd>
                            <dt class="text-muted">fecha</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">hora</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Editar</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Eliminar</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    <!-- Event Details Modal -->

<?php 
$reservas = $conn->selectCalendario($dni_usu);
 //$conn->query("SELECT * FROM `agenda` where dni_usu='$dni_usu'");
$datos = [];
foreach($reservas as $row){
    $row['sdate'] = $row['fecha']; //formateamos las fechas
    $row['edate'] = $row['hora'];
    $datos[$row['id']] = $row; //asignamos el id a los datos
}
?>
<?php 
//if(isset($conn)) $conn->close();
?>
</body>

<script src="./js/es.js"></script> <!--Idioma español Fullcalendar-->
<script>
    var codificados = $.parseJSON('<?= json_encode($datos) ?>') //transformamos nuestra variable con los datos a objeto json.
</script>
<script src="./js/script.js"></script>

</html>