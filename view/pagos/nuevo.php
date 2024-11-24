<div class="container-fluid text-center" style="background-color: #ffffff; padding-top: 20px; padding-bottom: 20px;">
    <div class="container my-5" style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #d32f2f;">Nuevo Pago</h2>
        <form method="POST" action="TiendaControl.php?opcion=pago-nuevo-procesar">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Monto Pagado</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="monto_pagado" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha de Pago</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_pago" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Método de Pago</label>
                <div class="col-sm-6">
                    <select class="form-control" name="metodo_pago" required>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta">Tarjeta</option>
                        <option value="Transferencia">Transferencia</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Reserva</label>
                <div class="col-sm-6">
                    <select class="form-control" name="id_reserva" required>
                        <?php foreach($reservas as $reserva) { ?>
                            <option value="<?php echo $reserva['id_reserva']; ?>"><?php echo $reserva['id_reserva']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" style="background-color: #d32f2f; border-color: #d32f2f;">Submit</button>
                </div>
            </div>
        </form>
    </div>    
</div>
