<div class="modal fade" id="notasModal" tabindex="-1" aria-labelledby="notasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="notasModalLabel">Registrar notas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formNotas" method="POST" action="#">

            <div class="modal-body">
                @csrf

                <label for="nombre" class="form-label">Nombre:</label>
                <p id="nombre" class="form-control"></p>
                <label for="apellido" class="form-label">Apellido:</label>
                <p id="apellido" class="form-control"></p>
                <label for="dni" class="form-label">Dni:</label>
                <p id="dni" class="form-control"></p>

                <div class="row">
                    <div class="col-6">
                        <label for="notas-lengua" class="form-label">Lengua:</label>
                        <select name="notas-lengua" id="notas-lengua" class="form-control">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>        
                    </div>
                    <div class="col-6">
                        <label for="instancia" class="form-label">Instancia:</label>
                        <select name="instancia" id="instancia" class="form-control">
                            <option value="0" selected>0</option>
                            <option value="1">Primer cuatrimestre</option>
                            <option value="2">Segundo cuatrimestre</option>
                            <option value="3">3</option>
                        </select> 
                    </div>
                </div>
                
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
