<?php
include "../menu.php";
include "../header.php";


$arrayCards = [
    ['icono' => 'stethoscope', 'titulo' => 'Corporal', 'texto' => 'Crea o revisa el historial de Ortodoncia', 'divId' => 'cargarResultados', 'url' => 'esteticaCorporal'],
    ['icono' => 'kit-medical', 'titulo' => 'Facial', 'texto' => 'Crea o revisa el historial de Odontología', 'divId' => 'resultadosCargados', 'url' => 'esteticaFacial'],
    ['icono' => 'book-medical', 'titulo' => 'Laser', 'texto' => 'Crea o revisa el historial de Periodoncia', 'divId' => 'orden', 'url' => 'esteticaLaser'],
    ['icono' => 'stethoscope', 'titulo' => 'Mesoterapia facial', 'texto' => 'Crea o revisa el historial de Endodoncia', 'divId' => 'cargarResultados', 'url' => 'esteticaMesoterapiaFacial'],
    ['icono' => 'kit-medical', 'titulo' => 'Mesoterapia Capilar', 'texto' => 'Crea o revisa el historial de Control de Placa', 'divId' => 'resultadosCargados', 'url' => 'esteticaMesoterapiaCorporal'],
    ['icono' => 'kit-medical', 'titulo' => 'Mesoterapia Corporal', 'texto' => 'Crea o revisa el historial de Control de Placa', 'divId' => 'resultadosCargados', 'url' => 'historial-control-placa.php']
];

?>

<div class="componete">
    <div class="content mb-5">
        <div class="container-small">
            <nav class="mt-5" aria-label="breadcrumb">
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="Dashboard">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Estetica</li>
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
                                <div class="row align-items-center g-3 text-center text-xxl-start">
                                    <div class="col-12 col-xxl-auto">
                                        <div class="avatar avatar-5xl"><img class="rounded-circle"
                                                src="../../assets/img/team/33.webp" alt=""></div>
                                    </div>
                                    <div class="col-12 col-sm-auto flex-1">
                                        <h3 class="fw-bolder mb-2">Jefferson Dávila</h3>
                                        <p class="mb-0">RH O+</p><a class="fw-bold" href="#!"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-5">
                                    <h3>Información General</h3>
                                    <button class="btn btn-link px-3" type="button">Edit</button>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-envelope-alt">
                                        </span>
                                        <h5 class="text-body-highlight mb-0">Email</h5>
                                    </div><a href="mailto:shatinon@jeemail.com:">jefer@gmail.com</a>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-phone">
                                        </span>
                                        <h5 class="text-body-highlight mb-0">Celular</h5>
                                    </div><a href="tel:+1234567890">+57305.....</a>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-clock"></span>
                                        <h5 class="text-body-highlight mb-0">Ultima Consulta</h5>
                                    </div>
                                    <p class="mb-0 text-body-secondary">12 November 2021, 10:54 AM</p>
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
                <h2>Estetica</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 row-cols-xxl-4 g-3 mb-3 mt-5">


                    <?php foreach ($arrayCards as $key => $card) { ?>
                        <div class="col">
                            <div class="card card-item" style="max-width:15rem;height:13em;"
                                data-div-id="<?= $card['divId'] ?>">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><i class="fas fa-<?= $card['icono'] ?>"></i>
                                        <?= $card['titulo'] ?></h5>
                                    <div class="d-flex gap-2 flex-grow-1">
                                        <p class="card-text fs-9">
                                            <?= $card['texto'] ?>
                                        </p>
                                    </div>
                                    <a href="<?= $card['url'] ?>"
                                        class="btn btn-primary btn-icon flex-shrink-0 mt-auto w-100">
                                        Ver más
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                </div>
                <div class="col-12">
                    <div id="infoContainer"
                        style="margin-top: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 8px;">
                        <div id="examenes" class="info-div d-none">
                            <h3>Exámenes</h3>
                            <p>Detalles específicos sobre los exámenes de laboratorio.</p>
                        </div>
                        <div id="cargarResultados" class="info-div d-none">
                            <h3>Cargar Resultados</h3>
                            <p>Información sobre cómo cargar resultados al sistema.</p>
                        </div>
                        <div id="resultadosCargados" class="info-div d-none">
                            <h3>Resultados Cargados</h3>
                            <p>Detalles de los resultados que ya están en el sistema.</p>
                        </div>
                        <div id="orden" class="info-div d-none">
                            <h3>Generar Orden de Laboratorio</h3>
                            <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" id="home-tab"
                                        data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home"
                                        aria-selected="true">Seleccionar por Examenes</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="profile-tab"
                                        data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile"
                                        aria-selected="false" tabindex="-1">Seleccionar por paquetes</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="contact-tab"
                                        data-bs-toggle="tab" href="#tab-contact" role="tab" aria-controls="tab-contact"
                                        aria-selected="false" tabindex="-1">Seleccionar por categorías</a></li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab-home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <!-- Por examenes -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Generar Orden de Laboratorio por exámenes</h5>
                                            <form action="submit" class="row">

                                                <select id="categoria" name="categoria" class="form-control mb-3">
                                                    <option value="">Seleccione una categoría</option>
                                                    <?php foreach ($arrayCategorias as $key => $categoria) { ?>
                                                        <option value="<?= $key ?>"><?= $categoria ?></option>
                                                    <?php } ?>
                                                </select>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<?
include "../footer.php";
?>