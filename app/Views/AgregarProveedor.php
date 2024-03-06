</header>

<div class="container">

    <div class="col-12">
        <h1 style="text-align: center;">Agregar nuevo proveedor</h1>
        <br>
        <form action="<?php echo base_url() . 'insertarProveedor' ?>" method="POST" enctype="multipart/form-data">
            <div style="margin-left: 33%;">
                <div class="form-group">
                    <label for="nombreprv">Nombre</label>
                    <input required name="nombreprv" type="text" id="nombreprv" class="form-control"
                        style="width: 50%;">
                </div>
                <div class="form-group">
                    <label for="ruc">RUC</label>
                    <input required name="ruc" type="text" id="ruc" class="form-control" style="width: 50%;">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input required name="direccion" type="text" id="direccion" class="form-control"
                        style="width: 50%;">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input required name="telefono" type="text" id="telefono" class="form-control" style="width: 50%;">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input required name="email" type="text" id="email" class="form-control" style="width: 50%;">
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="<?php echo base_url() . 'VerProveedores' ?>" class="btn btn-warning">Ver todos los
                    proveedores</a>
            </div>
        </form>
    </div>
</div>