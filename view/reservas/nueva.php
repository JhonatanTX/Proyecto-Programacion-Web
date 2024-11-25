<div class="container-fluid text-center" style="background-color: #ffffff; padding-top: 20px; padding-bottom: 20px;">
    <div class="container my-5" style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #d32f2f;">Nueva Reserva</h2>
        <form method="POST" action="agenciaControl.php?opcion=reserva-nueva-procesar">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Cliente</label>
                <div class="col-sm-6">
                    <select class="form-control" name="id_cliente" required>
                        <?php foreach($clientes as $cliente) { ?>
                            <option value="<?php echo $cliente['id_cliente']; ?>"><?php echo $cliente['nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Hotel</label>
                <div class="col-sm-6">
                    <select class="form-control" name="id_hotel" required>
                        <?php foreach($hoteles as $hotel) { ?>
                            <option value="<?php echo $hotel['id_hotel']; ?>"><?php echo $hotel['nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha de Ingreso</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_ingreso" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha de Salida</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_salida" required>
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
