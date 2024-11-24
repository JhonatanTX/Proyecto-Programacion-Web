<div class="container my-5">
    <h2 style="color: #D50000;">Editar Viaje</h2>
    <form method="POST" action="TiendaControl.php?opcion=viaje-editar-procesar">
        <input type="hidden" name="idViaje" value="<?php echo isset($idViaje) ? $idViaje : ''; ?>">
        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Destino</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="destino" value="<?php echo isset($destino) ? $destino : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Fecha</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="fecha" value="<?php echo isset($fecha) ? $fecha : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Precio</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="precio" value="<?php echo isset($precio) ? $precio : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" style="background-color: #D50000; border-color: #D50000;">Guardar</button>
            </div>
        </div>
    </form>
</div>