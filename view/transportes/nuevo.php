<div class="container-fluid text-center" style="background-color: #ffffff; padding-top: 20px; padding-bottom: 20px;">
    <div class="container my-5" style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #d32f2f;">Nuevo Transporte</h2>
        <form method="POST" action="agenciaControl.php?opcion=transporte-nuevo-procesar">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Tipo de Transporte</label>
                <div class="col-sm-6">
                    <select class="form-control" name="tipo_transporte" required>
                        <option value="...">...</option>
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
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Nombre Empresa</label>
                <div class="col-sm-6">
                <select class="form-control" name="nombre_empresa" required>
                        <option value="...">...</option>
                        <?php if(!empty($resultProveedores)) { ?>
                            <?php foreach ($resultProveedores as $key => $value){ ?>
                                <option value="<?php echo $value['nombre_empresa']; ?>"><?php echo $value['nombre_empresa']; ?></option>
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
                    <input type="number" class="form-control" name="numero_servicio" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Precio</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="precio" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Fecha Salida</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha_salida" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Destino</label>
                <div class="col-sm-6">
                    <select class="form-control" name="destino" required>
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
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" style="background-color: #d32f2f; border-color: #d32f2f;"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </div>
        </form>
    </div>    
</div>
