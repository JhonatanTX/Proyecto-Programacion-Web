<div class="container my-5">
    <h2 style="color: #D50000;">Editar Transporte</h2>
    <form method="POST" action="agenciaControl.php?opcion=transporte-editar-procesar">
        <input type="hidden" name="id_transporte" value="<?php echo isset($id_transporte) ? $id_transporte : ''; ?>">
        
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Tipo de Transporte</label>
                <div class="col-sm-6">
                    <select class="form-control" name="tipo_transporte" required>
                        <option value="<?php echo isset($tipo_transporte) ? $tipo_transporte : ''; ?>"><?php echo isset($tipo_transporte) ? $tipo_transporte : ''; ?></option>
                        <?php if(!empty($resultViajes)) { ?>
                            <?php foreach ($resultViajes as $key => $value){ ?>
                                <option value="<?php echo $value['transporte']; ?>"><?php echo $value['transporte']; ?></option>
                            <?php } ?>
                        <?php } else { ?>
                            <option value="">No hay proveedores disponibles</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Numero de Servicio</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="numero_servicio" value="<?php echo isset($numero_servicio) ? $numero_servicio : ''; ?>"required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Precio</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="precio" value="<?php echo isset($precio) ? $precio : ''; ?>"required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha Salida</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_salida" value="<?php echo isset($fecha_salida) ? $fecha_salida : ''; ?>"required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Destino</label>
                <div class="col-sm-6">
                    <select class="form-control" name="destino" required>
                        <option value="<?php echo isset($destino) ? $destino : ''; ?>"><?php echo isset($destino) ? $destino : ''; ?></option>
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
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" style="background-color: #D50000; border-color: #D50000;">Guardar</button>
            </div>
        </div>
    </form>
</div>
