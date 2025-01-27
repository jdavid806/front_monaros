<?php
include "../menu.php";
include "../header.php";

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


$arrayHistorias = [
  ['historiaId' => 1, 'esteticaCorporal' => 'Estetica Corporal', 'especialidad' => 'Estetica',],
  ['historiaId' => 2, 'esteticaLaser' => 'Estetica Laser', 'especialidad' => 'Estetica'],
  ['historiaId' => 3, 'estetifaFacial' => 'Estetica Facial', 'especialidad' => 'Estetica'],
  ['historiaId' => 4, 'psicologiaNinos' => 'Psicologia Niños', 'especialidad' => 'Psicologia'],
  ['historiaId' => 4, 'psicologiaAdolescentes' => 'Psicologia Adolescentes', 'especialidad' => 'Psicologia'],
  ['historiaId' => 4, 'psicologiaAdultos' => 'Psicologia Adultos', 'especialidad' => 'Psicologia'],
];

$especialidadSeleccionada = 'Estetica';

$historiasFiltradas = array_filter($arrayHistorias, function ($historia) use ($especialidadSeleccionada) {
  return $historia['especialidad'] === $especialidadSeleccionada;
});

// Reindexar el array filtrado
$historiasFiltradas = array_values($historiasFiltradas);

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
              <button class="btn p-0" data-phoenix-dismiss="offcanvas"><span class="uil uil-times fs-7"></span></button>
            </div>
            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <!-- Imagen del avatar -->
                  <div class="me-3">
                    <div class="avatar avatar-5xl">
                      <img class="rounded-circle" src="https://via.placeholder.com/150" alt="Avatar">
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
                  <button class="btn text-primary p-0 d-flex align-items-center gap-2" title="ver detalles de consulta"
                    data-value="mostrar" type="button" data-bs-toggle="modal"
                    data-bs-target="#modalVerAntecedentesClinicos">
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
                  <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-estate"></span>
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
                  <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-windsock"></span>
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
          <div class="phoenix-offcanvas-backdrop d-lg-none top-0" data-phoenix-backdrop="data-phoenix-backdrop"></div>
        </div>
      </div>
      <div class="col-8">
        <label for="organizerSingle" class="form-label mt-5">Seleccione una historia</label>
        <!-- Formulario con el select dinámico -->
        <select class="form-select mb-5" id="organizerSingle" data-choices="data-choices"
          data-options='{"removeItemButton":true,"placeholder":true}'>
          <option value="">Seleccione una historia</option>
          <?php foreach ($historiasFiltradas as $historia): ?>
            <?php
            foreach ($historia as $key => $value) {
              if ($key !== 'especialidad' && $key !== 'historiaId') {
                $historiaNombre = $key;
                break;
              }
            }
            ?>
            <option value="<?= $historiaNombre; ?>">
              <?= $value; ?>
            </option>
          <?php endforeach; ?>
        </select>

        <h3 class="mt-5 mb-5">Historico de Consultas</h3>
        <div id="consultas"
          data-list="{&quot;valueNames&quot;:[&quot;fecha&quot;,&quot;doctor&quot;,&quot;motivo&quot;],&quot;page&quot;:5,&quot;pagination&quot;:{&quot;innerWindow&quot;:2,&quot;left&quot;:1,&quot;right&quot;:1}}">
          <div class="search-box mb-3 mx-auto">

            <form class="position-relative">

              <input class="form-control search-input search form-control-sm" type="search" placeholder="Search"
                aria-label="Search" />
              <span class="fas fa-search search-box-icon"></span>
            </form>
          </div>
          <div class="filter-box mb-3 mx-auto">
            <form class="row">
              <div class="form-group col-4">
                <label class="form-label" for="startDate">Fecha de inicio</label>
                <input class="form-control datetimepicker" id="startDate" type="text" placeholder="dd/mm/yyyy"
                  data-options='{"disableMobile":true,"dateFormat":"d/m/Y"}' />
              </div>
              <div class="form-group col-4">
                <label class="form-label" for="endDate">Fecha final</label>
                <input class="form-control datetimepicker" id="endDate" type="text" placeholder="dd/mm/yyyy"
                  data-options='{"disableMobile":true,"dateFormat":"d/m/Y"}' />
              </div>
              <div class="col-auto">
                <button class="btn btn-secondary mt-4" type="button" id="filterBtn">Filtrar fechas</button>
              </div>
            </form>
          </div>



          <div class="table-responsive">
            <table class="table table-sm fs-9 mb-0">
              <thead>
                <tr>
                  <th class="sort border-top border-translucent ps-3" data-sort="fecha">Fecha</th>
                  <th class="sort border-top" data-sort="doctor">Doctor (a)</th>
                  <th class="sort border-top" data-sort="motivo">Motivo de la consulta</th>
                  <th class="sort text-end align-middle pe-0 border-top" scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                <?php foreach ($consultas as $consulta) { ?>

                  <tr>
                    <td class="align-middle ps-3 fecha"><?= $consulta['fecha'] ?></td>
                    <td class="align-middle doctor"><?= $consulta['doctor'] ?></td>
                    <td class="align-middle motivo"><?= $consulta['motivo'] ?></td>
                    <td class="align-middle white-space-nowrap text-end pe-0">
                      <div class="d-flex justify-content-around fs-9">

                        <button class="btn text-primary p-0" title="ver detalles de consulta" data-value="mostrar"
                          type="button" data-bs-toggle="modal" data-bs-target="#modalVerConsulta">
                          <i class="fa-solid fa-up-right-from-square"></i>
                        </button>

                        <a href="#<?php echo $consulta['historiaId']; ?>" title="impirmir consulta"
                          class="btn text-primary p-0">
                          <i class="fa-solid fa-print"></i>
                        </a>

                        <a href="#<?php echo $consulta['historiaId']; ?>" title="impirmir consulta"
                          class="btn text-primary p-0">
                          <i class="fa-solid fa-download"></i>
                        </a>

                        <a class="btn text-primary p-0" href="#" role="button" title="compartir" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="fa-solid fa-share-nodes"></i>
                        </a>

                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#"><i class="fa-brands fa-whatsapp"></i> Compartir por
                              Whatsapp</a></li>
                          <li><a class="dropdown-item" href="#"><i class="fa-solid fa-envelope"></i> Compartir por
                              Correo</a></li>
                        </ul>

                      </div>
                    </td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center mt-3">
            <button class="page-link disabled" data-list-pagination="prev" disabled=""><svg
                class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas"
                data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                  d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z">
                </path>
              </svg><!-- <span class="fas fa-chevron-left"></span> Font Awesome fontawesome.com --></button>
            <ul class="mb-0 pagination">
              <li class="active"><button class="page" type="button" data-i="1" data-page="5">1</button></li>
              <li><button class="page" type="button" data-i="2" data-page="5">2</button></li>
              <li><button class="page" type="button" data-i="3" data-page="5">3</button></li>
              <li class="disabled"><button class="page" type="button">...</button></li>
              <li><button class="page" type="button" data-i="9" data-page="5">9</button></li>
            </ul>
            <button class="page-link pe-0" data-list-pagination="next"><svg class="svg-inline--fa fa-chevron-right"
                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                <path fill="currentColor"
                  d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                </path>
              </svg></button>
          </div>
        </div>

      </div>

    </div>
  </div>

</div>

</div>

<script>
  document.getElementById("filterBtn").addEventListener("click", function () {
    // Obtener las fechas de los inputs
    const startDate = new Date(document.getElementById("startDate").value);
    const endDate = new Date(document.getElementById("endDate").value);

    // Asegúrate de que las fechas sean válidas
    if (isNaN(startDate) || isNaN(endDate)) {
      alert("Por favor, selecciona un rango de fechas válido.");
      return;
    }

    // Obtener todas las filas de la tabla
    const rows = document.querySelectorAll(".list tr");

    rows.forEach((row) => {
      // Obtener la fecha de la fila actual
      const fechaCell = row.querySelector(".fecha");
      if (fechaCell) {
        const rowDate = new Date(fechaCell.textContent.trim());

        // Mostrar u ocultar la fila según el rango de fechas
        if (rowDate >= startDate && rowDate <= endDate) {
          row.style.display = ""; // Mostrar fila
        } else {
          row.style.display = "none"; // Ocultar fila
        }
      }
    });
  });
</script>
<script>
  // Capturamos el evento change del select
  document.getElementById('organizerSingle').addEventListener('change', function () {
    var historiaSeleccionada = this.value; // Obtenemos el valor seleccionado (nombre de la historia)

    // Si se ha seleccionado una historia (valor no vacío)
    if (historiaSeleccionada) {
      // Redirigimos a la URL con el parámetro historiaSeleccionada
      window.location.href = 'historiaMedica?=' + historiaSeleccionada;
    }
  });
</script>
</script>
<?php
include "./modalAntecedentes.php";
include "../footer.php";
include "./modalConsulta.php";
?>