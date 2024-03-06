</header>
<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<div class="container">

    <div class="col-12">
        <h1>Productos en el pedido</h1>
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

                        <?php $_SESSION["prvped1"] = $pro->prv_id; ?>
                        <?php $_SESSION["pedid1"] = $pro->ped_id; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div>
    <form action="<?php echo base_url() . 'insertarMasEnPedido' ?>" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <input type="hidden" class="form-control" id="prvped" name="prvped" required readonly
                value="<?php echo $_SESSION['prvped1'] ?>">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="pedid" name="pedid" required readonly
                value="<?php echo $_SESSION['pedid1'] ?>">
        </div>
        <br>
        <button class="btn btn-primary">Agregar más productos</button>
    </form>
</div>
<div>
    <a href=" <?php echo base_url() . 'MenuPedidos' ?>" class="btn btn-danger">Finalizar</a>
</div>
