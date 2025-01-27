<?php
include "../menu.php";
include "../header.php";

$dropdownNew =
  '<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-plus"></i> &nbsp; Nuevo
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#">Consulta</a></li>
    </ul>
  </div>';


$consultas = [
  ['fecha' => '2024-11-20', 'descripcion' => 'Consulta sobre productos'],
  ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
  ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
  ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
  ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
  ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
  ['fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos'],
];

$tabs = [
  ['icono' => 'calendar-days', 'titulo' => 'Citas', 'texto' => 'Agenda una nueva cita o revisa todas las citas agendadas a este paciente', 'url' => 'verCitas?1'],
  ['icono' => 'file-circle-plus', 'titulo' => 'Examenes clínicos', 'texto' => 'Revisa todos los exaenes clínicos generados a este paciente', 'url' => 'verExamenes?1'],
  ['icono' => 'kit-medical', 'titulo' => 'Recetas médicas', 'texto' => 'Genera y revisatodas las recetas médicas para este paciente', 'url' => 'verRecetas?1'],
  ['icono' => 'wheelchair', 'titulo' => 'Incapacidades clínicas', 'texto' => 'Consulta todas las incapacidades clínicas para este paciente', 'url' => 'verIncapacidades?1'],
  ['icono' => 'hospital', 'titulo' => 'Antecedentes personales', 'texto' => 'Revisa todos los antecedentes personales registrados para este paciente', 'url' => 'verAntecedentes?1'],
  ['icono' => 'book-medical', 'titulo' => 'Consentimientos', 'texto' => 'Genera y revisa todos los consentimientos y certificados registrados para este paciente', 'url' => 'verConcentimientos?1'],
  ['icono' => 'file-invoice-dollar', 'titulo' => 'Presupuestos', 'texto' => 'Genera y revisa todos los presupuestos elaborados para este paciente', 'url' => '#'],
  ['icono' => 'syringe', 'titulo' => 'Esquema de vacunación', 'texto' => 'Revisa el esquema de vacunación o genera un nuevo esquema', 'url' => 'esquemaVacunacion'],
  ['icono' => 'book-medical', 'titulo' => 'Exámenes de laboratorio', 'texto' => 'Revisa los exámenes de laboratorio', 'url' => 'laboratorio'],
  ['icono' => 'fas fa-address-book', 'titulo' => 'Consultas medicas', 'texto' => 'Revisa o crea historias médicas', 'url' => 'consulta'],
];

?>

<style type="text/css">
  .custom-btn {
    width: 150px;
    /* Establece el ancho fijo */
    height: 40px;
    /* Establece la altura fija */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-bottom: 5px;
    /* Espaciado opcional entre botones */
  }

  .custom-btn i {
    margin-right: 5px;
    /* Espaciado entre el ícono y el texto */
  }
