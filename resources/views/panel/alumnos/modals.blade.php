<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="nombre" class="form-label">Nombre:</label>
                <p id="nombre" class="form-control"></p>
                <label for="apellido" class="form-label">Apellido:</label>
                <p id="apellido" class="form-control"></p>
                <label for="dni" class="form-label">Dni:</label>
                <p id="dni" class="form-control"></p>
                <label for="domicilio" class="form-label">Domicilio:</label>
                <p id="domicilio" class="form-control"></p>
                <label for="telefono" class="form-label">Telefono:</label>
                <p id="telefono" class="form-control"></p>
                <label for="email" class="form-label">Email:</label>
                <p id="email" class="form-control"></p>
                @can('')
                    <label for="fecha_ingreso" class="form-label">Fecha de ingreso:</label>
                    <p id="fecha_ingreso" class="form-control"></p>
                    <label for="fecha_egreso" class="form-label">Fecha de egreso:</label>
                    <p id="fecha_egreso" class="form-control"></p>
                @endcan
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">
                    Cancelar
                </button>
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
