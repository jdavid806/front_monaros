<?php
include "../menu.php";
include "../header.php";




$arrayCards = [
    ['icono' => 'stethoscope', 'titulo' => 'Estética', 'texto' => 'Crea o revisa el historial de Estetica', 'divId' => 'cargarResultados', 'url' => 'seleccionarHistoria'],
    ['icono' => 'stethoscope', 'titulo' => 'Medicina General', 'texto' => 'Crea o revisa el historial de médicina general', 'divId' => 'resultadosCargados', 'url' => 'seleccionarHistoria'],
    ['icono' => 'fas fa-pen-alt', 'titulo' => 'Psicologia', 'texto' => 'Crea o revisa el historial de psicologia', 'divId' => 'resultadosCargados', 'url' => 'seleccionarHistoria'],
    ['icono' => 'fas fa-brain', 'titulo' => 'Psiquiatria', 'texto' => 'Crea o revisa el historial de psiquiatria', 'divId' => 'resultadosCargados', 'url' => 'seleccionarHistoria'],
    ['icono' => 'kit-medical', 'titulo' => 'Pediatria', 'texto' => 'Crea o revisa el historial de pediatria', 'divId' => 'resultadosCargados', 'url' => 'seleccionarHistoria'],   
];


$consultas = [
    ['historiaId' => 1, 'fecha' => '2024-11-20', 'doctor' => 'Manuel Antonio Rosales', 'motivo' => 'Control General'],
    ['historiaId' => 2, 'fecha' => '2024-11-21', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Control Cardiologico'],
    ['historiaId' => 3, 'fecha' => '2024-11-21', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Control Cardiologico'],
    ['historiaId' => 4, 'fecha' => '2024-11-22', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Control Cardiologico'],
    ['historiaId' => 5, 'fecha' => '2024-11-22', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Control Cardiologico'],
    ['historiaId' => 6, 'fecha' => '2024-11-29', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Control Cardiologico'],
    ['historiaId' => 7, 'fecha' => '2024-11-29', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Control Cardiologico'],
    ['historiaId' => 8, 'fecha' => '2024-11-30', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Control Cardiologico'],
    ['historiaId' => 9, 'fecha' => '2024-12-10', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Control Cardiologico'],
];

$consultasHistorico = [
    ['fecha' => '2024-11-20', 'descripcion' => 'Consulta sobre productos'],
    ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
    ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
    ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
    ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
    ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
    ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
];
?>

<div class="componete">
    <div class="content mb-5">
        <div class="container-small">
            <nav class="mt-5" aria-label="breadcrumb" style="margin-top: 75px !important;">
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="Dashboard">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Consultas</li>
                </ol>
            </nav>
        </div>
        <div class="row w-100">
            <div class="col-4">
                <div class="sticky-leads-sidebar mt-5">
                    <div class="lead-details-offcanvas bg-body scrollbar phoenix-offcanvas phoenix-offcanvas-fixed"
                        id="productFilterColumn">
                        <div class="d-flex justify-content-between align-items-center mb-2 d-md-none">
                            <h3 class="mb-0">Información del Paciente</h3>
                            <button class="btn p-0" data-phoenix-dismiss="offcanvas"><span
                                    class="uil uil-times fs-7"></span></button>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <!-- Imagen del avatar -->
                                    <div class="me-3">
                                        <div class="avatar avatar-5xl">
                                            <img class="rounded-circle" src="https://via.placeholder.com/150"
                                                alt="Avatar">
                                        </div>
                                    </div>
                                    <!-- Información personal -->
                                    <div class="flex-grow-1">
                                        <!-- Nombre -->
                                        <h5 class="fw-bold mb-2">Jefferson Dávila</h5>
                                        <!-- Datos adicionales -->
                                        <div class="d-flex flex-wrap align-items-center gap-3">
                                            <!-- RH -->
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-droplet text-primary me-2"></i>
                                                <span class="fw-bold">RH:</span>
                                                <span class="text-muted ms-1">O+</span>
                                            </div>
                                            <!-- Teléfono -->
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-phone text-primary me-2"></i>
                                                <span class="fw-bold">Celular:</span>
                                                <span class="text-muted ms-1 small">305357</span>
                                            </div>
                                            <!-- Correo -->
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-envelope text-primary me-2"></i>
                                                <span class="fw-bold">Email:</span>
                                                <span class="text-muted ms-1 small">Email@email.com</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <!-- Encabezado con título y botón al lado -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3>Antecendentes médicos</h3>
                                    <button class="btn text-primary p-0 d-flex align-items-center gap-2"
                                        title="ver detalles de consulta" data-value="mostrar" type="button"
                                        data-bs-toggle="modal" data-bs-target="#modalVerAntecedentesClinicos">
                                        <i class="fa-solid fa-file-medical"></i>
                                        <p class="mb-0">Ver más</p>
                                    </button>

                                </div>

                                <!-- Última consulta -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-1">
                                        <span class="me-2 uil uil-clock"></span>
                                        <h5 class="text-body-highlight mb-0">Última Consulta</h5>
                                    </div>
                                    <p class="mb-0 text-body-secondary">12 November 2021, 10:54 AM</p>
                                </div>

                                <!-- Campos básicos de antecedentes médicos -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-1">
                                        <span class="me-2 uil uil-medkit"></span>
                                        <h5 class="text-body-highlight mb-0">Alergias</h5>
                                    </div>
                                    <p class="mb-0 text-body-secondary">Polen, Penicilina</p>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-1">
                                        <span class="me-2 uil uil-heart"></span>
                                        <h5 class="text-body-highlight mb-0">Enfermedades Crónicas</h5>
                                    </div>
                                    <p class="mb-0 text-body-secondary">Hipertensión, Diabetes</p>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-1">
                                        <span class="me-2 uil uil-walking"></span>
                                        <h5 class="text-body-highlight mb-0">Hábitos Relevantes</h5>
                                    </div>
                                    <p class="mb-0 text-body-secondary">No fuma, realiza actividad física semanalmente
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-5">
                                    <h3>Información de Contacto</h3>
                                    <button class="btn btn-link" type="button">Edit</button>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-1"><span
                                            class="me-2 uil uil-estate"></span>
                                        <h5 class="mb-0">Dirección</h5>
                                    </div>
                                    <p class="mb-0 text-body-secondary">calle 123</p>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-map"></span>
                                        <h5 class="mb-0 text-body-highlight">Ciudad</h5>
                                    </div>
                                    <p class="mb-0 text-body-secondary">Bogota</p>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center mb-1"><span
                                            class="me-2 uil uil-windsock"></span>
                                        <h5 class="mb-0 text-body-highlight">País</h5>
                                    </div>
                                    <p class="mb-0 text-body-secondary">Colombia</p>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center mb-1"><span class="me-2"></span>
                                        <h5 class="text-body-highlight mt-5"> Razón Ultima Consulta</h5>
                                    </div>
                                    <p class="mb-0 text-body-secondary">Presentaba dolores de cabeza y abdominales</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="phoenix-offcanvas-backdrop d-lg-none top-0"
                        data-phoenix-backdrop="data-phoenix-backdrop"></div>
                </div>
            </div>
            <div class="col-8">
                <h2 id = "especialidadPagina">Consultas</h2>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Evolucion del paciente</h5>
                        <div class="row align-items-center g-3 text-center text-xxl-start">
                            <div class="timeline">
                                <?php foreach ($consultasHistorico as $consulta) { ?>
                                    <div class="timeline-item">
                                        <div class="date"><?= $consulta['fecha'] ?></div>
                                        <div class="card">
                                            <div class="description"><?= $consulta['descripcion'] ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 row-cols-xxl-4 g-3 mb-3 mt-5">

                    <?php foreach ($arrayCards as $key => $card) { ?>
                        <div class="col">
                            <div class="card card-item" style="max-width:15rem;height:13em;"
                                data-div-id="<?= $card['divId'] ?>">
                                <div class="card-body d-flex flex-column align-items-center text-center">
                                    <div class="card-icon mb-2">
                                        <i class="fas fa-<?= $card['icono'] ?> fa-2x"></i>
                                    </div>
                                    <h5 class="card-title"><?= $card['titulo'] ?></h5>
                                    <div class="d-flex gap-2 flex-grow-1">
                                        <p class="card-text fs-9"><?= $card['texto'] ?></p>
                                    </div>
                                    <a href="<?= $card['url'] ?>"
                                        class="btn btn-primary btn-icon flex-shrink-0 mt-auto w-100">Ver más</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
              
            </div>
        </div>

    </div>

</div>







<style>
    .active-card {
        border: 2px solid #007bff;
        /* Cambia el borde */
        background-color: #f0f8ff;
        /* Cambia el color de fondo */
        transition: all 0.3s ease;
        /* Animación suave */
    }

    .floating-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: flex;
        align-items: center;
        background-color: #007bff;
        color: white;
        border-radius: 50px;
        padding: 10px 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        z-index: 1000;
    }

    .floating-button:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3);
    }

    .button-icon {
        width: 30px;
        height: 30px;
        margin-right: 10px;
        border-radius: 50%;
    }
</style>
<style>
    .timeline {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        margin: 20px 0;
        padding: 0 10px;
        width: 100%;
        overflow-x: auto;
    }

    .timeline::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 4px;
        background-color: #0d6efd;
        z-index: -1;
    }

    .timeline-item {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin: 0 20px;
    }

    .timeline-item .date {
        font-weight: bold;
        padding: 5px 10px;
        border: 1px solid;
        border-radius: 5px;
        margin-bottom: 10px;
        z-index: 1;
    }

    .timeline-item .card {
        position: relative;
        border: 1px solid;
        padding: 15px;
        border-radius: 5px;
        min-width: 200px;
        text-align: center;
        z-index: 1;
    }

    .timeline-item .card::before {
        content: '';
        position: absolute;
        top: 50%;
        left: -40px;
        transform: translateY(-50%);
        width: 40px;
        height: 4px;
        background-color: #0d6efd;
    }
</style>

<?
include "./modalAntencedentes.php";
include "./modalConsulta.php";
include "../footer.php";
?>