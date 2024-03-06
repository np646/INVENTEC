</header>

<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<div class="container">

    <div class="col-12">
        <h1>Productos registrados del proveedor</h1>
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
                        <th style="text-align: center;">Agregar a pedido</th>
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
                                    onclick="agregarAPedidoModal('<?php echo $pro->pro_id ?>','<?php echo $pro->pro_nombre ?>','<?php echo $pro->pro_codigo ?>','<?php echo $pro->prv_nombre ?>')"
                                    data-toggle="modal" data-target="#modalInsertarProductoEnPedido">+</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div>
    <div class="modal fade" id="modalInsertarProductoEnPedido">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Cantidad a agregar</h5>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'insertarProductoEnPedido' ?>" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="mPedidoIDpro" name="mPedidoIDpro">
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" id="mPedidoCodigo" name="mPedidoCodigo" required
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="nombrepro">Nombre</label>
                            <input type="text" class="form-control" id="mPedidoNombrepro" name="mPedidoNombrepro"
                                required readonly>
                        </div>
                        <div class="form-group">
                            <label for="nombreprv">Proveedor</label>
                            <input type="text" class="form-control" id="mPedidoNombreprv" name="mPedidoNombreprv"
                                required readonly>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="text" class="form-control" id="mPedidoCantidad" name="mPedidoCantidad"
                                required>
                        </div>

                        <br>
                        <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Agregar a pedido</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    
    <a href=" <?php echo base_url() . 'VerDetallePedido' ?>" class="btn btn-danger">Ver pedido</a>
</div>
