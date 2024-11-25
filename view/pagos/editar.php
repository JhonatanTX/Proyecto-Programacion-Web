<div class="container my-5">
    <h2 style="color: #D50000;">Editar Pago</h2>
    <form method="POST" action="agenciaControl.php?opcion=pago-editar-procesar">
        <input type="hidden" name="id_pago" value="<?php echo isset($id_pago) ? $id_pago : ''; ?>">

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Monto Pagado</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="monto_pagado" value="<?php echo isset($monto_pagado) ? $monto_pagado : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Fecha de Pago</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="fecha_pago" value="<?php echo isset($fecha_pago) ? $fecha_pago : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Método de Pago</label>
            <div class="col-sm-6">
                <select class="form-control" name="metodo_pago" required>
                    <option value="Efectivo" <?php echo isset($metodo_pago) && $metodo_pago == 'Efectivo' ? 'selected' : ''; ?>>Efectivo</option>
                    <option value="Tarjeta" <?php echo isset($metodo_pago) && $metodo_pago == 'Tarjeta' ? 'selected' : ''; ?>>Tarjeta</option>
                    <option value="Transferencia" <?php echo isset($metodo_pago) && $metodo_pago == 'Transferencia' ? 'selected' : ''; ?>>Transferencia</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Reserva</label>
            <div class="col-sm-6">
                <select class="form-control" name="id_reserva" required>
                    <?php foreach($reservas as $reserva) { ?>
                        <option value="<?php echo $reserva['id_reserva']; ?>" <?php echo isset($id_reserva) && $id_reserva == $reserva['id_reserva'] ? 'selected' : ''; ?>><?php echo $reserva['id_reserva']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" style="background-color: #D50000; border-color: #D50000;">Guardar</button>
            </div>
        </div>
    </form>
</div>
