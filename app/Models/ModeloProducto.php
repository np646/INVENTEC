<?php namespace App\Models;
use CodeIgniter\Model;

class ModeloProducto extends Model{
   
    public function listarProductos(){
        $productos = $this->db->query("call SELECT_PRODUCTOS;");
        return $productos->getResult();
    }

    public function insertarProducto($datos)
    {
        $this->db->query("call INSERT_PRODUCTO('$datos[pro_nombre]','$datos[pro_cantidad]','$datos[pro_precio]','$datos[prv_id]','$datos[pro_codigo]','$datos[ctg_id]');");
    }

    public function eliminarProducto($datos)
    {
        $this->db->query("call DELETE_PRODUCTO('$datos[pro_id]');");
 
    }
    
    public function modificarProducto($datos, $id)
    {
        $this->db->query("call UPDATE_PRODUCTO('$id[pro_id]','$datos[pro_nombre]','$datos[pro_cantidad]','$datos[pro_precio]','$datos[pro_codigo]');");
    }

    public function verificarProducto($datos)
    {
        $producto = $this->db->query("call SELECT_PRODUCTOPORCODIGO('$datos[pro_codigo]');");
        return $producto->getResult();
    }

    public function listarProductosPorCategoria($datos)
    {
        $producto = $this->db->query("call SELECT_PRODUCTOPORCATEGORIA('$datos[categoria]');");
        return $producto->getResult();
    }

    public function listarProductosPorProveedor($datos)
    {
        $producto = $this->db->query("call SELECT_PRODUCTOPORPROVEEDOR('$datos[prv_id]');");
        return $producto->getResult();
    }

}