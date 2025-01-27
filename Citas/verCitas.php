<?php
include "../menu.php";
include "../header.php";

$citas = [
  ['citaId' => 1, 'fecha' => '2024-11-20', 'doctor' => 'Manuel Antonio Rosales', 'motivo' => 'Control General'],
  ['citaId' => 2, 'fecha' => '2024-11-21', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Control Cardiologico'],
  ['citaId' => 3, 'fecha' => '2024-11-22', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Evaluación de tratamiento'],
  ['citaId' => 4, 'fecha' => '2024-11-29', 'doctor' => 'Carlos Ruiz', 'motivo' => 'Revisión Post-Operatoria'],
  ['citaId' => 5, 'fecha' => '2024-12-10', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Consulta General'],
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
        <li class="breadcrumb-item active" onclick="location.reload()">Citas</li>
      </ol>
    </nav>

    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2 class="mb-0">Citas</h2>
            <small>Miguel Angel Castro Franco</small>
          </div>
          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalCrearCita"><i
              class="fa-solid fa-plus me-2"></i> Nueva Cita</button>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div id="citas"
        data-list='{"valueNames":["fecha","doctor","motivo"],"page":5,"pagination":{"innerWindow":2,"left":1,"right":1}}'>
        <div class="search-box mb-3 mx-auto">
          <form class="position-relative">
            <input class="form-control search-input form-control-sm" type="search" placeholder="Buscar cita"
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
                <th class="text-end">Acciones</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php foreach ($citas as $cita) { ?>
                <tr>
                  <td class="fecha align-middle"><?= $cita['fecha'] ?></td>
                  <td class="doctor align-middle"><?= $cita['doctor'] ?></td>
                  <td class="motivo align-middle"><?= $cita['motivo'] ?></td>
                  <td class="text-end align-middle">
                    <div class="d-flex justify-content-end gap-2">
                      <button class="btn text-primary p-0" title="Editar cita"
                        onclick="editarCita(<?= $cita['citaId'] ?>)">
                        <i class="fa-solid fa-edit"></i>
                      </button>
                      <button class="btn text-primary p-0" title="Eliminar cita"
                        onclick="eliminarCita(<?= $cita['citaId'] ?>)">
                        <i class="fa-solid fa-trash"></i>
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
  <?php include "./modalCitas.php"; ?>
</div>

<script>
  function eliminarCita(id) {
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
        console.log('Cita eliminada con ID:', id);
        Swal.fire(
          '¡Eliminado!',
          'La cita ha sido eliminada.',
          'success'
        );
      }
    });
  }

  function editarCita(id) {
    console.log('Editar cita con ID:', id);
    // Aquí puedes redirigir a un formulario de edición o abrir un modal
  }
</script>