<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Melanie Stella" />
    <title>BookRoom</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Font Awesome iconos-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">BookRoom</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#aplicacion">Aplicación</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Sobre nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Registrate!</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">¡Bienvenido a tu app de gestión de reservas de salas!</div>

        </div>
    </header>
    <!-- Servicios-->
    <section class="page-section" id="servicios">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Servicios</h2>
                <h3 class="section-subheading text-muted">Proporcionamos un sistema de reservas de sala adaptado a cada empresa</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>

                        <i class="fas fa-people-group fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Mejora la organización</h4>
                    <p class="text-muted">Obten un entorno de trabajo más eficiente gracias a nuestra monotorización de salas .</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>

                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Diseño adaptativo</h4>
                    <p class="text-muted">Nuestra aplicación es visible en cualquier dispositivo.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-circle-check fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Reserva tu sala</h4>
                    <p class="text-muted">Elige la sala que mejor se adapte a tus condiciones y reserva.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- aplicacion Grid-->
    <section class="page-section bg-light" id="aplicacion">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">aplicación</h2>
                <h3 class="section-subheading text-muted">Descubre cómo funciona BookRoom</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- aplicacion item 1-->
                    <div class="aplicacion-item">
                        <a class="aplicacion-link" data-bs-toggle="modal" href="#aplicacionModal1">
                            <div class="aplicacion-hover">
                                <div class="aplicacion-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="./assets/img/inicio.PNG" alt="..." />
                        </a>
                        <div class="aplicacion-caption">
                            <div class="aplicacion-caption-heading">Inicio</div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- aplicacion item 2-->
                    <div class="aplicacion-item">
                        <a class="aplicacion-link" data-bs-toggle="modal" href="#aplicacionModal2">
                            <div class="aplicacion-hover">
                                <div class="aplicacion-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="./assets/img/dashboard.PNG" alt="..." />
                        </a>
                        <div class="aplicacion-caption">
                            <div class="aplicacion-caption-heading">Dashboard</div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- aplicacion item 3-->
                    <div class="aplicacion-item">
                        <a class="aplicacion-link" data-bs-toggle="modal" href="#aplicacionModal3">
                            <div class="aplicacion-hover">
                                <div class="aplicacion-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="./assets/img/agenda.PNG" alt="..." />
                        </a>
                        <div class="aplicacion-caption">
                            <div class="aplicacion-caption-heading">Calendario</div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- aplicacion item 4-->
                    <div class="aplicacion-item">
                        <a class="aplicacion-link" data-bs-toggle="modal" href="#aplicacionModal4">
                            <div class="aplicacion-hover">
                                <div class="aplicacion-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="./assets/img/reservas.PNG" alt="..." />
                        </a>
                        <div class="aplicacion-caption">
                            <div class="aplicacion-caption-heading">Tu listado de reservas</div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- aplicacion item 5-->
                    <div class="aplicacion-item">
                        <a class="aplicacion-link" data-bs-toggle="modal" href="#aplicacionModal5">
                            <div class="aplicacion-hover">
                                <div class="aplicacion-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="./assets/img/salas.PNG" alt="..." />
                        </a>
                        <div class="aplicacion-caption">
                            <div class="aplicacion-caption-heading">Salas</div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- aplicacion item 6-->
                    <div class="aplicacion-item">
                        <a class="aplicacion-link" data-bs-toggle="modal" href="#aplicacionModal6">
                            <div class="aplicacion-hover">
                                <div class="aplicacion-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="./assets/img/admin.PNG" alt="..." />
                        </a>
                        <div class="aplicacion-caption">
                            <div class="aplicacion-caption-heading">Administración</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Origen</h2>
                <h3 class="section-subheading text-muted">Conoce nuestra historia</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid " src="./assets/img/about/idea.png" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Marzo de 2022</h4>
                            <h4 class="subheading">El comienzo</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Surge la idea de crear una aplicación que gestione salas de reunión que organize los espacios de trabajo de las empresas</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid " src="./assets/img/about/4.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Abril 2022</h4>
                            <h4 class="subheading">Brainstorming</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Reunión para determinar los puntos clave que caracterizarán nuestra aplicación.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="./assets/img/about/code.png" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Mayo 2022</h4>
                            <h4 class="subheading">Puesta a punto</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Desarrollo del programa</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="./assets/img/about/presentacion.png" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Junio 2022</h4>
                            <h4 class="subheading">Salida al mercado</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Presentación de nuestra aplicación al mercado</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>





    <!-- Registro-->

    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Regístrate</h2>
                <h3 class="section-subheading text-muted">Rellena este formulario y comienza a usar la aplicación</h3>
            </div>


            <?php
            include_once './comprobaciones/filtrado.php';
            include_once './comprobaciones/Password.php';
            include_once './conexion/conexion.php';

            $con = ConectaDB::singleton();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nombre = filtrado($_POST['nombre']);
                $clave = filtrado($_POST['clave']);
                $dni = filtrado($_POST['dni']);
                $email = filtrado($_POST['email']);
                $errores = [];
                $existeusuario = $con->compruebaUsuario($dni);

                if (compruebaDni($dni) != true) {
                    $errores[] = "<span class='errores'><br>Formato de dni erroneo</span>";
                }
            }
            if ($_SERVER['REQUEST_METHOD'] != 'GET' && empty($errores)) {

                if ($existeusuario) { ?>
                    <div class="text-center text-white mb-3" >
                        <div class="fw-bolder">Esta DNI ya está registrado</div>
                        Inicia sesión en el siguiente enlace
                        <br />
                        <a href="../index.php">Inicio</a>
                    </div>
                <?php } else {
                 
                    $rol = 'usuario';
                    $alta = 'si';   
                    //mensaje que se muestra si el formulario ha sido enviado con exito, se inserta al usuario en la bd y se le manda al index para que inicie sesión
                    var_dump($con->insertarUsuario($dni, $nombre, Password::hash($clave), $rol, $alta, $email)); ?>

                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">Registro realizado con éxito!</div>
                        Para activar tu cuenta inicia sesión en el siguiente enlace
                        <br />
                        <a href="./inicio/inicio.php">Inicio</a>
                    </div>
                <?php }
            } else {
                ?>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group espacio">
                                <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Tu nombre *" value="<?php echo (!empty($_POST['nombre'])) ? $nombre : ''; ?>" required />

                            </div>
                            <div class="form-group espacio">
                                <input class="form-control" id="email" name="email" type="text" placeholder="Tu email *" value="<?php echo (!empty($_POST['email'])) ? $email : ''; ?>" required />

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group espacio">
                                <input class="form-control" id="dni" name="dni" type="text" placeholder="Tu dni *" value="<?php echo (!empty($_POST['dni'])) ? $dni : ''; ?>" required />

                            </div>
                            <div class="form-group espacio">
                                <input class="form-control" id="clave" name="clave" type="password" placeholder="Tu password *" required />

                            </div>

                        </div>
                    </div>



        </div>

        <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">Enviar</button></div>
        </form>
        </div>
    <?php
                if (!empty($errores)) {
                    echo implode('<br>', $errores);
                }
            }
    ?>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; BookRoom 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- aplicacion Modals-->
    <!-- aplicacion item 1 modal popup-->
    <div class="aplicacion-modal modal fade" id="aplicacionModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Info aplicación-->
                                <h2 class="text-uppercase">Inicio sesión</h2>
    
                                <img class="img-fluid d-block mx-auto" src="./assets/img/inicio.PNG" alt="..." />
                                <p>Una vez rellenado el formulario de registro, podrás iniciar sesión con tus datos identificativos y entrar en tu cuenta</p>
                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- aplicacion item 2 modal popup-->
    <div class="aplicacion-modal modal fade" id="aplicacionModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Info aplicación-->
                                <h2 class="text-uppercase">Dashboard</h2>
                              
                                <img class="img-fluid d-block mx-auto" src="./assets/img/dashboard.PNG" alt="..." />
                                <p>El dashboard será lo primero que aparecerá cuando entre en tu área personal, en el que tendrás un menú con opciones</p>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- aplicacion item 3 modal popup-->
    <div class="aplicacion-modal modal fade" id="aplicacionModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Info aplicación-->
                                <h2 class="text-uppercase">Calendario</h2>

                                <img class="img-fluid d-block mx-auto" src="./assets/img/agenda.PNG" alt="..." />
                                <p>La sección "Mi agenda" te permitirá apuntar tus reservas o aquellos datos que consideres oportunos y visualizarlas en el calendario.</p>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- aplicacion item 4 modal popup-->
    <div class="aplicacion-modal modal fade" id="aplicacionModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Info aplicación-->
                                <h2 class="text-uppercase">Listado de reservas</h2>
                               
                                <img class="img-fluid d-block mx-auto" src="./assets/img/reservas.PNG" alt="..." />
                                <p>Aquí podrás ver las reservas que has hecho y que el sistema ha registrado.</p>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- aplicacion item 5 modal popup-->
    <div class="aplicacion-modal modal fade" id="aplicacionModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Info aplicación-->
                                <h2 class="text-uppercase">Salas</h2>
                                <img class="img-fluid d-block mx-auto" src="./assets/img/salas.PNG" alt="..." /> 
                                <p>En este buscador podrás saber si la sala que estás buscando se encuentra disponible o no. Las reservas tienen una duración de 2 horas y no pueden ser superiores a un día</p>
             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- aplicacion item 6 modal popup-->
    <div class="aplicacion-modal modal fade" id="aplicacionModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="./assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Info aplicación-->
                                <h2 class="text-uppercase">Administración</h2>
                                
                                <img class="img-fluid d-block mx-auto" src="./assets/img/admin.PNG"alt="..." />
                                <p>Para los administradores hay una sección aparte a través de la cual podrán gestionar tanto las salas como los usuarios.</p>
                          
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>