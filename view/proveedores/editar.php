<div class="container my-5">
    <h2 style="color: #D50000;">Editar Proveedor</h2>
    <form method="POST" action="agenciaControl.php?opcion=proveedor-editar-procesar">
        <input type="hidden" name="id_proveedor" value="<?php echo isset($id_proveedor) ? $id_proveedor : ''; ?>">
        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Nombre</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nombre_empresa" value="<?php echo isset($nombre_empresa) ? $nombre_empresa : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Tipo de Servicio</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tipo_servicio" value="<?php echo isset($tipo_servicio) ? $tipo_servicio : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Dirección</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="direccion" value="<?php echo isset($direccion) ? $direccion : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Teléfono</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="telefono" value="<?php echo isset($telefono) ? $telefono : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Correo</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="correo_electronico" value="<?php echo isset($correo_electronico) ? $correo_electronico : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Tarifas</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="tarifas" value="<?php echo isset($tarifas) ? $tarifas : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" style="background-color: #D50000; border-color: #D50000;"><i class="fas fa-sync-alt"></i> Actualizar</button>
            </div>
        </div>
    </form>
</div>
