</header>

<div class="container">

    <div class="col-12">
        <h1>Proveedores registrados</h1>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">RUC</th>
                        <th style="text-align: center;">Dirección</th>
                        <th style="text-align: center;">Teléfono</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Modificar</th>
                        <th style="text-align: center;">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proveedores as $prv): ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php echo $prv->prv_nombre ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $prv->prv_ruc ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $prv->prv_direccion ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $prv->prv_telefono ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $prv->prv_email ?>
                            </td>
                            <td style="text-align: center;">
                                <button class="btn btn-primary"
                                    onclick="modificarProveedorModal('<?php echo $prv->prv_id ?>','<?php echo $prv->prv_nombre ?>','<?php echo $prv->prv_ruc ?>','<?php echo $prv->prv_direccion ?>','<?php echo $prv->prv_telefono ?>','<?php echo $prv->prv_email ?>')"
                                    data-toggle="modal" data-target="#modalModificar"">Modificar</button>
                            </td>
                            <td style=" text-align: center;">
                                    <a href=" <?php echo base_url() . 'eliminarProveedor/' . $prv->prv_id ?>"
                                        class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div>
    <div class="modal fade" id="modalModificar">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Detalles del proveedor</h5>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . '/modificarProveedor' ?>" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="mIDprv" name="mIDprv" hidden>
                        <div class="form-group">
                            <label for="nombreprv">Nombre</label>
                            <input type="text" class="form-control" id="mNombreprv" name="mNombreprv" required>
                        </div>
                        <div class="form-group">
                            <label for="ruc">RUC</label>
                            <input type="text" class="form-control" id="mRUC" name="mRUC" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="mDireccion" name="mDireccion" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="mTelefono" name="mTelefono" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Email</label>
                            <input type="text" class="form-control" id="mEmail" name="mEmail" required>
                        </div>

                        <br>
                        <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    &copy; 2023, Nataly Salazar
                </div>
            </div>
        </div>
</footer>
-->