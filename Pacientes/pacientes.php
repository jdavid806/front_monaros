<?php
include "../menu.php";
include "../header.php";
$arrayPacientes = [
  [
    "Documento" => "1111111",
    "nombre" => "Jeferson Dávila",
    "edad" => "30",
    "fechaConsulta" => "01 - febrero - 2025",
    "status" => "En espera",
    "admision" => "true",
  ],
  [
    "Documento" => "2222222",
    "nombre" => "Miguel Castro ",
    "edad" => "21",
    "fechaConsulta" => "05 - febrero - 2025",
    "status" => "Atendido",
    "admision" => "true",
  ],
  [
    "Documento" => "3333333",
    "nombre" => "Juanito Pérez",
    "edad" => "25",
    "fechaConsulta" => "03 - febrero - 2025",
    "status" => "En consulta",
    "admision" => "true",
  ],
  [
    "Documento" => "3333333",
    "nombre" => "Juanito Pérez",
    "edad" => "25",
    "fechaConsulta" => "03 - febrero - 2025",
    "status" => "En consulta",
    "admision" => "true",
  ],
  [
    "Documento" => "3333333",
    "nombre" => "Juanito Pérez",
    "edad" => "25",
    "fechaConsulta" => "03 - febrero - 2025",
    "status" => "En consulta",
    "admision" => "true",
  ],
  [
    "Documento" => "3333333",
    "nombre" => "Juanito Pérez",
    "edad" => "25",
    "fechaConsulta" => "03 - febrero - 2025",
    "status" => "En consulta",
    "admision" => "true",
  ],
  [
    "Documento" => "3333333",
    "nombre" => "Juanito Pérez",
    "edad" => "25",
    "fechaConsulta" => "03 - febrero - 2025",
    "status" => "En consulta",
    "admision" => "true",
  ],
  [
    "Documento" => "3333333",
    "nombre" => "Juanito Pérez",
    "edad" => "25",
    "fechaConsulta" => "03 - febrero - 2025",
    "status" => "En consulta",
    "admision" => "true",
  ],
  [
    "Documento" => "3333333",
    "nombre" => "Juanito Pérez",
    "edad" => "25",
    "fechaConsulta" => "03 - febrero - 2025",
    "status" => "En consulta",
    "admision" => "true",
  ],
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
    <div class="container-small">
      <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="Dashboard">Inicio</a></li>
          <li class="breadcrumb-item active" onclick="location.reload()">Pacientes</li>
        </ol>
      </nav>
      <div class="pb-9">
        <div class="row">
          <div class="col-12">
            <div class="row align-items-center justify-content-between">
              <div class="col-md-6">
                <h2 class="mb-0 pb-5">Pacientes</h2>
              </div>
              <div class="col-md-6 text-md-end text-start mt-2 mt-md-0">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                  data-bs-target="#modalCrearPaciente"> <span class="fa-solid fa-plus me-2 fs-9"></span> Nuevo
                  Paciente</button>
              </div>
               <div class="row g-0 g-md-4 g-xl-6 p-5">
          <div class="col-12 col-md-12 mt-0">
            <label for="searchPaciente" class="form-label">Buscar Paciente</label>
            <input type="text" id="searchPaciente" class="form-control" placeholder="Buscar por nombre o documento">
          </div>

          <div class="col-12 col-md-4 mb-3">
            <label for="fechaInicio" class="form-label">Fecha de Consulta (Desde)</label>
            <input class="form-control datetimepicker" id="fechaInicio" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true,"dateFormat":"d/m/Y"}' />
          </div>
          <div class="col-12 col-md-4 mb-3">
            <label for="fechaFin" class="form-label">Fecha de Consulta (Hasta)</label>
            <input class="form-control datetimepicker" id="fechaFin" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true,"dateFormat":"d/m/Y"}' />
          </div>
          <div class="col-12 col-md-4 mb-3">
            <label for="statusPaciente" class="form-label">Filtrar por Estado</label>
            <select id="statusPaciente" class="form-select">
              <option value="">Seleccione Estado</option>
              <option value="Atendido">Atendido</option>
              <option value="En espera">En espera</option>
              <option value="Pendiente">Pendiente</option>
            </select>
          </div>
        </div>


        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" id="pacientesList">
            <!-- Aquí se generarán las tarjetas de paciente dinámicamente -->
          </div>
        </div>
        <div class="d-flex justify-content-center mt-4" id="paginationControls">
          <!-- Los botones de paginación se generarán aquí -->
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

<script>
  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".status-paciente").forEach((statusPaciente) => {
      const statusText = statusPaciente.innerText.trim();
      if (statusText === "EN ESPERA") {
        statusPaciente.classList.remove("badge-phoenix-success");
        statusPaciente.classList.add("badge-phoenix-danger");
      } else if (statusText === "EN CONSULTA") {
        statusPaciente.classList.remove("badge-phoenix-success");
        statusPaciente.classList.add("badge-phoenix-warning");
      }
    });
  });

