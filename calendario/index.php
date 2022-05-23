<?php 
require_once('db-connect.php');
include_once '../inicio/dashboard.php'; 
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
                                    <label for="nombre" class="control-label">Nombre de la reserva</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="nombre" id="nombre" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="descripcion" class="control-label">Descripción</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="descripcion" id="descripcion" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="fech_inicio" class="control-label">Inicio</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="fech_inicio" id="fech_inicio" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="fech_fin" class="control-label">Fin</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="fech_fin" id="fech_fin" required>
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
                            <dt class="text-muted">Nombre de la reserva</dt>
                            <dd id="nombre" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Descripción</dt>
                            <dd id="descripcion" class=""></dd>
                            <dt class="text-muted">Inicio</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">Fin</dt>
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
$reservas = $conn->query("SELECT * FROM `agenda` where dni_usu='$dni_usu'");
$datos = [];
foreach($reservas->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['fech_inicio'])); //formateamos las fechas
    $row['edate'] = date("F d, Y h:i A",strtotime($row['fech_fin']));
    $datos[$row['id']] = $row; //asignamos el id a los datos
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
</body>

<script src="./js/es.js"></script> <!--Idioma español Fullcalendar-->
<script>
    var codificados = $.parseJSON('<?= json_encode($datos) ?>') //transformamos nuestra variable con los datos a objeto json.
</script>
<script src="./js/script.js"></script>

</html>