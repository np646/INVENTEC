</header>

<div class="container">
    <div class="col-12">
        <h1 style="text-align: center;">Crear un nuevo pedido</h1>
        <br>
        <form action="<?php echo base_url() . 'insertarPedido' ?>" method="POST" enctype="multipart/form-data">
            <div style="margin-left: 33%;">
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input required name="fecha" type="text" id="fecha" class="form-control" style="width: 50%;"
                        placeholder="DD/MM/AAAA">
                </div>
                <div class="form-group">
                    <label class="" for="" style="color:black">Proveedor</label>
                    <br>
                    <select name="proveedorPedido" id="proveedorPedido" class="form-control" style="width: 50%;">
                        <option selected="selected">Seleccione una opción</option>
                        <?php
                        foreach ($proveedores as $prv) { ?>
                            <option value=" <?php echo $prv->prv_id ?>"> <?php echo $prv->prv_nombre ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
                <br>
                <a href="<?php echo base_url() . 'Pedidos' ?>" class="btn btn-danger">Regresar</a>
                <button type="submit" class="btn btn-success">Crear pedido</button>

        </form>
    </div>
</div>