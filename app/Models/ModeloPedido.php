<?php namespace App\Models;
use CodeIgniter\Model;

class ModeloPedido extends Model{

    public function listarPedidos()
    {
        $pedidos = $this->db->query("call SELECT_PEDIDOS();");
        return $pedidos->getResult();
    }

    public function verificarProductoEnPedido($datos)
    {
        $producto = $this->db->query("call SELECT_PRODUCTOPORPEDID('$datos[ped_id]','$datos[pro_id]');");
        return $producto->getResult();
    }
    public function insertarNuevoPedido($datos)
    {
        $this->db->query("call INSERT_PEDIDO('$datos[fecha]','$datos[prv_id]');");
    }

    public function insertarProductoEnPedido($datos)
    {
        $this->db->query("call INSERT_DETALLEPEDIDO('$datos[pro_id]','$datos[cantidad]','$datos[ped_id]');");
    }

    public function seleccionarUltimoPedido()
    {
        $pedido =$this->db->query("call SELECT_ULTIMOPEDIDO();");
        return $pedido->getResult();
    }

    ////////
    public function listarProductosEnPedido($datos)
    {
        $producto = $this->db->query("call SELECT_DETALLEPEDIDOPORPEDIDOID('$datos[ped_id]');");
        return $producto->getResult();
    }

    public function eliminarProductoDePedido($datos)
    {
        $this->db->query("call DELETE_DETALLEPEDIDO('$datos[det_id]');");
 
    }
    
    public function modificarProductoDePedido($datos, $id)
    {
        $this->db->query("call UPDATE_CANTIDADDETALLE('$id[cantidad]','$datos[det_id]');");
    }

    public function eliminarPedido($datos)
    {
        $this->db->query("call DELETE_PEDIDO('$datos[ped_id]');");
 
    }

    public function subirComprobanteEnPedido($datos)
    {
        $this->db->query("call UPDATE_SUBIRCOMPROBANTE('$datos[ruta]','$datos[ped_id]');");
    }

    public function abrirComprobante($datos)
    {
        $comprobante = $this->db->query("call SELECT_COMPROBANTE('$datos[ped_id]');");
        return $comprobante->getResult();
    }
}