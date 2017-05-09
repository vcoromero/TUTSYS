<!-- MODAL -->
<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Registro de nuevo usuario</h4>
            </div>
            <form action="controladores/registroUsuNuevo.php" method="POST" role="form">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Ingrese usuario">

                        <label for="">Clave</label>
                        <input type="text" class="form-control"  name="clave" placeholder="Ingrese Clave">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
        </div>
    </div>
</div>

