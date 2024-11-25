<div class="container my-5">
    <h2 style="color: #D50000;">Editar Transporte</h2>
    <form method="POST" action="agenciaControl.php?opcion=transporte-editar-procesar">
        <input type="hidden" name="idTransporte" value="<?php echo isset($idTransporte) ? $idTransporte : ''; ?>">
        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Tipo</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tipo" value="<?php echo isset($tipo) ? $tipo : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Marca</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="marca" value="<?php echo isset($marca) ? $marca : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Capacidad</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="capacidad" value="<?php echo isset($capacidad) ? $capacidad : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" style="background-color: #D50000; border-color: #D50000;">Guardar</button>
            </div>
        </div>
    </form>
</div>
