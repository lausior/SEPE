<div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="" required>
</div>
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="" required>
</div>
<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-select" id="estado" name="estado" required>
        <option value="" disabled>Seleccione el estado</option>
        <option value="en_proceso">En Proceso</option>
        <option value="pendiente">Pendiente</option>
        <option value="completada">Completada</option>
    </select>
</div>
<div class="mb-3">
    <label for="id_usuario" class="form-label">Usuario</label>
    <select class="form-select" id="id_usuario" name="id_usuario" required>
        <option value="" disabled>Seleccione el usuario</option>
        <?php
        
        
        ?>
    </select>
</div>