<div class="modal fade" id="modalCrearIncapacidad" tabindex="-1" aria-labelledby="modalCrearIncapacidadLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCrearIncapacidadLabel">Nueva incapacidad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formCrearIncapacidad">
        <div class="modal-body">
          <div class="mb-3">
            <label for="areaTratamiento" class="form-label">Área de Tratamiento</label>
            <input type="text" class="form-control" id="areaTratamiento" name="areaTratamiento">
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-6">
                <label for="desde" class="form-label">Desde</label>
                <input type="date" class="form-control" id="desde" name="desde">
              </div>
              <div class="col-6">
                <label for="dias" class="form-label">Días de Incapacidad</label>
                <input type="number" class="form-control" id="dias" name="dias" min="1">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="hasta" class="form-label">Hasta</label>
            <input type="date" class="form-control" id="hasta" name="hasta" readonly>
          </div>
          <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios</label>
            <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById('dias').addEventListener('input', function() {
    const fechaDesde = document.getElementById('desde').value;
    const dias = parseInt(this.value);

    if (fechaDesde && dias > 0) {
      const fechaInicial = new Date(fechaDesde);
      fechaInicial.setDate(fechaInicial.getDate() + dias - 1); // Restar 1 para incluir el día inicial
      const fechaFinal = fechaInicial.toISOString().split('T')[0];
      document.getElementById('hasta').value = fechaFinal;
    } else {
      document.getElementById('hasta').value = '';
    }
  });

  document.getElementById('desde').addEventListener('change', function() {
    document.getElementById('dias').dispatchEvent(new Event('input'));
  });
</script>
