<?php
include "../menu.php";
include "../header.php";

$recetas = [
  ['id' => 1, 'nombre' => 'Ibuprofeno', 'presentacion' => 'Tabletas 200mg', 'dosis' => '2 veces al día', 'fecha' => '2024-11-20', 'descripcion' => 'Receta para dolor de cabeza'],
  ['id' => 2, 'nombre' => 'Paracetamol', 'presentacion' => 'Tabletas 500mg', 'dosis' => 'Cada 8 horas', 'fecha' => '2024-11-25', 'descripcion' => 'Receta para fiebre'],
  ['id' => 3, 'nombre' => 'Amoxicilina', 'presentacion' => 'Cápsulas 500mg', 'dosis' => '3 veces al día', 'fecha' => '2024-11-25', 'descripcion' => 'Receta para infección respiratoria'],
  ['id' => 4, 'nombre' => 'Metformina', 'presentacion' => 'Tabletas 850mg', 'dosis' => '1 vez al día', 'fecha' => '2024-11-25', 'descripcion' => 'Receta para diabetes tipo 2'],
  ['id' => 5, 'nombre' => 'Loratadina', 'presentacion' => 'Tabletas 10mg', 'dosis' => 'Una vez al día', 'fecha' => '2024-11-25', 'descripcion' => 'Receta para alergias'],
  ['id' => 6, 'nombre' => 'Omeprazol', 'presentacion' => 'Tabletas 20mg', 'dosis' => '1 vez al día antes de las comidas', 'fecha' => '2024-11-26', 'descripcion' => 'Receta para acidez estomacal'],
  ['id' => 7, 'nombre' => 'Fluconazol', 'presentacion' => 'Cápsulas 150mg', 'dosis' => 'Una sola dosis', 'fecha' => '2024-11-26', 'descripcion' => 'Receta para infección vaginal'],
];

