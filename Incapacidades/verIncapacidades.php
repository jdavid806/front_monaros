<?php
include "../menu.php";
include "../header.php";

$incapacidades = [
  ['incapacidadId' => 1, 'fecha' => '2024-11-20', 'doctor' => 'Manuel Antonio Rosales', 'motivo' => 'Enfermedad común', 'detalles' => 'Reposo por 3 días'],
  ['incapacidadId' => 2, 'fecha' => '2024-11-21', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Fractura de brazo', 'detalles' => 'Inmovilización por 2 semanas'],
  ['incapacidadId' => 3, 'fecha' => '2024-11-22', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Cirugía', 'detalles' => 'Reposo postoperatorio por 5 días'],
  ['incapacidadId' => 4, 'fecha' => '2024-11-29', 'doctor' => 'Carlos Ruiz', 'motivo' => 'Resfriado', 'detalles' => 'Reposo por 7 días'],
  ['incapacidadId' => 5, 'fecha' => '2024-12-10', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Consulta general', 'detalles' => 'Reposo por 2 días'],
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
        <li class="breadcrumb-item active" onclick="location.reload()">Incapacidades</li>
      </ol>
    </nav>

    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2 class="mb-0">Incapacidades</h2>
            <small>Miguel Angel Castro Franco</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div id="incapacidades"
        data-list='{"valueNames":["fecha","doctor","motivo","detalles"],"page":5,"pagination":{"innerWindow":2,"left":1,"right":1}}'>
        <div class="search-box mb-3 mx-auto">
          <form class="position-relative">
            <input class="form-control search-input form-control-sm" type="search" placeholder="Buscar incapacidad"
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
              <?php foreach ($incapacidades as $incapacidad) { ?>
                <tr>
                  <td class="fecha align-middle"><?= $incapacidad['fecha'] ?></td>
                  <td class="doctor align-middle"><?= $incapacidad['doctor'] ?></td>
                  <td class="motivo align-middle"><?= $incapacidad['motivo'] ?></td>
                  <td class="detalles align-middle"><?= $incapacidad['detalles'] ?></td>
                  <td class="text-end align-middle">
                    <div class="d-flex justify-content-end gap-2">
                      <button class="btn text-primary p-0" title="Editar incapacidad"
                        onclick="editarIncapacidad(<?= $incapacidad['incapacidadId'] ?>)">
                        <i class="fa-solid fa-pen"></i>
                      </button>
                      <button class="btn text-primary p-0" title="Eliminar incapacidad"
                        onclick="eliminarIncapacidad(<?= $incapacidad['incapacidadId'] ?>)">
                        <i class="fa-solid fa-trash"></i>
                      </button>

                      <!-- Botones adicionales -->
                      <a href="#<?= $incapacidad['incapacidadId']; ?>" title="Imprimir incapacidad" class="btn text-primary p-0">
                        <i class="fa-solid fa-print"></i>
                      </a>

                      <a href="#<?= $incapacidad['incapacidadId']; ?>" title="Descargar incapacidad" class="btn text-primary p-0">
                        <i class="fa-solid fa-download"></i>
                      </a>

                      <a class="btn text-primary p-0" href="#" role="button" title="Compartir" data-bs-toggle="dropdown"
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
  function editarIncapacidad(id) {
    console.log('Editar incapacidad con ID:', id);
    // Aquí puedes agregar la lógica para editar la incapacidad
  }

  function eliminarIncapacidad(id) {
    console.log('Eliminar incapacidad con ID:', id);
    // Aquí puedes agregar la lógica para eliminar la incapacidad
  }
</script>
