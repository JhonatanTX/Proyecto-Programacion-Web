<div class="container-fluid text-center" style="background-color: #ffffff; padding-top: 20px; padding-bottom: 20px;">
    <div class="container my-5" style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #d32f2f;">Nuevo Hotel</h2>
        <form method="POST" action="agenciaControl.php?opcion=hotel-nuevo-procesar">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre_hotel" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Nombre del Proveedor</label>
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
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Dirección</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="direccion" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Telefono</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="telefono" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #D50000;">Correo</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="correo_electronico" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #D50000;">Lugar</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lugar" required>
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

