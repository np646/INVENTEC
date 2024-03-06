</header>

<?php

if (!isset($_SESSION)) {
    session_start();
}

?>

<div class="container">

    <div class="col-12">
        <h1>Listado de pedidos</h1>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Fecha</th>
                        <th style="text-align: center;">Proveedor</th>
                        <th style="text-align: center;">Comprobante</th>
                        <th style="text-align: center;">Cargar comprobante</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $ped): ?>
                        <tr>

                            <td style="text-align: center;">
                                <?php echo $ped->ped_fecha ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $ped->prv_nombre ?>
                            </td>
                            <td style=" text-align: center;">
                                <a href=" <?php echo base_url() . 'abrirComprobante/' . $ped->ped_comprobante ?>"
                                    class="btn btn-danger">Ver comprobante</a>
                            </td>
                            <td style="text-align: center;">
                                <form action="<?php echo base_url() . 'subirComprobanteEnPedido' ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" class="form-control" id="numeropedido" name="numeropedido" required
                                        readonly value="<?php echo $ped->ped_id ?>">
                                    <input class="form-control-file" type="file" name="fotos" id="fotos"
                                        accept="image/pdf, image/png, image/jpeg">
                                    <button class="btn btn-primary">Subir comprobante</button>
                                </form>
                            </td>
                            <td style=" text-align: center;">

                                <?php $_SESSION["proveedorpedido"] = $ped->prv_id; ?>
                                <?php //echo $_SESSION["proveedorpedido"] ?>

                                <?php $_SESSION["numeropedido"] = $ped->ped_id; ?>
                                <?php //echo $_SESSION["numeropedido"] ?>

                                <div>
                                    <form action="<?php echo base_url() . 'verProductosEnPedido' ?>" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="proveedorpedido"
                                                name="proveedorpedido" required readonly
                                                value="<?php echo $_SESSION["proveedorpedido"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="numeropedido" name="numeropedido"
                                                required readonly value="<?php echo $_SESSION["numeropedido"] ?>">
                                        </div>
                                        <button class="btn btn-primary">Ver contenidos</button>
                                    </form>
                                </div>
                            </td>
                            <td style=" text-align: center;">
                                <a href=" <?php echo base_url() . 'eliminarPedido/' . $ped->ped_id ?>"
                                    class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>