<div class="container-fluid text-center" style="background-color: #ffffff; padding-top: 20px; padding-bottom: 20px;">
    <div class="container my-5" style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #d32f2f;">Nuevo Cliente</h2>
        <form method="POST" action="agenciaControl.php?opcion=cliente-nuevo-procesar">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Apellido</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="apellido" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Correo Electrónico</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="correo_electronico" required>
                </div>
            </div>

            <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Telefono</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="telefono" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="color: #d32f2f;">Dirección</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="direccion"  required>
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
