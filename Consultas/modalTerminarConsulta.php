<div class="modal fade modal-lg" id="finishModal" tabindex="-1" aria-labelledby="finishModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="finishModalLabel">Finalizar consulta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <p class="fs-9 text-danger">Antes de finalizar la consulta por favor complete la siguiente información:</p>

        <!-- Sección: Motivo & Observaciones de la consulta -->
        <h6 class="mb-3">observaciones y diagnosticos sugeridos</h6>
        <form class="needs-validation" novalidate>
          <div class="form-floating mb-3">
            <textarea required class="form-control" id="motivo" rows="3"></textarea>
            <label for="motivo">Observaciones</label>
            <div class="invalid-feedback">Por favor llene el motivo de consulta.</div>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" id="observaciones" rows="3"></textarea>
            <label for="observaciones">Diagnotiscos sugeridos</label>
          </div>

          <!-- Sección: RIPS -->
          <h6 class="mt-4 mb-3">RIPS</h6>
          <div class="mb-2">
            <label class="form-check-label" for="gneraRipsCheck">Generar Rips</label>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" id="gneraRipsCheck"
                onchange="setupToggleSwitch('gneraRipsCheck', ['generarRips']);" type="checkbox" />
            </div>

            <div id="generarRips" class="d-none">

              <div class="form-floating mb-3">
                <select class="form-select" id="tipoRip" required>
                  <option value="" selected disabled>Seleccione</option>
                  <option value="consulta">Consulta</option>
                  <option value="procedimiento">Procedimiento</option>
                </select>
                <label for="tipoRip">Tipo de RIPS *</label>
                <div class="invalid-feedback">Por favor seleccione el tipo de RIPS.</div>
              </div>

              <div class="form-floating mb-3">
                <select class="form-select" id="tipoConsulta">
                  <option value="" selected disabled>Seleccione</option>
                  <option value="control">Control</option>
                  <option value="urgencia">Urgencia</option>
                  <option value="primera_vez">Primera vez</option>
                  <option value="seguimiento">Seguimiento</option>
                </select>
                <label for="tipoConsulta">Tipo de consulta</label>
              </div>

              <!-- Diagnóstico principal -->
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" id="diagnosticoPrincipal" required>
                      <option value="" selected disabled>Seleccione</option>
                      <option value="A00">A00 - Cólera</option>
                      <option value="B01">B01 - Varicela</option>
                      <option value="C34">C34 - Neoplasia maligna del pulmón</option>
                      <option value="E11">E11 - Diabetes mellitus tipo 2</option>
                    </select>
                    <label for="diagnosticoPrincipal">Diagnóstico principal *</label>
                    <div class="invalid-feedback">Por favor seleccione un diagnóstico principal.</div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-select" id="tipoDiagnostico">
                      <option value="" selected disabled>Seleccione</option>
                      <option value="definitivo">Definitivo</option>
                      <option value="presuntivo">Presuntivo</option>
                      <option value="diferencial">Diferencial</option>
                    </select>
                    <label for="tipoDiagnostico">Tipo de diagnóstico</label>
                  </div>
                </div>
              </div>

              <!-- Diagnósticos relacionados -->
              <div class="row g-3 mb-3">
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="diagnosticoRel1">
                      <option value="" selected disabled>Seleccione</option>
                      <option value="J18">J18 - Neumonía</option>
                      <option value="M79">M79 - Dolor muscular</option>
                      <option value="K35">K35 - Apendicitis aguda</option>
                      <option value="N39">N39 - Infección del tracto urinario</option>
                    </select>
                    <label for="diagnosticoRel1">Diagnóstico relacionado 1</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="diagnosticoRel2">
                      <option value="" selected disabled>Seleccione</option>
                      <option value="J18">J18 - Neumonía</option>
                      <option value="M79">M79 - Dolor muscular</option>
                      <option value="K35">K35 - Apendicitis aguda</option>
                      <option value="N39">N39 - Infección del tracto urinario</option>
                    </select>
                    <label for="diagnosticoRel2">Diagnóstico relacionado 2</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="diagnosticoRel3">
                      <option value="" selected disabled>Seleccione</option>
                      <option value="J18">J18 - Neumonía</option>
                      <option value="M79">M79 - Dolor muscular</option>
                      <option value="K35">K35 - Apendicitis aguda</option>
                      <option value="N39">N39 - Infección del tracto urinario</option>
                    </select>
                    <label for="diagnosticoRel3">Diagnóstico relacionado 3</label>
                  </div>
                </div>
              </div>

              <!-- Finalidad de consulta -->
              <div class="form-floating mb-3">
                <select class="form-select" id="finalidadConsulta">
                  <option value="" selected disabled>Seleccione</option>
                  <option value="promocion">Promoción</option>
                  <option value="prevencion">Prevención</option>
                  <option value="tratamiento">Tratamiento</option>
                  <option value="rehabilitacion">Rehabilitación</option>
                </select>
                <label for="finalidadConsulta">Finalidad de consulta</label>
              </div>

              <!-- Causa externa -->
              <div class="form-floating mb-3">
                <select class="form-select" id="causaExterna">
                  <option value="" selected disabled>Seleccione</option>
                  <option value="otra">Otra</option>
                  <option value="no_aplica">No aplica</option>
                </select>
                <label for="causaExterna">Causa externa</label>
              </div>

              <!-- Número de autorización -->
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="numeroAutorizacion" placeholder="Número de autorización">
                <label for="numeroAutorizacion">Número de autorización</label>
              </div>
        </form>
      </div>
    </div>

    <div class="modal-footer d-flex justify-content-between">
      <span class="timer text-danger">Tiempo en consulta: <input type="text text-primary" id="modalTimer"
          class="form-control-plaintext" readonly value="00:00:00"></span>
      <div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
        <button type="button" class="btn btn-primary">Finalizar</button>
      </div>
    </div>
  </div>
</div>
</div>