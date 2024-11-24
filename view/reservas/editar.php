<div class="container my-5">
    <h2 style="color: #D50000;">Editar Reserva</h2>
    <form method="POST" action="TiendaControl.php?opcion=reserva-editar-procesar">
        <input type="hidden" name="idReserva" value="<?php echo isset($idReserva) ? $idReserva : ''; ?>">
        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Cliente</label>
            <div class="col-sm-6">
                <select class="form-control" name="id_cliente" required>
                    <?php foreach($clientes as $cliente) { ?>
                        <option value="<?php echo $cliente['id_cliente']; ?>" <?php echo isset($id_cliente) && $id_cliente == $cliente['id_cliente'] ? 'selected' : ''; ?>><?php echo $cliente['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Hotel</label>
            <div class="col-sm-6">
                <select class="form-control" name="id_hotel" required>
                    <?php foreach($hoteles as $hotel) { ?>
                        <option value="<?php echo $hotel['id_hotel']; ?>" <?php echo isset($id_hotel) && $id_hotel == $hotel['id_hotel'] ? 'selected' : ''; ?>><?php echo $hotel['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Fecha de Ingreso</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="fecha_ingreso" value="<?php echo isset($fecha_ingreso) ? $fecha_ingreso : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #D50000;">Fecha de Salida</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="fecha_salida" value="<?php echo isset($fecha_salida) ? $fecha_salida : ''; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" style="background-color: #D50000; border-color: #D50000;">Guardar</button>
            </div>
        </div>
    </form>
</div>
