<div class="container my-5">
    <h2 style="color: #D50000;">Editar Reserva</h2>
    <form method="POST" action="agenciaControl.php?opcion=reserva-editar-procesar">
        <input type="hidden" name="id_reserva" value="<?php echo isset($id_reserva) ? $id_reserva : ''; ?>">
        
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha de Reserva</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_reserva" value="<?php echo isset($fecha_reserva) ? $fecha_reserva : ''; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Numero de personas</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="numero_personas" value="<?php echo isset($numero_personas) ? $numero_personas : ''; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha de Salida</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_salida" value="<?php echo isset($fecha_salida) ? $fecha_salida : ''; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha de Regreso</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_regreso" value="<?php echo isset($fecha_regreso) ? $fecha_regreso : ''; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Estado de reserva</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="estado_reserva" value="<?php echo isset($estado_reserva) ? $estado_reserva : ''; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Precio total</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="precio_total" value="<?php echo isset($precio_total) ? $precio_total : ''; ?>" required>
                </div>
            </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" style="background-color: #D50000; border-color: #D50000;">Guardar</button>
            </div>
        </div>
    </form>
</div>
