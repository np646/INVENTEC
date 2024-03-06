</header>

<div class="container">

    <div class="col-12">
        <h1 style="text-align: center;">Agregar nuevo producto</h1>
        <br>
        <form action="<?php echo base_url() . 'insertarProducto' ?>" method="POST" enctype="multipart/form-data">
            <div style="margin-left: 33%;">
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input required name="codigo" type="text" id="codigo" class="form-control" style="width: 50%;">
                </div>
                <div class="form-group">
                    <label for="nombrepro">Nombre</label>
                    <input required name="nombrepro" type="text" id="nombrepro" class="form-control"
                        style="width: 50%;">
                </div>
                <div class="form-group">
                    <label class="" for="" style="color:black">Proveedor</label>
                    <br>
                    <select name="prvid" id="prvid" class="form-control" style="width: 50%;">
                        <option selected="selected">Seleccione una opción</option>
                        <?php
                        foreach ($proveedores as $prv) { ?>
                            <option value=" <?php echo $prv->prv_id ?>"> <?php echo $prv->prv_nombre ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="" for="" style="color:black">Categoría</label>
                    <br>
                    <select class="form-control" name="ctgid" id="ctgid" class="form-control" style="width: 50%;">
                        <option value="">Seleccione una opción</option>
                        <option value="1">Higiene</option>
                        <option value="2">Bebidas</option>
                        <option value="3">Comestibles</option>
                        <option value="5">Hogar</option>
                        <option value="6">Limpieza</option>
                        <option value="7">Mascotas</option>
                        <option value="8">Snacks</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="precio">Cantidad</label>
                    <input required name="cantidad" type="text" id="cantidad" class="form-control" style="width: 50%;">
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input required name="precio" type="text" id="precio" class="form-control" style="width: 50%;">
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="<?php echo base_url() . 'VerProductos' ?>" class="btn btn-warning">Ver todos los productos</a>
            </div>
        </form>
    </div>
</div>
</div>