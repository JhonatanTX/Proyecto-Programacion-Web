<div class="container my-5">
    <h2 style="color: #D50000;">Editar Viaje</h2>
    <form method="POST" action="agenciaControl.php?opcion=viaje-editar-procesar">
        <input type="hidden" name="id_viaje" value="<?php echo isset($id_viaje) ? $id_viaje : ''; ?>">
        
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Nombre paquete</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre_paquete" value="<?php echo isset($nombre_paquete) ? $nombre_paquete : ''; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Descripcion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descripcion" value="<?php echo isset($descripcion) ? $descripcion : ''; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Destino</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="destinos" value="<?php echo isset($destinos) ? $destinos : ''; ?>" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Precio</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="precio" value="<?php echo isset($precio) ? $precio : ''; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha Disponible</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fechas_disponibles" value="<?php echo isset($fechas_disponibles) ? $fechas_disponibles : ''; ?>"required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Duracion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="duracion" value="<?php echo isset($duracion) ? $duracion : ''; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Transporte</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="transporte" value="<?php echo isset($transporte) ? $transporte : ''; ?>"required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" style="background-color: #d32f2f; border-color: #d32f2f;"><i class="fas fa-sync-alt"></i> Actualizar</button>
                </div>
            </div>
    </form>
</div>