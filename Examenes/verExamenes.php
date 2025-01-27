<?php
include "../menu.php";
include "../header.php";

$examenes = [
  'laboratorio' => [
    ['examenId' => 1, 'fecha' => '2024-11-20', 'tipo' => 'Hemograma', 'doctor' => 'Manuel Antonio Rosales', 'motivo' => 'Control General'],
    ['examenId' => 2, 'fecha' => '2024-11-21', 'tipo' => 'Química Sanguínea', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Chequeo'],
    ['examenId' => 3, 'fecha' => '2024-11-22', 'tipo' => 'Prueba de Función Hepática', 'doctor' => 'Carlos Ruiz', 'motivo' => 'Control Post-Operatorio'],
  ],
  'imagenologia' => [
    ['examenId' => 4, 'fecha' => '2024-11-29', 'tipo' => 'Radiografía de Tórax', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Diagnóstico de Dolor Torácico'],
    ['examenId' => 5, 'fecha' => '2024-12-10', 'tipo' => 'Resonancia Magnética', 'doctor' => 'Carlos Ruiz', 'motivo' => 'Control Neurológico'],
  ],
];
?>

<style>
  .custom-btn {
    width: 150px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 5px;
  }

  .custom-btn i {
    margin-right: 5px;
  }
</style>

<div class="content">
  <div class="container-small">
    <nav class="mb-3" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="Dashboard">Inicio</a></li>
        <li class="breadcrumb-item"><a href="pacientes">Pacientes</a></li>
        <li class="breadcrumb-item"><a href="verPaciente?1">Miguel Angel Castro Franco</a></li>
        <li class="breadcrumb-item active" onclick="location.reload()">Exámenes</li>
      </ol>
    </nav>

    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2 class="mb-0">Exámenes</h2>
            <small>Miguel Angel Castro Franco</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabs para seleccionar laboratorio o imagenología -->
    <ul class="nav nav-underline fs-9" id="examenTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="laboratorio-tab" data-bs-toggle="tab" href="#laboratorio" role="tab"
          aria-controls="laboratorio" aria-selected="true">Laboratorio</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="imagenologia-tab" data-bs-toggle="tab" href="#imagenologia" role="tab"
          aria-controls="imagenologia" aria-selected="false">Imagenología</a>
      </li>
    </ul>

    <!-- Contenido de las tabs -->
    <div class="tab-content" id="examenTabsContent">
      <!-- Laboratorio -->
      <div class="tab-pane fade show active" id="laboratorio" role="tabpanel" aria-labelledby="laboratorio-tab">
        <div class="row mt-4">
          <div id="examenesLaboratorio"
            data-list='{"valueNames":["fecha","tipo","doctor","motivo"],"page":5,"pagination":{"innerWindow":2,"left":1,"right":1}}'>
            <div class="search-box mb-3 mx-auto">
              <form class="position-relative">
                <input class="form-control search-input form-control-sm" type="search" placeholder="Buscar examen"
                  aria-label="Buscar" />
                <span class="fas fa-search search-box-icon"></span>
              </form>
            </div>

            <div class="table-responsive">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th class="sort" data-sort="fecha">Fecha</th>
                    <th class="sort" data-sort="tipo">Tipo de Examen</th>
                    <th class="sort" data-sort="doctor">Doctor(a)</th>
                    <th class="sort" data-sort="motivo">Motivo</th>
                    <th class="text-end">Acciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php foreach ($examenes['laboratorio'] as $examen) { ?>
                    <tr>
                      <td class="fecha align-middle"><?= $examen['fecha'] ?></td>
                      <td class="tipo align-middle"><?= $examen['tipo'] ?></td>
                      <td class="doctor align-middle"><?= $examen['doctor'] ?></td>
                      <td class="motivo align-middle"><?= $examen['motivo'] ?></td>
                      <td class="text-end align-middle">
                        <div class="d-flex justify-content-end gap-2">
                          <button class="btn text-primary p-0" title="Editar examen"
                            onclick="editarExamen(<?= $examen['examenId'] ?>)">
                            <i class="fa-solid fa-edit"></i>
                          </button>
                          <button class="btn text-primary p-0" title="Eliminar examen"
                            onclick="eliminarExamen(<?= $examen['examenId'] ?>)">
                            <i class="fa-solid fa-trash"></i>
                          </button>
                          <button class="btn text-primary p-0" title="Descargar examen"
                            onclick="descargarExamen(<?= $examen['examenId'] ?>)">
                            <i class="fa-solid fa-download"></i>
                          </button>
                          <button class="btn text-primary p-0" title="Compartir examen"
                            onclick="compartirExamen(<?= $examen['examenId'] ?>)">
                            <i class="fa-solid fa-share-alt"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Imagenología -->
      <div class="tab-pane fade" id="imagenologia" role="tabpanel" aria-labelledby="imagenologia-tab">
        <div class="row mt-4">
          <div id="examenesImagenologia"
            data-list='{"valueNames":["fecha","tipo","doctor","motivo"],"page":5,"pagination":{"innerWindow":2,"left":1,"right":1}}'>
            <div class="search-box mb-3 mx-auto">
              <form class="position-relative">
                <input class="form-control search-input form-control-sm" type="search" placeholder="Buscar examen"
                  aria-label="Buscar" />
                <span class="fas fa-search search-box-icon"></span>
              </form>
            </div>

            <div class="table-responsive">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th class="sort" data-sort="fecha">Fecha</th>
                    <th class="sort" data-sort="tipo">Tipo de Examen</th>
                    <th class="sort" data-sort="doctor">Doctor(a)</th>
                    <th class="sort" data-sort="motivo">Motivo</th>
                    <th class="text-end">Acciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php foreach ($examenes['imagenologia'] as $examen) { ?>
                    <tr>
                      <td class="fecha align-middle"><?= $examen['fecha'] ?></td>
                      <td class="tipo align-middle"><?= $examen['tipo'] ?></td>
                      <td class="doctor align-middle"><?= $examen['doctor'] ?></td>
                      <td class="motivo align-middle"><?= $examen['motivo'] ?></td>
                      <td class="text-end align-middle">
                        <div class="d-flex justify-content-end gap-2">
                          <button class="btn text-primary p-0" title="Editar examen"
                            onclick="editarExamen(<?= $examen['examenId'] ?>)">
                            <i class="fa-solid fa-edit"></i>
                          </button>
                          <button class="btn text-primary p-0" title="Eliminar examen"
                            onclick="eliminarExamen(<?= $examen['examenId'] ?>)">
                            <i class="fa-solid fa-trash"></i>
                          </button>
                          <button class="btn text-primary p-0" title="Descargar examen"
                            onclick="descargarExamen(<?= $examen['examenId'] ?>)">
                            <i class="fa-solid fa-download"></i>
                          </button>
                          <button class="btn text-primary p-0" title="Compartir examen"
                            onclick="compartirExamen(<?= $examen['examenId'] ?>)">
                            <i class="fa-solid fa-share-alt"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php include "../footer.php"; ?>
  <?php include "./modalExamenes.php"; ?>
</div>

<script>
  function eliminarExamen(id) {
    Swal.fire({
      title: '¿Estás seguro?',
      text: "No podrás revertir esto.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        console.log('Examen eliminado con ID:', id);
        Swal.fire(
          '¡Eliminado!',
          'El examen ha sido eliminado.',
          'success'
        );
      }
    });
  }

  function editarExamen(id) {
    console.log('Editar examen con ID:', id);
    // Aquí puedes redirigir a un formulario de edición o abrir un modal
  }

  function descargarExamen(id) {
    console.log('Descargando examen con ID:', id);
    Swal.fire('¡Descargando!', 'El examen está siendo descargado.', 'info');
    // Lógica para descargar el archivo
  }

  function compartirExamen(id) {
    console.log('Compartiendo examen con ID:', id);
    Swal.fire('¡Compartido!', 'El examen ha sido compartido.', 'success');
    // Lógica para compartir el examen (enviar por correo, generar enlace, etc.)
  }
</script>