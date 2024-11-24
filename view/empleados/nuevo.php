<div class="container my-5">
    <h2>Nuevo Empleado</h2>
    <form method="POST" action="agenciaControll.php?opcion=empleado-nuevo-procesar">
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
            <label class="col-sm-3 col-form-label">Correo Electrónico</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="correo_electronico" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>
