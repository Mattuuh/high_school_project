<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Ficha de Empleado con Legajo #</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="fecha" class="form-label">Fecha:</label>
                <p id="fecha" class="form-control"></p>
                <label for="caja" class="form-label">Caja:</label>
                <p id="caja" class="form-control"></p>
                <label for="legajo_alu" class="form-label">Alumno:</label>
                <p id="legajo_alu" class="form-control"></p>
                <label for="mes" class="form-label">Mes:</label>
                <p id="mes" class="form-control"></p>
                <label for="forma_pago" class="form-label">Forma de pago:</label>
                <p id="forma_pago" class="form-control"></p>
                <label for="total" class="form-label">Total:</label>
                <p id="total" class="form-control"></p>
                
            </div>
            <div class="modal-footer">
                <a href="{{ route('factura-pdf', $factura->id) }}" class="btn btn-danger" title="PDF" target="_blank">
                    <i class="fas fa-file-pdf"> Imprimir</i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formDelete" method="POST" action="#">
            <div class="modal-body">
                @csrf 
                @method('DELETE')
                
                <p id="message"></p>

                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger text-uppercase">
                    Eliminar
                </button>
                <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
      </div>
    </div>
</div>
