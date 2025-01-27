<?php
include "../menu.php";
include "../header.php";

// Datos de ejemplo
$consultas = [
  ['id' => 1, 'fecha' => '2024-11-20', 'descripcion' => 'Consulta sobre productos', 'estado' => 'Pendientes'],
  ['id' => 2, 'fecha' => '2024-11-25', 'descripcion' => 'Consulta sobre envíos', 'estado' => 'En espera'],
  ['id' => 3, 'fecha' => '2024-11-26', 'descripcion' => 'Consulta médica', 'estado' => 'En consulta'],
  ['id' => 4, 'fecha' => '2024-11-27', 'descripcion' => 'Seguimiento', 'estado' => 'Consulta finalizada'],
];

// Agrupar consultas por estado
$estados = ['Pendientes', 'En espera', 'En consulta', 'Consulta finalizada'];
$consultasPorEstado = [];
foreach ($estados as $estado) {
  $consultasPorEstado[$estado] = array_filter($consultas, fn($consulta) => $consulta['estado'] === $estado);
}
?>

<style type="text/css">
  .board {
    display: flex;
    gap: 20px;
    overflow-x: auto;
  }

  .column-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .column-title {
    font-size: 18px;
    margin-bottom: 10px;
    text-align: center;
  }

  .column {
    width: 250px;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
    min-height: 20em;
  }

  .task {
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    cursor: grab;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    text-align: center;
  }

  .task strong {
    display: block;
  }

  .task p {
    margin: 5px 0;
  }

  .view-patient-btn {
    margin-top: 10px;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: white;
    cursor: pointer;
    text-align: center;
    display: block;
  }

  .view-patient-btn:hover {
    background-color: #0056b3;
  }

  /* Estilos por estado */
  .column[data-status="Pendientes"] .task {
    background-color: #d3d3d3;
  }

  .column[data-status="En espera"] .task {
    background-color: #add8e6;
  }

  .column[data-status="En consulta"] .task {
    background-color: #90ee90;
  }

  .column[data-status="Consulta finalizada"] .task {
    background-color: #32cd32;
  }

  /* Tema oscuro */
  html[data-bs-theme="dark"] .task {
    color: #000;
  }
</style>

<div class="componente">
  <div class="content">
    <div class="container-small">
      <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="Dashboard">Inicio</a></li>
          <li class="breadcrumb-item active" onclick="location.reload()">Consultas para hoy</li>
        </ol>
      </nav>
      <div class="pb-9">

        <div class="board" id="board">
          <?php foreach ($consultasPorEstado as $estado => $consultas): ?>
            <div class="column-wrapper">
              <div class="column-title">
                <h3><?= $estado ?></h3>
              </div>
              <div class="column" data-status="<?= $estado ?>">
                <?php foreach ($consultas as $consulta): ?>
                  <div class="task" data-id="<?= $consulta['id'] ?>">
                    <strong><?= $consulta['fecha'] ?></strong>
                    <p><?= $consulta['descripcion'] ?></p>
                    <?php if ($estado === 'En consulta'): ?>
                      <a href="verPaciente?1" class="btn btn-primary flex-shrink-0" target="_blank">Ver paciente <span
                          class="fa-solid fa-chevron-right"></span></a>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Inicializar columnas como áreas de arrastre
    const columns = document.querySelectorAll(".column");
    columns.forEach(column => {
      new Sortable(column, {
        group: "shared", // Permite mover tareas entre columnas
        animation: 150,
        onAdd: function (evt) {
          const task = evt.item;
          const newColumn = evt.to;
          const status = newColumn.getAttribute("data-status");
          const taskId = task.getAttribute("data-id");

          Swal.fire({
            title: '¿Estás seguro?',
            text: `¿Quieres mover la tarea a '${status}'?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, mover',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {

              console.log(`Tarea con ID '${taskId}' movida a '${status}'`);
              // Llamada AJAX para guardar el cambio en el servidor (preparado para implementación futura)
            } else {

              evt.from.appendChild(task);
            }
          });
        }
      });
    });
  });

</script>

<?php include "../footer.php"; ?>