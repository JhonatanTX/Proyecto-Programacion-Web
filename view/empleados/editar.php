<div class="container my-5">
    <h2>Editar Empleado</h2>
    <form method="POST" action="agenciaControl.php?opcion=empleado-editar-procesar">
        <input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Puesto</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="puesto" value="<?php echo $puesto; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">DNI</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="dni" value="<?php echo $dni; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Contraseña</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="contraseña" value="<?php echo $contraseña; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
