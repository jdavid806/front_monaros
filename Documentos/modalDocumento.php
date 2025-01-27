<div class="modal fade" id="modalCrearDocumento" tabindex="-1" aria-labelledby="modalCrearDocumentoLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCrearDocumentoLabel">Nueva Documento Informado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formCrearIncapacidad">
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <select class="form-select" id="nombre">
              <option value="">Seleccione un Nombre</option>
              <option value="Consentimiento Informado">Consentimiento Informado</option>
              <option value="Acta de salida">Acta de salida</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="texto" class="form-label">Documento informado</label>
            <textarea class="form-control" id="texto" name="texto" rows="3"></textarea>
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
  document.getElementById('dias').addEventListener('input', function () {
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

  document.getElementById('desde').addEventListener('change', function () {
    document.getElementById('dias').dispatchEvent(new Event('input'));
  });
</script>