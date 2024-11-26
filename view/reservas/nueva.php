<div class="container-fluid text-center" style="background-color: #ffffff; padding-top: 20px; padding-bottom: 20px;">
    <div class="container my-5" style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #d32f2f;">Nueva Reserva</h2>
        <form method="POST" action="agenciaControl.php?opcion=reserva-nueva-procesar">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Nombre Cliente</label>
                <div class="col-sm-6">
                    <select class="form-control" name="nombre" required>
                        <option value="...">...</option>
                        <?php if(!empty($resultClientes)) { ?>
                            <?php foreach ($resultClientes as $key => $value){ ?>
                                <option value="<?php echo $value['nombre']; ?>"><?php echo $value['nombre']; ?></option>
                            <?php } ?>
                        <?php } else { ?>
                            <option value="">No hay proveedores disponibles</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Destino</label>
                <div class="col-sm-6">
                <select class="form-control" name="destinos" required>
                        <option value="...">...</option>
                        <?php if(!empty($resultViajes)) { ?>
                            <?php foreach ($resultViajes as $key => $value){ ?>
                                <option value="<?php echo $value['destinos']; ?>"><?php echo $value['destinos']; ?></option>
                            <?php } ?>
                        <?php } else { ?>
                            <option value="">No hay proveedores disponibles</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha de Reserva</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_reserva" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Numero de personas</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="numero_personas" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha de Salida</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_salida" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha de Regreso</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_regreso" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Estado de reserva</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="estado_reserva" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Precio total</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="precio_total" required>
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
