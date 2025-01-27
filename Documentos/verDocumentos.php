<?php
include "../menu.php";
include "../header.php";

$consentimientos = [
  ['consentimientoId' => 1, 'fecha' => '2024-11-20', 'doctor' => 'Manuel Antonio Rosales', 'motivo' => 'Intervención quirúrgica', 'detalles' => 'Consentimiento para operación de apendicitis'],
  ['consentimientoId' => 2, 'fecha' => '2024-11-21', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Estudio clínico', 'detalles' => 'Consentimiento para biopsia'],
  ['consentimientoId' => 3, 'fecha' => '2024-11-22', 'doctor' => 'Carlos Ruiz', 'motivo' => 'Tratamiento dental', 'detalles' => 'Consentimiento para endodoncia'],
  ['consentimientoId' => 4, 'fecha' => '2024-11-29', 'doctor' => 'Ana Maria García', 'motivo' => 'Revisión dermatológica', 'detalles' => 'Consentimiento para tratamiento de manchas en la piel'],
  ['consentimientoId' => 5, 'fecha' => '2024-12-10', 'doctor' => 'Pedro Sánchez', 'motivo' => 'Estudio de resonancia', 'detalles' => 'Consentimiento para resonancia magnética'],
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
        <li class="breadcrumb-item active" onclick="location.reload()">Consentimientos Informados</li>
      </ol>
    </nav>

    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2 class="mb-0">Consentimientos Informados</h2>
            <small>Miguel Angel Castro Franco</small>
          </div>
          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalCrearDocumento">
            <span class="fa-solid fa-plus me-2 fs-9"></span> Nuevo Documento</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div id="consentimientos"
      data-list='{"valueNames":["fecha","doctor","motivo","detalles"],"page":5,"pagination":{"innerWindow":2,"left":1,"right":1}}'>
      <div class="search-box mb-3 mx-auto">
        <form class="position-relative">
          <input class="form-control search-input form-control-sm" type="search" placeholder="Buscar consentimiento"
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
            <?php foreach ($consentimientos as $consentimiento) { ?>
              <tr>
                <td class="fecha align-middle"><?= $consentimiento['fecha'] ?></td>
                <td class="doctor align-middle"><?= $consentimiento['doctor'] ?></td>
                <td class="motivo align-middle"><?= $consentimiento['motivo'] ?></td>
                <td class="detalles align-middle"><?= $consentimiento['detalles'] ?></td>
                <td class="text-end align-middle">
                  <div class="d-flex justify-content-end gap-2">
                    <button class="btn text-primary p-0" title="Editar consentimiento"
                      onclick="editarConsentimiento(<?= $consentimiento['consentimientoId'] ?>)">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="btn text-primary p-0" title="Eliminar consentimiento"
                      onclick="eliminarConsentimiento(<?= $consentimiento['consentimientoId'] ?>)">
                      <i class="fa-solid fa-trash"></i>
                    </button>

                    <!-- Botones adicionales -->
                    <a href="#<?= $consentimiento['consentimientoId']; ?>" title="Imprimir consentimiento"
                      class="btn text-primary p-0">
                      <i class="fa-solid fa-print"></i>
                    </a>

                    <a href="#<?= $consentimiento['consentimientoId']; ?>" title="Descargar consentimiento"
                      class="btn text-primary p-0">
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

<?php include "../footer.php";
include "./modalDocumento.php";
?>
</div>

<script>
  function editarConsentimiento(id) {
    console.log('Editar consentimiento con ID:', id);
    // Aquí puedes agregar la lógica para editar el consentimiento
  }

  function eliminarConsentimiento(id) {
    console.log('Eliminar consentimiento con ID:', id);
    // Aquí puedes agregar la lógica para eliminar el consentimiento
  }
</script>