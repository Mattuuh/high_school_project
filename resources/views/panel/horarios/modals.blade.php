<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Ficha de Horarios #</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              
                <label for="hora" class="form-label">Hora:</label>
                <p id="hora" class="form-control"></p>
                <label for="hora_inicio" class="form-label">Desde:</label>
                <p id="hora_inicio" class="form-control"></p>
                <label for="hora_fin" class="form-label">Hasta:</label>
                <p id="hora_fin" class="form-control"></p>
                <label for="docente" class="form-label">Docente:</label>
                <p id="docente" class="form-control"></p>
                <label for="materia" class="form-label">Materia:</label>
                <p id="materia" class="form-control"></p>
                <label for="grado" class="form-label">Grado:</label>
                <p id="grado" class="form-control"></p>
                <label for="division" class="form-label">Division:</label>
                <p id="division" class="form-control"></p>
                
                

                
                
                
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
