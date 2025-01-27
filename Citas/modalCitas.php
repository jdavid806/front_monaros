<div class="modal fade" id="modalCrearCita" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva Cita</h5>
        <button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- Indicadores de progreso -->
        <div class="steps-container mb-4">
          <ul class="steps">
            <li class="step active" data-step="1">
              <span class="step-number">1</span>
              <span class="step-label">Cita</span>
            </li>
            <li class="step" data-step="2">
              <span class="step-number">2</span>
              <span class="step-label">Paciente</span>
            </li>
            <li class="step" data-step="3">
              <span class="step-number">3</span>
              <span class="step-label">Doctor (a)</span>
            </li>
          </ul>
        </div>

        <!-- Contenido de los pasos -->
        <form id="formNuevaCita" class="needs-validation" novalidate>
          <div class="wizard-content">
            <!-- Paso 1: Cita -->
            <div class="wizard-step active" data-step="1">
              <div class="mb-2">
                <label class="col-form-label pt-0">Tipo de cita</label>
                <select class="form-select" name="tipoCita" id="tipoCita" required>
                  <option value="" disabled selected>Seleccione un tipo de cita</option>
                  <option value="presencial">Presencial</option>
                  <option value="domiciliaria">Domiciliaria</option>
                  <option value="virtual">Virtual</option>
                </select>
                <div class="invalid-feedback">Por favor seleccione un tipo de consulta.</div>
              </div>
              <div class="mb-2">
                <label class="form-label" for="motivoConsulta">Motivo de Consulta</label>
                <select class="form-select" id="motivoConsulta" required name="motivoConsulta">
                  <option selected disabled value="">Seleccione</option>
                  <option>Consulta general</option>
                  <option>Consulta Odontología</option>
                  <option>Consulta Estética</option>
                </select>
                <div class="invalid-feedback">Por favor seleccione un motivo de consulta.</div>
              </div>
              <div class="mb-2">
                <label class="form-label" for="fechaCita">Fecha</label>
                <input class="form-control" id="fechaCita" name="fechaCita" type="date" required />
                <div class="invalid-feedback">Por favor selecciona una fecha válida.</div>
              </div>
              <div class="mb-2">
                <label class="form-label" for="consulta-hora">Hora de la consulta</label>
                <input class="form-control" type="time" name="horaConsulta" id="consulta-hora" required>
                <div class="invalid-feedback">Por favor selecciona la hora de la consulta.</div>
              </div>
            </div>

            <!-- Paso 2: Paciente -->
            <div class="wizard-step" data-step="2">
              <div class="mb-2">
                <label for="selectPaciente" class="form-label">Seleccione un paciente</label>
                <select class="form-select" id="selectPaciente" name="selectPaciente" required>
                  <option selected disabled value="">Seleccione</option>
                  <option value="0">No Registrado</option>
                  <option value="1">Paciente 1</option>
                  <option value="2">Paciente 2</option>
                  <option value="3">Paciente 3</option>
                </select>
                <div class="invalid-feedback">Por favor seleccione un paciente.</div>
              </div>
              <div class="mb-2">
                <label for="telefonoPaciente" class="form-label">Whatsapp</label>
                <input type="tel" class="form-control" id="telefonoPaciente" name="telefonoPaciente">
              </div>
              <div class="mb-2">
                <label for="correoPaciente" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correoPaciente" name="correoPaciente">
              </div>
            </div>

            <!-- Paso 3: Doctor -->
            <div class="wizard-step" data-step="3">
              <div class="mb-2">
                <label class="form-label" for="doctor">Doctor(a)</label>

                <select class="form-select" id="doctor" required="required" name="doctor">
                  <option selected="" disabled="" value="">Seleccione</option>
                  <option>Doctor juan</option>
                  <option>Doctor Carlos</option>
                  <option>Doctor juan Carlos</option>
                </select>
                <div class="invalid-feedback">Por favor seleccione a quien sera asignada.</div>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" id="prevStep" type="button" disabled>Anterior</button>
        <button class="btn btn-primary" id="nextStep" type="button">Siguiente</button>
        <button class="btn btn-secondary d-none" id="finishStep" type="submit" form="wizardForm">Finalizar</button>
      </div>
    </div>
  </div>
</div>

<style>
  .steps-container {
    background-color: #f8f9fa;
    padding: 1rem;
    border-radius: 0.5rem;
  }

  .steps {
    list-style: none;
    display: flex;
    justify-content: space-between;
    padding: 0;
    margin: 0;
  }

  .step {
    text-align: center;
    position: relative;
    flex: 1;
  }

  .step-number {
    display: inline-block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    background-color: #e9ecef;
    color: #0d6efd;
    font-weight: bold;
    margin-bottom: 0.5rem;
  }

  .step.active .step-number {
    background-color: #0d6efd;
    color: #fff;
  }

  .wizard-step {
    display: none;
  }

  .wizard-step.active {
    display: block;
  }
</style>

<script>
  let currentStep = 1;

  const updateWizard = () => {
    // Actualizar los pasos visuales
    document.querySelectorAll('.step').forEach(step => {
      step.classList.toggle('active', step.dataset.step == currentStep);
    });

    // Mostrar el contenido correspondiente
    document.querySelectorAll('.wizard-step').forEach(step => {
      step.classList.toggle('active', step.dataset.step == currentStep);
    });

    // Controlar los botones
    document.getElementById('prevStep').disabled = currentStep === 1;
    document.getElementById('nextStep').classList.toggle('d-none', currentStep === 3);
    document.getElementById('finishStep').classList.toggle('d-none', currentStep !== 3);
  };

  document.getElementById('nextStep').addEventListener('click', () => {
    const currentForm = document.querySelector(`.wizard-step[data-step="${currentStep}"]`);
    if (currentForm.querySelector(':invalid')) {
      currentForm.querySelector(':invalid').focus();
      currentForm.classList.add('was-validated');
    } else {
      currentStep++;
      updateWizard();
    }
  });

  document.getElementById('prevStep').addEventListener('click', () => {
    currentStep--;
    updateWizard();
  });

  document.getElementById('modalCrearCita').addEventListener('submit', function (event) {
    if (!this.checkValidity()) {
      event.preventDefault();
      this.classList.add('was-validated');
    }
  });

  updateWizard();
</script>