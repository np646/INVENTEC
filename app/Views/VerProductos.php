</header>

<div class="container">

    <div class="col-12">
        <h1>Productos registrados</h1>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Código</th>
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">Proveedor</th>
                        <th style="text-align: center;">Categoria</th>
                        <th style="text-align: center;">Cantidad</th>
                        <th style="text-align: center;">Precio</th>
                        <th style="text-align: center;">Modificar</th>
                        <th style="text-align: center;">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $pro): ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php echo $pro->pro_codigo ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $pro->pro_nombre ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $pro->prv_nombre ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $pro->ctg_nombre ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $pro->pro_cantidad ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $pro->pro_precio ?>
                            </td>
                            <td style="text-align: center;">
                                <button class="btn btn-primary"
                                    onclick="modificarProductoModal('<?php echo $pro->pro_id ?>','<?php echo $pro->pro_codigo ?>','<?php echo $pro->pro_nombre ?>','<?php echo $pro->pro_cantidad ?>','<?php echo $pro->pro_precio ?>',)"
                                    data-toggle="modal" data-target="#modalModificar"">Modificar</button>
                            </td>
                            <td style=" text-align: center;">
                                    <a href=" <?php echo base_url() . 'eliminarProducto/' . $pro->pro_id ?>"
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
                    <h4 class="modal-title" style="text-align: center;">Detalles del producto</h5>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'modificarProducto' ?>" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="mIDpro" name="mIDpro" hidden>
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" id="mCodigo" name="mCodigo" required>
                        </div>
                        <div class="form-group">
                            <label for="nombrepro">Nombre</label>
                            <input type="text" class="form-control" id="mNombrepro" name="mNombrepro" required>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="text" class="form-control" id="mCantidad" name="mCantidad" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" id="mPrecio" name="mPrecio" required>
                        </div>
                        <div class="form-group">
                            <input  class="form-control" id="mPrvid" name="mPrvid" type="hidden">
                            <input  class="form-control" id="mCtgid" name="mCtgid" type="hidden">
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