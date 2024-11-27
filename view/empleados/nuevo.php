<div class="container-fluid text-center" style="background-color: #ffffff; padding-top: 20px; padding-bottom: 20px;">
    <div class="container my-5">
        <h2>Nuevo Empleado</h2>
        <form method="POST" action="agenciaControl.php?opcion=empleado-nuevo-procesar">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Puesto</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="puesto" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">DNI</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="dni" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-6">

                    <input type="password" class="form-control" name="contraseña" required>

                </div>
            </div>
            <br><br><br>
                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </div>
        </form>
    </div>
</div>