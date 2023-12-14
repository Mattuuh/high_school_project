<div class="modal fade" id="asistenciaModal" tabindex="-1" aria-labelledby="asistenciaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Registrar asistencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formAsistencia" method="POST" action="#">

            <div class="modal-body">
                @csrf

                <label for="nombre" class="form-label">Nombre:</label>
                <p id="nombre" class="form-control"></p>
                <label for="apellido" class="form-label">Apellido:</label>
                <p id="apellido" class="form-control"></p>
                <label for="dni" class="form-label">Dni:</label>
                <p id="dni" class="form-control"></p>

                <input type="radio" id="presente" name="id_estado" value="1">
                <label for="presente">Presente</label>
                <input type="radio" id="ausente" name="id_estado" value="2">
                <label for="ausente">Ausente</label>
                <input type="radio" id="tarde" name="id_estado" value="4">
                <label for="tarde">Tarde</label>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-uppercase">
                    Guardar
                </button>
                <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="asistenciaEditModal" tabindex="-1" aria-labelledby="asistenciaEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Editar asistencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formAsistencia" method="POST" action="#">

            <div class="modal-body">
                @csrf
                @method('PUT')

                <label for="nombre" class="form-label">Nombre:</label>
                <p id="nombre" class="form-control"></p>
                <label for="apellido" class="form-label">Apellido:</label>
                <p id="apellido" class="form-control"></p>
                <label for="dni" class="form-label">Dni:</label>
                <p id="dni" class="form-control"></p>

                <input type="radio" id="presente" name="id_estado" value="1">
                <label for="presente">Presente</label>
                <input type="radio" id="ausente" name="id_estado" value="2">
                <label for="ausente">Ausente</label>
                <input type="radio" id="tarde" name="id_estado" value="4">
                <label for="tarde">Tarde</label>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-uppercase">
                    Guardar
                </button>
                <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
      </div>
    </div>
</div>