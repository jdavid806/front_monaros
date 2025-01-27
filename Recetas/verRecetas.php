<?php
include "../menu.php";
include "../header.php";

$recetas = [
  ['recetaId' => 1, 'fecha' => '2024-11-20', 'doctor' => 'Manuel Antonio Rosales', 'motivo' => 'Antibióticos', 'detalles' => 'Amoxicilina 500mg'],
  ['recetaId' => 2, 'fecha' => '2024-11-21', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Control Cardiologico', 'detalles' => 'Atenolol 50mg'],
  ['recetaId' => 3, 'fecha' => '2024-11-22', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Evaluación de tratamiento', 'detalles' => 'Ibuprofeno 400mg'],
  ['recetaId' => 4, 'fecha' => '2024-11-29', 'doctor' => 'Carlos Ruiz', 'motivo' => 'Revisión Post-Operatoria', 'detalles' => 'Paracetamol 500mg'],
  ['recetaId' => 5, 'fecha' => '2024-12-10', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Consulta General', 'detalles' => 'Omeprazol 20mg'],
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
        <li class="breadcrumb-item active" onclick="location.reload()">Recetas</li>
      </ol>
    </nav>

    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2 class="mb-0">Recetas</h2>
            <small>Miguel Angel Castro Franco</small>
          </div>
          <a href="crearReceta?1" class="btn btn-primary" type="button"><i class="fa-solid fa-plus me-2"></i> Nueva
            Receta</a>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div id="recetas"
        data-list='{"valueNames":["fecha","doctor","motivo","detalles"],"page":5,"pagination":{"innerWindow":2,"left":1,"right":1}}'>
        <div class="search-box mb-3 mx-auto">
          <form class="position-relative">
            <input class="form-control search-input form-control-sm" type="search" placeholder="Buscar receta"
              aria-label="Buscar" />
            <span class="fas fa-search search-box-icon"></span>
          </form>
        </div>

        <div class="table-responsive">
          <table class="table table-sm">
            <thead>
              <tr>
                <th class="sort" data-sort="fecha">Fecha</th>
                <th class="sort" data-sort="doctor">Doctor(a)</th>
                <th class="sort" data-sort="motivo">Motivo</th>
                <th class="sort" data-sort="detalles">Detalles</th>
                <th class="text-end">Acciones</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php foreach ($recetas as $receta) { ?>
                <tr>
                  <td class="fecha align-middle"><?= $receta['fecha'] ?></td>
                  <td class="doctor align-middle"><?= $receta['doctor'] ?></td>
                  <td class="motivo align-middle"><?= $receta['motivo'] ?></td>
                  <td class="detalles align-middle"><?= $receta['detalles'] ?></td>
                  <td class="text-end align-middle">
                    <div class="d-flex justify-content-end gap-2">
                      <button class="btn text-primary p-0" title="Descargar receta"
                        onclick="descargarReceta(<?= $receta['recetaId'] ?>)">
                        <i class="fa-solid fa-download"></i>
                      </button>
                      <button class="btn text-primary p-0" title="Imprimir receta"
                        onclick="imprimirReceta(<?= $receta['recetaId'] ?>)">
                        <i class="fa-solid fa-print"></i>
                      </button>
                      <button class="btn text-primary p-0" title="Compartir receta"
                        onclick="compartirReceta(<?= $receta['recetaId'] ?>)">
                        <i class="fa-solid fa-share-alt"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
          <button class="page-link disabled" data-list-pagination="prev" disabled>
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <ul class="pagination mb-0">
            <li class="active"><button class="page" type="button" data-i="1">1</button></li>
            <li><button class="page" type="button" data-i="2">2</button></li>
            <li><button class="page" type="button">...</button></li>
            <li><button class="page" type="button" data-i="5">5</button></li>
          </ul>
          <button class="page-link" data-list-pagination="next">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <?php include "../footer.php"; ?>
</div>

<script>
  function descargarReceta(id) {
    console.log('Descargar receta con ID:', id);
    // Aquí puedes agregar la lógica para descargar la receta
  }

  function imprimirReceta(id) {
    console.log('Imprimir receta con ID:', id);
    // Aquí puedes agregar la lógica para imprimir la receta
  }

  function compartirReceta(id) {
    console.log('Compartir receta con ID:', id);
    // Aquí puedes agregar la lógica para compartir la receta
  }
</script>