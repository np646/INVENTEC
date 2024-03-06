<div class="container">

    <div class="col-12">
        <form action="https://formspree.io/f/mzblbpzj" method="POST">
                <div class="form-group">
                    <label class="" for="" style="color:black">Proveedor</label>
                    <br>
                    <select name="proveedorPedido" id="proveedorPedido" class="form-control" style="width: 50%;">
                        <option selected="selected">Seleccione una opción</option>
                        <?php
                        foreach ($proveedores as $prv) { ?>
                            <option value=" <?php echo $prv->prv_email ?>"> <?php echo $prv->prv_nombre ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            <br>
            <label>
                Contenido:
                <textarea name="message"></textarea>
            </label>
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>