<?php
include "../menu.php";
include "../header.php";

// Definir los antecedentes divididos por categoría
$antecedentesPersonales = [
  ['antecedenteId' => 1, 'fecha' => '2024-11-20', 'doctor' => 'Manuel Antonio Rosales', 'motivo' => 'Historia de hipertensión', 'detalles' => 'Paciente diagnosticado con hipertensión hace 5 años'],
  ['antecedenteId' => 2, 'fecha' => '2024-11-21', 'doctor' => 'Diana Maria Fernandez', 'motivo' => 'Alergia a penicilina', 'detalles' => 'Reacción alérgica grave a penicilina en 2018'],
];
$antecedentesGinecoobstetricos = [
  ['antecedenteId' => 3, 'fecha' => '2024-11-22', 'doctor' => 'Carlos Ruiz', 'motivo' => 'Cirugía previa', 'detalles' => 'Cirugía de apendicitis en 2017'],
];
$antecedentesFamiliares = [
  ['antecedenteId' => 4, 'fecha' => '2024-11-29', 'doctor' => 'Ana Maria García', 'motivo' => 'Asma', 'detalles' => 'Controlada con inhaladores'],
  ['antecedenteId' => 5, 'fecha' => '2024-12-10', 'doctor' => 'Pedro Sánchez', 'motivo' => 'Fractura de tobillo', 'detalles' => 'Fractura sufrida en accidente hace 2 años'],
];
?>

<div class="content">
  <div class="container-small">
    <nav class="mb-3" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="Dashboard">Inicio</a></li>
        <li class="breadcrumb-item"><a href="pacientes">Pacientes</a></li>
        <li class="breadcrumb-item"><a href="verPaciente?1">Miguel Angel Castro Franco</a></li>
        <li class="breadcrumb-item active" onclick="location.reload()">Antecedentes Personales</li>
      </ol>
    </nav>

    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2 class="mb-0">Antecedentes Personales</h2>
            <small>Miguel Angel Castro Franco</small>
          </div>
          <a href="#" class="btn btn-primary" type="button"><i class="fa-solid fa-plus me-2"></i> Nuevo
            Antecedente</a>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <!-- Pestañas -->
      <ul class="nav nav-underline fs-9" id="antecedentesTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="personales-tab" data-bs-toggle="tab" href="#personales"
            role="tab">Personales</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="ginecoobstetricos-tab" data-bs-toggle="tab" href="#ginecoobstetricos"
            role="tab">Ginecoobstétricos</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="familiares-tab" data-bs-toggle="tab" href="#familiares" role="tab">Familiares</a>
        </li>
      </ul>

      <div class="tab-content" id="antecedentesTabsContent">
        <!-- Tab de antecedentes personales -->
        <div class="tab-pane fade show active" id="personales" role="tabpanel">
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
                <?php foreach ($antecedentesPersonales as $antecedente) { ?>
                  <tr>
                    <td class="fecha align-middle"><?= $antecedente['fecha'] ?></td>
                    <td class="doctor align-middle"><?= $antecedente['doctor'] ?></td>
                    <td class="motivo align-middle"><?= $antecedente['motivo'] ?></td>
                    <td class="detalles align-middle"><?= $antecedente['detalles'] ?></td>
                    <td class="text-end align-middle">
                      <div class="d-flex justify-content-end gap-2">
                        <button class="btn text-primary p-0" title="Editar antecedente"
                          onclick="editarAntecedente(<?= $receta['recetaId'] ?>)">
                          <i class="fa-solid fa-pencil"></i>
                        </button>
                        <button class="btn text-primary p-0" title="Eliminar antecedente"
                          onclick="eliminarAntecedente(<?= $receta['recetaId'] ?>)">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Tab de antecedentes ginecoobstétricos -->
        <div class="tab-pane fade" id="ginecoobstetricos" role="tabpanel">
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
                <?php foreach ($antecedentesGinecoobstetricos as $antecedente) { ?>
                  <tr>
                    <td class="fecha align-middle"><?= $antecedente['fecha'] ?></td>
                    <td class="doctor align-middle"><?= $antecedente['doctor'] ?></td>
                    <td class="motivo align-middle"><?= $antecedente['motivo'] ?></td>
                    <td class="detalles align-middle"><?= $antecedente['detalles'] ?></td>
                    <td class="text-end align-middle">
                      <div class="d-flex justify-content-end gap-2">
                        <button class="btn text-primary p-0" title="Editar antecedente"
                          onclick="editarAntecedente(<?= $receta['recetaId'] ?>)">
                          <i class="fa-solid fa-pencil"></i>
                        </button>
                        <button class="btn text-primary p-0" title="Eliminar antecedente"
                          onclick="eliminarAntecedente(<?= $receta['recetaId'] ?>)">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Tab de antecedentes familiares -->
        <div class="tab-pane fade" id="familiares" role="tabpanel">
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
                <?php foreach ($antecedentesFamiliares as $antecedente) { ?>
                  <tr>
                    <td class="fecha align-middle"><?= $antecedente['fecha'] ?></td>
                    <td class="doctor align-middle"><?= $antecedente['doctor'] ?></td>
                    <td class="motivo align-middle"><?= $antecedente['motivo'] ?></td>
                    <td class="detalles align-middle"><?= $antecedente['detalles'] ?></td>
                    <td class="text-end align-middle">
                      <div class="d-flex justify-content-end gap-2">
                        <button class="btn text-primary p-0" title="Editar antecedente"
                          onclick="editarAntecedente(<?= $receta['recetaId'] ?>)">
                          <i class="fa-solid fa-pencil"></i>
                        </button>
                        <button class="btn text-primary p-0" title="Eliminar antecedente"
                          onclick="eliminarAntecedente(<?= $receta['recetaId'] ?>)">
                          <i class="fa-solid fa-trash"></i>
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

  <?php include "../footer.php"; ?>
</div>

<script>
  function editarAntecedente(id) {
    console.log('Editar antecedente con ID:', id);
    // Aquí puedes agregar la lógica para editar el antecedente
  }

  function eliminarAntecedente(id) {
    console.log('Eliminar antecedente con ID:', id);
    // Aquí puedes agregar la lógica para eliminar el antecedente
  }
</script>