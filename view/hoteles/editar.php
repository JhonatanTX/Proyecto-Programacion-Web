<div class="container my-5">
    <h2 style="color: #D50000;">Editar Hotel</h2>
    <form method="POST" action="TiendaControl.php?opcion=hotel-editar-procesar">
        <input type="hidden" name="idHotel" value="<?php echo isset($idHotel) ? $idHotel : ''; ?>">
        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Nombre</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Dirección</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="direccion" value="<?php echo isset($direccion) ? $direccion : ''; ?>" required>
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
