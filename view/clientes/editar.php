<div class="container my-5">
    <h2 style="color: #D50000;">Editar Cliente</h2>
    <form method="POST" action="agenciaControl.php?opcion=cliente-editar-procesar">
        <input type="hidden" name="id_cliente" value="<?php echo isset($id_cliente) ? $id_cliente : ''; ?>">
        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Nombre</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Apellido</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="apellido" value="<?php echo isset($apellido) ? $apellido : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Correo Electrónico</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="correo_electronico" value="<?php echo isset($correo) ? $correo : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Telefono</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="telefono" value="<?php echo isset($telefono) ? $telefono : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Dirección</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="direccion" value="<?php echo isset($direccion) ? $direccion : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" style="background-color: #D50000; border-color: #D50000;">Guardar</button>
            </div>
        </div>
    </form>
</div>
