function modificarProveedorModal(prv_id, prv_nombre, prv_ruc, prv_direccion, prv_telefono, prv_email) {
    $("#mIDprv").val(prv_id);
    $("#mNombreprv").val(prv_nombre);
    $("#mRUC").val(prv_ruc);
    $("#mDireccion").val(prv_direccion);
    $("#mTelefono").val(prv_telefono);
    $("#mEmail").val(prv_email);
}

function modificarProductoModal(pro_id, pro_codigo, pro_nombre, pro_cantidad, pro_precio) {
    $("#mIDpro").val(pro_id);
    $("#mCodigo").val(pro_codigo);
    $("#mNombrepro").val(pro_nombre);
    $("#mCantidad").val(pro_cantidad);
    $("#mPrecio").val(pro_precio);
}

function agregarAPedidoModal(pro_id1, pro_codigo1, pro_nombre1, prv_nombre1) {
    $("#mPedidoIDpro").val(pro_id1);
    $("#mPedidoCodigo").val(pro_codigo1);
    $("#mPedidoNombrepro").val(pro_nombre1);
    $("#mPedidoNombreprv").val(prv_nombre1);
}

function modificarDetalleModal(det_id, pro_codigo2, pro_nombre2, det_cantidad) {
    $("#mDetalleID").val(det_id);
    $("#mDetalleCodigo").val(pro_codigo2);
    $("#mDetalleNombrepro").val(pro_nombre2);
    $("#mDetalleCantidad").val(det_cantidad);
}