</script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const pacientesData = <?= json_encode($arrayPacientes) ?>; // Los datos de pacientes
    const itemsPerPage = 6;  // Número de pacientes por página

    // Función para filtrar y mostrar los pacientes
    const filterPacientes = () => {
      const searchText = document.getElementById("searchPaciente").value.toLowerCase();
      const fechaInicio = document.getElementById("fechaInicio").value;
      const fechaFin = document.getElementById("fechaFin").value;
      const status = document.getElementById("statusPaciente").value;

      const filteredPacientes = pacientesData.filter(paciente => {
        let isMatch = true;

        // Filtro de búsqueda por nombre o documento
        if (searchText && !paciente.nombre.toLowerCase().includes(searchText) && !paciente.Documento.includes(searchText)) {
          isMatch = false;
        }

        // Filtro de fechas
        if (fechaInicio && new Date(paciente.fechaNacimiento) < new Date(fechaInicio)) {
          isMatch = false;
        }
        if (fechaFin && new Date(paciente.fechaNacimiento) > new Date(fechaFin)) {
          isMatch = false;
        }

        // Filtro por status
        if (status && paciente.status !== status) {
          isMatch = false;
        }

        return isMatch;
      });

      renderPacientes(filteredPacientes);
      renderPagination(filteredPacientes);
    };

    // Función para renderizar las tarjetas de pacientes
    const renderPacientes = (pacientes) => {
      const pacientesList = document.getElementById("pacientesList");
      pacientesList.innerHTML = ""; // Limpiar los resultados anteriores

      // Obtener la página actual desde el parámetro en la URL o predeterminado
      const currentPage = getCurrentPage();
      const startIndex = (currentPage - 1) * itemsPerPage;
      const paginatedPacientes = pacientes.slice(startIndex, startIndex + itemsPerPage);

      paginatedPacientes.forEach(paciente => {
        const cardHtml = `
          <div class="col">
            <div class="card h-100 hover-actions-trigger">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="avatar-group">
                    <a class="d-inline-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                      <div class="avatar avatar-m rounded-circle">
                        <img class="rounded-circle" src="<?= $ConfigNominaUser['logoBase64'] ?>" alt="" />
                      </div>
                    </a>
                  </div>
                  <div class="d-flex flex-column align-items-start mb-2">
                    <div class="d-flex align-items-center">
                      <span class="fa-solid fa-id-card me-2 text-body-tertiary fs-9 fw-extra-bold"></span>
                      <p class="fw-bold mb-0 text-truncate lh-1">Documento:</p>
                    </div>
                    <div>
                      <p class="text-body-emphasis ms-1 mb-0">${paciente.Documento}</p>
                    </div>
                  </div>
                  <div class="hover-actions top-0 end-0 mt-4 me-4">
                    <button class="btn btn-primary btn-icon flex-shrink-0" data-bs-toggle="modal" onclick="window.location.href='verPaciente?${paciente.Documento}'">
                      <span class="fa-solid fa-chevron-right"></span>
                    </button>
                  </div>
                </div>
                <span class="badge badge-phoenix fs-10 mb-4 badge-phoenix-${paciente.status === 'Atendido' ? 'danger' : (paciente.status === 'En espera' ? 'warning' : 'success')}">${paciente.status}</span>
                <div class="d-flex flex-column align-items-start mb-2">
                  <div class="d-flex align-items-center">
                    <span class="fa-solid fa-user me-2 text-body-tertiary fs-9 fw-extra-bold"></span>
                    <p class="fw-bold mb-0 text-truncate lh-1">Nombre:</p>
                  </div>
                  <div>
                    <p class="text-body-emphasis ms-1 mb-0">${paciente.nombre}</p>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-start mb-2">
                  <div class="d-flex align-items-center">
                    <span class="fa-solid fa-cake-candles me-2 text-body-tertiary fs-9 fw-extra-bold"></span>
                    <p class="fw-bold mb-0 text-truncate lh-1">Edad:</p>
                  </div>
                  <div>
                    <p class="text-body-emphasis ms-1 mb-0">${paciente.edad} Años</p>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-2">
                  <p class="mb-0 fw-bold fs-9">Fecha de Consulta: <br>
                    <span class="fw-semibold text-body-tertiary text-opacity-85 ms-1 mb-4">${paciente.fechaConsulta}</span>
                  </p>
                </div>
                <div class="mt-lg-3 mt-xl-0 mt-5">
                  <button class="btn btn-primary mt-3"data-bs-toggle="modal"
                  data-bs-target="#modalAdmision">
                    <i class="fa-solid fa-plus me-1"></i> Admisiónar
                  </button>
                </div>
              </div>
            </div>
          </div>`;

        pacientesList.innerHTML += cardHtml;
      });
    };

    // Función para renderizar los controles de paginación
    const renderPagination = (pacientes) => {
      const totalPages = Math.ceil(pacientes.length / itemsPerPage);
      const paginationControls = document.getElementById("paginationControls");
      paginationControls.innerHTML = "";  // Limpiar los controles anteriores

      if (totalPages > 1) {
        const currentPage = getCurrentPage();

        let paginationHtml = `
          <ul class="pagination">
            <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
              <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">&laquo;</a>
            </li>`;

        for (let page = 1; page <= totalPages; page++) {
          paginationHtml += `
            <li class="page-item ${page === currentPage ? 'active' : ''}">
              <a class="page-link" href="#" onclick="changePage(${page})">${page}</a>
            </li>`;
        }

        paginationHtml += `
            <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
              <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">&raquo;</a>
            </li>
          </ul>`;

        paginationControls.innerHTML = paginationHtml;
      }
    };

    // Función para obtener la página actual desde la URL
    const getCurrentPage = () => {
      const urlParams = new URLSearchParams(window.location.search);
      return parseInt(urlParams.get("page") || "1");
    };

    // Función para cambiar de página
    const changePage = (page) => {
      const urlParams = new URLSearchParams(window.location.search);
      urlParams.set("page", page);
      window.location.search = urlParams.toString();
    };
  
    document.getElementById("searchPaciente").addEventListener("input", filterPacientes);
    document.getElementById("fechaInicio").addEventListener("input", filterPacientes);
    document.getElementById("fechaFin").addEventListener("input", filterPacientes);
    document.getElementById("statusPaciente").addEventListener("change", filterPacientes);

    // Inicializa el filtro con todos los pacientes al cargar
    filterPacientes();
  });
</script>

<?php 
include "./modalAdmision.php";
include "../footer.php";
include "./modalPacientes.php";
?>