</style>
<div class="componete">
  <div class="content">
    <nav class="mb-3" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="Dashboard">Inicio</a></li>
        <li class="breadcrumb-item"><a href="pacientes">Pacientes</a></li>
        <li class="breadcrumb-item active" onclick="location.reload()">Miguel Angel Castro Franco</li>
      </ol>
    </nav>
    <div class="pb-9">
      <div class="row">
        <div class="col-12">
          <div class="row align-items-center justify-content-between">
            <div class="col-md-6">
            
            </div>
            <div class="col-md-6 text-md-end text-start mt-2 mt-md-0">
              <?php
              // echo $dropdownNew; 
              ?>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-0 g-md-4 g-xl-6 p-5">
      <h2 class="mb-0">Miguel Angel Castro Franco</h2>
        <div class="col-md-5 col-lg-5 col-xl-4">
          <div class="sticky-leads-sidebar">
            <div class="lead-details-offcanvas bg-body scrollbar phoenix-offcanvas phoenix-offcanvas-fixed"
              id="productFilterColumn">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row align-items-center g-3 text-center text-xxl-start">
                    <div class="col-12 col-xxl-auto">
                      <div class="avatar avatar-5xl"><img class="rounded-circle"
                          src="<?= $ConfigNominaUser['logoBase64'] ?>" alt="" /></div>
                    </div>
                    <div class="col-12 col-sm-auto flex-1">
                      <h3 class="fw-bold mb-2">Miguel Angel Castro Franco</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="mb-4 border-bottom d-flex justify-content-between gap-3">
                    <div class="fw-semibold">
                      Genero
                    </div>
                    <div>
                      Masculino
                    </div>
                  </div>
                  <div class="mb-4 border-bottom d-flex justify-content-between gap-3">
                    <div class="fw-semibold">
                      Edad
                    </div>
                    <div>
                      21 Años
                    </div>
                  </div>
                  <div class="mb-4 border-bottom d-flex justify-content-between gap-3">
                    <div class="fw-semibold">
                      Tipo de Sangre
                    </div>
                    <div>
                      A Positivo
                    </div>
                  </div>
                  <div class="mb-4 border-bottom d-flex justify-content-between gap-3">
                    <div class="fw-semibold">
                      Condicion Especial
                    </div>
                    <div>
                      TDHA
                    </div>
                  </div>
                  <div class="mb-4 border-bottom d-flex justify-content-between gap-3">
                    <div class="fw-semibold">
                      Antecedentes
                    </div>
                    <div>
                      TDHA, ASMA, HTA
                    </div>
                  </div>
                  <div class="mb-4 border-bottom d-flex justify-content-between gap-3">
                    <div class="fw-semibold">
                      Whatsapp
                    </div>
                    <div>
                      +57350........
                    </div>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-pencil"></i> &nbsp; Editar información
                    </button>
                  </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-5">
                    <h3>Diagnosticos CIE-11</h3>
                  </div>
                  <div class="">
                    <div id="diagnosticosCie" style="width: 100%; height: 200px;">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-7 col-lg-7 col-xl-8 data">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Evolucion del paciente</h5>
              <div class="row align-items-center g-3 text-center text-xxl-start">
                <div class="timeline">
                  <?php foreach ($consultas as $consulta) { ?>
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

            <?php foreach ($tabs as $tab) { ?>
              <div class="col">
                <div class="card text-center" style="max-width:15rem;  min-height: 15em;">
                  <div class="card-body d-flex flex-column justify-content-between align-items-center"
                    style="height: 100%;">
                    <!-- Icono en la parte superior -->
                    <div class="mb-2">
                      <i class="fas fa-<?= $tab['icono'] ?> fa-2x"></i>
                    </div>
                    <!-- Título -->
                    <h5 class="card-title"><?= $tab['titulo'] ?></h5>
                    <!-- Texto -->
                    <p class="card-text fs-9 text-center">
                      <?= $tab['texto'] ?>
                    </p>
                    <!-- Botón siempre al fondo -->
                    <button class="btn btn-primary btn-icon mt-auto" onclick="window.location.href='<?= $tab['url'] ?>'">
                      <span class="fa-solid fa-chevron-right"></span>
                    </button>
                  </div>
                </div>
              </div>
            <?php } ?>


          </div>



        </div>

      </div>
    </div>

  </div>
</div>

<style>


  .card-text {
    overflow: hidden;
    text-overflow: ellipsis;
    max-height: 3em;
    /* Limita el texto */
    line-height: 1.5;
  }

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

<script>
  document.addEventListener('DOMContentLoaded', function () {

    // Llama a la función para inicializar el gráfico
    createDoughnutChart(
      "diagnosticosCie",
      "",
      "",
      "Diagnosticos",
      [{
        value: 2,
        name: "A202"
      },
      {
        value: 1,
        name: "100X"
      },
      {
        value: 3,
        name: "A011"
      },
      {
        value: 1,
        name: "A99x"
      },
      {
        value: 1,
        name: "c478"
      },
      ]
    );
  });
</script>


<?php include "../footer.php";
?>