$paraclinicos = [
  [
    'id' => 1,
    'tipo' => 'Hemograma',
    'fecha' => '2024-11-20',
    'comentarios' => 'Valores dentro de los rangos normales'
  ],
  [
    'id' => 2,
    'tipo' => 'Química sanguínea',
    'fecha' => '2024-11-25',
    'comentarios' => 'Valores dentro de los rangos normales'
  ],
  [
    'id' => 3,
    'tipo' => 'Examen de orina',
    'fecha' => '2024-11-25',
    'comentarios' => 'Sin hallazgos patológicos'
  ],
  [
    'id' => 4,
    'tipo' => 'Ecografía abdominal',
    'fecha' => '2024-11-26',
    'comentarios' => 'Estudio sin hallazgos patológicos'
  ],
  [
    'id' => 5,
    'tipo' => 'Radiografía de tórax',
    'fecha' => '2024-11-26',
    'comentarios' => 'Estudio sin hallazgos patológicos'
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
<div class="content">
  <div class="container-small">
    <nav class="mb-3" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="Dashboard">Inicio</a></li>
        <li class="breadcrumb-item"><a href="pacientes">Pacientes</a></li>
        <li class="breadcrumb-item"><a href="verPaciente?1">Miguel Angel Castro Franco</a></li>
        <li class="breadcrumb-item"><a href="consultas?1">Consultas</a></li>
        <li class="breadcrumb-item active" onclick="location.reload()">Nueva Consulta</li>
      </ol>
    </nav>
    <div class="row">
      <div class="col-12">
        <div class="row align-items-center justify-content-between">
          <div class="col-md-6">
            <h2 class="mb-0">Nueva Consulta</h2>
            <small>
              Miguel Angel Castro Franco
            </small>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-0 g-md-4 g-xl-6 p-3">

      <div class="col-md-7 col-lg-7 col-xl-8">

        <ul class="nav nav-underline fs-9" id="consulta" role="tablist">
          <li class="nav-item" role="presentation"><a class="nav-link" id="motivosObservaciones-tab"
              data-bs-toggle="tab" href="#motivosObservacionesTab" role="tab" aria-controls="motivosObservacionesTab"
              aria-selected="false" tabindex="-1">Motivos y Observaciones</a>
          </li>
          <li class="nav-item" role="presentation"><a class="nav-link active" id="signosVitales-tab"
              data-bs-toggle="tab" href="#signosVitalesTab" role="tab" aria-controls="signosVitalesTab"
              aria-selected="true">Signos Vitales y medidas</a></li>
          <li class="nav-item" role="presentation"><a class="nav-link" id="examenFisicoT-tab" data-bs-toggle="tab"
              href="#examenFisicoTab" role="tab" aria-controls="examenFisicoTab" aria-selected="false"
              tabindex="-1">Examen Fisico</a>
          </li>
          <li class="nav-item" role="presentation"><a class="nav-link" id="prescripciones-tab" data-bs-toggle="tab"
              href="#prescripcionesTab" role="tab" aria-controls="prescripcionesTab" aria-selected="false"
              tabindex="-1">Prescripciones</a>
          </li>
          <li class="nav-item" role="presentation"><a class="nav-link" id="paraclinicos-tab" data-bs-toggle="tab"
              href="#paraclinicosTab" role="tab" aria-controls="paraclinicosTab" aria-selected="false"
              tabindex="-1">Paraclinicos</a>
          </li>
        </ul>
        <form class="needs-validation">
          <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade" id="motivosObservacionesTab" role="tabpanel"
              aria-labelledby="motivosObservaciones-tab">
              <div class="d-flex justify-content-between gap-2">
                <div class="card" style="width:20rem;">
                  <div class="card-body">
                    <h5 class="card-title">Motivos de Consulta</h5>
                    <div class="card-text">
                      <div class="form-floating mb-3">
                        <textarea type="text" class="form-control" style="height: 100px" min="0" id="motivoConsulta"
                          name="motivoConsulta"></textarea>
                        <label for="observacionesConsulta" class="form-label">Motivo de la Consulta</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card" style="width:20rem;">
                  <div class="card-body">
                    <h5 class="card-title">Obervaciones</h5>
                    <div class="card-text">
                      <div class="form-floating mb-3">
                        <textarea type="text" class="form-control" style="height: 100px" min="0"
                          id="observacionesConsulta" name="observacionesConsulta"></textarea>
                        <label for="observacionesConsulta" class="form-label">Observaciones</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="tab-pane fade" id="signosVitalesTab" role="tabpanel" aria-labelledby="signosVitales-tab">
              <div class="d-flex justify-content-between gap-2">
                <div class="card" style="width:20rem;">
                  <div class="card-body">
                    <h5 class="card-title">Signos Vitales</h5>
                    <div class="card-text">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="temperatura" name="temperatura">
                        <label for="temperatura" class="form-label">Temperatura corporal</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="saturacion" name="saturacion">
                        <label for="saturacion" class="form-label">Saturación de oxigeno</label>
                      </div>
                      <h6>Frecuencias</h6>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="frecuenciaCardiaca"
                          name="frecuenciaCardiaca">
                        <label for="frecuenciaCardiaca" class="form-label">Frecuencia Cardiaca</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="frecuenciaRespiratoria"
                          name="frecuenciaRespiratoria">
                        <label for="frecuenciaRespiratoria" class="form-label">Frecuencia Respiratoria</label>
                      </div>
                      <h6>Presión Arterial</h6>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="PAsistolica" name="PAsistolica">
                        <label for="PAsistolica" class="form-label">Sistolica</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="PADiastolica" name="PADiastolica">
                        <label for="PADiastolica" class="form-label">Diastólica</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="TAMedia" name="TAMedia">
                        <label for="TAMedia" class="form-label">Tensión Arterial Media</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card" style="width:20rem;">
                  <div class="card-body">
                    <h5 class="card-title">Medidas antropometricas</h5>
                    <div class="card-text">
                      <h6>Corporales básicas</h6>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="pesoCorporal" name="pesoCorporal">
                        <label for="pesoCorporal" class="form-label">Peso Corporal (KG)</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="altura" name="altura">
                        <label for="altura" class="form-label">Altura (CM)</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" readonly class="form-control" min="0" id="imc" name="imc">
                        <label for="imc" class="form-label">IMC</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" readonly class="form-control" min="0" id="composicionCorporal"
                          name="composicionCorporal">
                        <label for="composicionCorporal" class="form-label">Composción Corporal</label>
                      </div>
                      <h6>Antropometricas</h6>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="circuferenciaAbdominal"
                          name="circuferenciaAbdominal">
                        <label for="circuferenciaAbdominal" class="form-label">Circuferencia Abdominal</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="perimetroCefalico"
                          name="perimetroCefalico">
                        <label for="perimetroCefalico" class="form-label">Perimetro Cefálico</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="porcertanjeGrasaCorporal"
                          name="porcertanjeGrasaCorporal">
                        <label for="porcertanjeGrasaCorporal" class="form-label">Porcentaje de Grasa Corporal</label>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="signosVitalesTab" role="tabpanel" aria-labelledby="signosVitales-tab">
              <div class="d-flex justify-content-between gap-2">
                <div class="card" style="width:20rem;">
                  <div class="card-body">
                    <h5 class="card-title">Signos Vitales</h5>
                    <div class="card-text">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="temperatura" name="temperatura">
                        <label for="temperatura" class="form-label">Temperatura corporal</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="saturacion" name="saturacion">
                        <label for="saturacion" class="form-label">Saturación de oxigeno</label>
                      </div>
                      <h6>Frecuencias</h6>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="frecuenciaCardiaca"
                          name="frecuenciaCardiaca">
                        <label for="frecuenciaCardiaca" class="form-label">Frecuencia Cardiaca</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="frecuenciaRespiratoria"
                          name="frecuenciaRespiratoria">
                        <label for="frecuenciaRespiratoria" class="form-label">Frecuencia Respiratoria</label>
                      </div>
                      <h6>Presión Arterial</h6>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="PAsistolica" name="PAsistolica">
                        <label for="PAsistolica" class="form-label">Sistolica</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="PADiastolica" name="PADiastolica">
                        <label for="PADiastolica" class="form-label">Diastólica</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="TAMedia" name="TAMedia">
                        <label for="TAMedia" class="form-label">Tensión Arterial Media</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card" style="width:20rem;">
                  <div class="card-body">
                    <h5 class="card-title">Medidas antropometricas</h5>
                    <div class="card-text">
                      <h6>Corporales básicas</h6>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="pesoCorporal" name="pesoCorporal">
                        <label for="pesoCorporal" class="form-label">Peso Corporal (KG)</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="altura" name="altura">
                        <label for="altura" class="form-label">Altura (CM)</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" readonly class="form-control" min="0" id="imc" name="imc">
                        <label for="imc" class="form-label">IMC</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" readonly class="form-control" min="0" id="composicionCorporal"
                          name="composicionCorporal">
                        <label for="composicionCorporal" class="form-label">Composción Corporal</label>
                      </div>
                      <h6>Antropometricas</h6>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="circuferenciaAbdominal"
                          name="circuferenciaAbdominal">
                        <label for="circuferenciaAbdominal" class="form-label">Circuferencia Abdominal</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="perimetroCefalico"
                          name="perimetroCefalico">
                        <label for="perimetroCefalico" class="form-label">Perimetro Cefálico</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="0" id="porcertanjeGrasaCorporal"
                          name="porcertanjeGrasaCorporal">
                        <label for="porcertanjeGrasaCorporal" class="form-label">Porcentaje de Grasa Corporal</label>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="examenFisicoTab" role="tabpanel" aria-labelledby="examenFisicoT-tab">
              <div class="d-flex justify-content-between gap-2">

                <div class="col-md-9">

                  <div class="mb-2">
                    <label class="form-check-label" for="examenFisicoCabezaCheck">Cabeza</label>
                    <div class="form-check form-switch mb-2">
                      <input class="form-check-input" id="examenFisicoCabezaCheck"
                        onchange="setupToggleSwitch('examenFisicoCabezaCheck', ['hallazgosCabeza']);" type="checkbox" />
                    </div>

                    <div id="hallazgosCabeza" class="d-none">
                      <div class="mb-2 form-floating">
                        <select class="form-select" id="examenFisicoEstadoCabeza" name="examenFisicoEstadoCabeza">
                          <option selected value="Normal">Normal</option>
                          <option value="Anormal">Anormal</option>
                        </select>
                        <label for="examenFisicoEstadoCabeza" class="form-label">Estado</label>
                      </div>
                      <div class="form-floating">
                        <textarea class="form-control" id="examenFisicoCabeza" name="examenFisicoCabeza"
                          style="height: 100px">No Aplica</textarea>
                        <label for="examenFisicoCabeza">hallazgos</label>
                      </div>
                    </div>
                  </div>

                  <div class="mb-2">
                    <label class="form-check-label" for="examenFisicoCuelloCheck">Cuello</label>
                    <div class="form-check form-switch mb-2">
                      <input class="form-check-input" id="examenFisicoCuelloCheck"
                        onchange="setupToggleSwitch('examenFisicoCuelloCheck', ['hallazgosCuello']);" type="checkbox" />
                    </div>

                    <div id="hallazgosCuello" class="d-none">
                      <div class="mb-2 form-floating">
                        <select class="form-select" id="examenFisicoEstadoCuello" name="examenFisicoEstadoCuello">
                          <option selected value="Normal">Normal</option>
                          <option value="Anormal">Anormal</option>
                        </select>
                        <label for="examenFisicoEstadoCuello" class="form-label">Estado</label>
                      </div>
                      <div class="form-floating">
                        <textarea class="form-control" id="examenFisicoCuello" name="examenFisicoCuello"
                          style="height: 100px">No Aplica</textarea>
                        <label for="examenFisicoCuello">hallazgos</label>
                      </div>
                    </div>
                  </div>

                  <div class="mb-2">
                    <label class="form-check-label" for="examenFisicoTroncoCheck">Tronco</label>
                    <div class="form-check form-switch mb-2">
                      <input class="form-check-input" id="examenFisicoTroncoCheck"
                        onchange="setupToggleSwitch('examenFisicoTroncoCheck', ['hallazgosTronco']);" type="checkbox" />
                    </div>

                    <div id="hallazgosTronco" class="d-none">
                      <div class="mb-2 form-floating">
                        <select class="form-select" id="examenFisicoEstadoTronco" name="examenFisicoEstadoTronco">
                          <option selected value="Normal">Normal</option>
                          <option value="Anormal">Anormal</option>
                        </select>
                        <label for="examenFisicoEstadoTronco" class="form-label">Estado</label>
                      </div>
                      <div class="form-floating">
                        <textarea class="form-control" id="examenFisicoTronco" name="examenFisicoTronco"
                          style="height: 100px">No Aplica</textarea>
                        <label for="examenFisicoTronco">hallazgos</label>
                      </div>
                    </div>
                  </div>

                  <div class="mb-2">
                    <label class="form-check-label" for="examenFisicoESuperioresCheck">Extremidades Superiores</label>
                    <div class="form-check form-switch mb-2">
                      <input class="form-check-input" id="examenFisicoESuperioresCheck"
                        onchange="setupToggleSwitch('examenFisicoESuperioresCheck', ['hallazgosESuperiores']);"
                        type="checkbox" />
                    </div>

                    <div id="hallazgosESuperiores" class="d-none">
                      <div class="mb-2 form-floating">
                        <select class="form-select" id="examenFisicoEstadoESuperiores"
                          name="examenFisicoEstadoESuperiores">
                          <option selected value="Normal">Normal</option>
                          <option value="Anormal">Anormal</option>
                        </select>
                        <label for="examenFisicoEstadoESuperiores" class="form-label">Estado</label>
                      </div>
                      <div class="form-floating">
                        <textarea class="form-control" id="examenFisicoESuperiores" name="examenFisicoESuperiores"
                          style="height: 100px">No Aplica</textarea>
                        <label for="examenFisicoESuperiores">hallazgos</label>
                      </div>
                    </div>
                  </div>

                  <div class="mb-2">
                    <label class="form-check-label" for="examenFisicoEInferioresCheck">Extremidades Inferiores</label>
                    <div class="form-check form-switch mb-2">
                      <input class="form-check-input" id="examenFisicoEInferioresCheck"
                        onchange="setupToggleSwitch('examenFisicoEInferioresCheck', ['hallazgosEInferiores']);"
                        type="checkbox" />
                    </div>

                    <div id="hallazgosEInferiores" class="d-none">
                      <div class="mb-2 form-floating">
                        <select class="form-select" id="examenFisicoEstadoEInferiores"
                          name="examenFisicoEstadoEInferiores">
                          <option selected value="Normal">Normal</option>
                          <option value="Anormal">Anormal</option>
                        </select>
                        <label for="examenFisicoEstadoEInferiores" class="form-label">Estado</label>
                      </div>
                      <div class="form-floating">
                        <textarea class="form-control" id="examenFisicoEInferiores" name="examenFisicoEInferiores"
                          style="height: 100px">No Aplica</textarea>
                        <label for="examenFisicoEInferiores">hallazgos</label>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-md-3">
                  <img src="<?= $BASE ?>Consultas/cuerpo_humano.png" alt="Esquema del cuerpo humano" class="img-fluid">
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="prescripcionesTab" role="tabpanel" aria-labelledby="prescripciones-tab">

              <div class="d-flex justify-content-between gap-2">
                <div class="col-md-3">
                  <ul class="nav flex-column nav-underline fs-9" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" id="examenes-tab"
                        data-bs-toggle="tab" href="#examenesClinicosTab" role="tab" aria-controls="examenesClinicosTab"
                        aria-selected="true"><span class="text-primary uil uil-file-alt"></span>Exámenes
                        clínicos</a></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="incapacidades-tab"
                        data-bs-toggle="tab" href="#incapacidadesClinicasTab" role="tab"
                        aria-controls="incapacidadesClinicasTab" aria-selected="false" tabindex="-1"><span
                          class="text-primary uil uil-wheelchair"></span>Incapacidades
                        clínicas</a></a>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="recetas-tab" data-bs-toggle="tab"
                        href="#recetasTab" role="tab" aria-controls="recetasTab" aria-selected="false"
                        tabindex="-1"><span class="text-primary uil-clipboard"></span>Recetas médicas</a></a></li>
                  </ul>
                </div>
                <div class="col-md-9 p-3">
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="examenesClinicosTab" role="tabpanel"
                      aria-labelledby="examenes-tab">
                      <h4>
                        Exámenes clínicos
                      </h4>
                      <div class="mb-2 form-floating">
                        <select class="form-select" id="examenesImageneologia" name="examenesImageneologia">
                          <option selected disabled value="">Seleccione</option>
                          <option value="Artereografia">Artereografia</option>
                          <option value="Rayox x simple">Rayox X simple</option>
                          <option value="Rayos X Contratado">Rayos X Contratado</option>
                          <option value="Otro">Otro</option>
                        </select>
                        <label for="examenesImageneologia" class="form-label">Examen de Imageneología</label>
                      </div>
                      <div class="mb-2 form-floating">
                        <select class="form-select" id="examenesLaboratorio" name="examenesLaboratorio">
                          <option selected disabled value="">Seleccione</option>
                          <option value="Hematologia">Hematologia</option>
                          <option value="Coombs Directo">Coombs Directo</option>
                          <option value="Coombs Indirecto">Coombs Indirecto</option>
                          <option value="Otro">Otro</option>
                        </select>
                        <label for="examenesLaboratorio" class="form-label">Examen de laboratorio</label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="incapacidadesClinicasTab" role="tabpanel"
                      aria-labelledby="incapacidades-tab">
                      <div class="row mb-3 align-items-end">
                        <div class="col p-2">
                          <h4>Incapacidades clínicas</h4>
                        </div>
                        <div class="col p-2 text-end"><button class="btn btn-primary" type="button"
                            data-bs-toggle="modal" data-bs-target="#modalCrearIncapacidad"> <span
                              class="fa-solid fa-plus me-2 fs-9"></span> Nueva
                            incapacidad</button></div>
                      </div>
                      <div>
                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="card h-100">
                              <div class="card-body">
                                <h5 class="card-title">Única</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Estómago</h6>
                                <p class="card-text fs-9">31/06/2024 → 31/12/2024</p>
                                <p class="card-text fs-9">Se prescribe una incapacidad por su fuerte dolor de estómago.
                                </p>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6 mb-4">
                            <div class="card h-100">
                              <div class="card-body">
                                <h5 class="card-title">Recurrente</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Artrosis severa</h6>
                                <p class="card-text fs-9">11/07/2024 → 31/10/2024</p>
                                <p class="card-text fs-9">Debido a la artrosis que tiene el paciente se le incapacita.
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="recetasTab" role="tabpanel" aria-labelledby="recetas-tab">
                      <div class="row mb-3 align-items-end">
                        <div class="col p-2">
                          <h4>Recetas médicas</h4>
                        </div>
                        <div class="col p-2 text-end"><button class="btn btn-primary" type="button"
                            data-bs-toggle="modal" data-bs-target="#modalCrearReceta"> <span
                              class="fa-solid fa-plus me-2 fs-9"></span> Nuevo Medicamento</button></div>
                      </div>

                      <div>
                        <div class="d-flex align-items-center justify-content-end my-3">
                          <div class="ms-3" id="bulk-select-actions">
                            <div class="d-flex">
                              <button class="btn btn-phoenix-danger btn-sm ms-2 d-none" type="button"
                                id="apply-action">Eliminar</button>
                            </div>
                          </div>
                        </div>

                        <div id="recetasGeneradas"
                          data-list='{"valueNames":["nombre","presentacion","dosis"],"page":5,"pagination":true}'>
                          <div class="table-responsive mx-n1 px-1">
                            <table class="table table-sm border-top border-translucent fs-9 mb-0">
                              <thead>
                                <tr>
                                  <th class="white-space-nowrap fs-9 align-middle ps-0"
                                    style="max-width:20px; width:18px;">
                                    <div class="form-check mb-0 fs-8">
                                      <input class="form-check-input" id="bulk-select-example" type="checkbox">
                                    </div>
                                  </th>
                                  <th class="sort align-middle ps-3" data-sort="nombre">Nombre</th>
                                  <th class="sort align-middle" data-sort="presentacion">Presentación</th>
                                  <th class="sort align-middle" data-sort="dosis">Dosis</th>
                                  <th class="sort text-end align-middle pe-0" scope="col">Acciones</th>
                                </tr>
                              </thead>
                              <tbody class="list" id="bulk-select-body">
                                <?php foreach ($recetas as $receta) { ?>
                                  <tr>
                                    <td class="fs-9 align-middle">
                                      <div class="form-check mb-0 fs-8">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </td>
                                    <td class="align-middle ps-3 nombre"><?= $receta['nombre'] ?></td>
                                    <td class="align-middle presentacion"><?= $receta['presentacion'] ?></td>
                                    <td class="align-middle dosis"><?= $receta['dosis'] ?></td>
                                    <td class="align-middle white-space-nowrap text-end pe-0">
                                      <div class="d-flex justify-content-around fs-9">
                                        <button class="btn text-primary p-0" title="editar receta" data-value="mostrar"
                                          type="button" data-bs-toggle="modal" data-bs-target="#editarRecetaModal">
                                          <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button class="btn text-primary p-0" title="ver detalles de receta"
                                          data-value="mostrar" type="button" data-bs-toggle="modal"
                                          data-bs-target="#modalDetalleReceta">
                                          <i class="fa fa-eye"></i>
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
              </div>
            </div>
            <div class="tab-pane fade" id="paraclinicosTab" role="tabpanel" aria-labelledby="paraclinicos-tab">

              <div class="row mb-3 align-items-end">
                <div class="col p-2">
                  <h4>Paraclínicos</h4>
                </div>
                <div class="col p-2 text-end">
                  <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#modalAgregarParaclinico">
                    <span class="fa-solid fa-plus me-2 fs-9"></span> Agregar Paraclínico
                  </button>
                </div>
              </div>

              <div>
                <div class="d-flex align-items-center justify-content-end my-3">
                </div>
                <div id="paraclinicosGenerados"
                  data-list='{"valueNames":["fechaHora","tipo"],"page":5,"pagination":true}'>
                  <div class="table-responsive mx-n1 px-1">
                    <table class="table table-sm border-top border-translucent fs-9 mb-0">
                      <thead>
                        <tr>
                          <th class="sort align-middle" data-sort="fechaHora">Fecha y Hora</th>
                          <th class="sort align-middle" data-sort="tipo">Tipo</th>
                          <th class="sort align-middle" data-sort="comentarios">Comentarios</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php foreach ($paraclinicos as $paraclinico) { ?>
                          <tr>
                            <td class="align-middle"><?= $paraclinico['fecha'] ?></td>
                            <td class="align-middle"><?= $paraclinico['tipo'] ?></td>
                            <td class="align-middle"><?= $paraclinico['comentarios'] ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </form>
        <form class="dropzone dropzone-multiple p-0" id="dropzone-multiple" data-dropzone="data-dropzone" action="#!">
          <div class="fallback">
            <input name="file" type="file" multiple="multiple" />
          </div>
          <div class="dz-message" data-dz-message="data-dz-message"><img class="me-2"
              src="../../../assets/img/icons/cloud-upload.svg" width="25" alt="" />Subir Archivos</div>
          <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
            <div class="d-flex mb-3 pb-3 border-bottom border-translucent media">
              <div class="border p-2 rounded-2 me-2"><img class="rounded-2 dz-image"
                  src="../../../assets/img/icons/file.png" alt="..." data-dz-thumbnail="data-dz-thumbnail" /></div>
              <div class="flex-1 d-flex flex-between-center">
                <div>
                  <h6 data-dz-name="data-dz-name"></h6>
                  <div class="d-flex align-items-center">
                    <p class="mb-0 fs-9 text-body-quaternary lh-1" data-dz-size="data-dz-size"></p>
                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                  </div><span class="fs-10 text-danger" data-dz-errormessage="data-dz-errormessage"></span>
                </div>
                <div class="dropdown">
                  <button class="btn btn-link text-body-tertiary btn-sm dropdown-toggle btn-reveal dropdown-caret-none"
                    type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                      class="fas fa-ellipsis-h"></span></button>
                  <div class="dropdown-menu dropdown-menu-end border border-translucent py-2"><a class="dropdown-item"
                      href="#!" data-dz-remove="data-dz-remove">Remove File</a></div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

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
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-lg-12 col-xl-12">
        <div>
          <div class="container">
            <div class="row align-items-center">
              <div class="col-6">
                <div class="timer">
                  Tiempo en consulta: <span id="timer">00:00:00</span>
                </div>
              </div>
              <div class="col-3">
                <a href="consultas?1" class="btn btn-danger" id="cancelBtn">Cancelar consulta</a>
              </div>
              <div class="col-3">
                <button class="btn btn-primary" id="finishBtn" type="button" data-bs-toggle="modal"
                  data-bs-target="#finishModal">Terminar consulta</button>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const timerElement = document.getElementById('timer');
      const finishBtn = document.getElementById('finishBtn');
      const modalTimer = document.getElementById('modalTimer');

      let startTime = new Date();

      function updateTimer() {
        const now = new Date();
        const elapsedTime = now - startTime;
        const hours = Math.floor(elapsedTime / 3600000);
        const minutes = Math.floor((elapsedTime % 3600000) / 60000);
        const seconds = Math.floor((elapsedTime % 60000) / 1000);
        timerElement.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
      }

      setInterval(updateTimer, 1000);

      finishBtn.addEventListener('click', () => {
        if (modalTimer) {
          modalTimer.value = timerElement.textContent; // Asignar valor al modal
        } else {
          console.log('Error al buscar el temporizador del modal.');
        }
      });
    });

  </script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const deleteButton = document.getElementById('apply-action'); // Botón "Eliminar"
      const checkboxes = document.querySelectorAll('#bulk-select-body .form-check-input'); // Todos los checkboxes de las filas
      const bulkSelect = document.getElementById('bulk-select-example'); // Checkbox general para seleccionar todos

      // Habilitar/deshabilitar botón "Eliminar" según selección
      const toggleDeleteButton = () => {
        const selectedCheckboxes = document.querySelectorAll('#bulk-select-body .form-check-input:checked');
        deleteButton.classList.toggle('d-none', selectedCheckboxes.length === 0);
      };

      // Seleccionar/deseleccionar todos los checkboxes
      bulkSelect.addEventListener('change', () => {
        const isChecked = bulkSelect.checked;
        checkboxes.forEach(checkbox => checkbox.checked = isChecked);
        toggleDeleteButton();
      });

      // Verificar cambios en cada checkbox
      checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', toggleDeleteButton);
      });

      // Eliminar filas seleccionadas
      deleteButton.addEventListener('click', () => {
        const selectedCheckboxes = document.querySelectorAll('#bulk-select-body .form-check-input:checked');
        const idsToDelete = [];

        selectedCheckboxes.forEach(checkbox => {
          idsToDelete.push(checkbox.dataset.id); // Obtener el ID del medicamento
          const row = checkbox.closest('tr'); // Fila correspondiente
          row.remove(); // Eliminar fila de la tabla
        });

        console.log('IDs eliminados:', idsToDelete); // Mostrar IDs en la consola

        // Reiniciar el checkbox general y botón
        bulkSelect.checked = false;
        toggleDeleteButton();
      });
    });
  </script>


  <?php include "../footer.php";
  include "../Incapacidades/modalIncapacidad.php";
  include "../Recetas/modalReceta.php";
  include "../Paraclinicos/modalParaclinico.php";
  include "./modalTerminarConsulta.php";
  ?>