</header>
<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<div class="container">

    <div class="col-12">
        <h1>Contenidos del pedido</h1>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Fecha</th>
                        <th style="text-align: center;">Código</th>
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $pro): ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php echo $pro->ped_fecha ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $pro->pro_codigo ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $pro->pro_nombre ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $pro->det_cantidad ?>
                            </td>
                        </tr>

                        <?php $_SESSION["pedidopdf"] = $pro->ped_id; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div>
    <a href=" <?php echo base_url() . 'VerPedidos' ?>" class="btn btn-danger">Regresar</a>
</div>

<div>

    <form action="<?php echo base_url() . 'GeneradorPDF' ?>" method="POST" enctype="multipart/form-data">

            <input type="hidden" class="form-control" id="pedidopdf" name="pedidopdf" required readonly
                value="<?php echo $_SESSION["pedidopdf"] ?>">
        <button class="btn btn-primary">GenerarPDF</button>
    </form>
</div>