<?php
namespace App\Models;

use CodeIgniter\Model;

class ModeloProveedor extends Model
{
    public function listarProveedores()
    {
        // $proveedores = $this->db->query("SELECT * FROM bdd_inventec.tbl_proveedor WHERE prv_estado = 0;");
        $proveedores = $this->db->query("call SELECT_PROVEEDORES;");
        // $proveedores = $this->db->query("call SELECT_PROVEEDORPORID(1);");
        return $proveedores->getResult();
    }

    public function insertarProveedor($datos)
    {
        $this->db->query("call INSERT_PROVEEDOR('$datos[prv_nombre]','$datos[prv_ruc]','$datos[prv_direccion]','$datos[prv_email]','$datos[prv_telefono]');");
    }

    public function eliminarProveedor($datos)
    {
        $this->db->query("call DELETE_PROVEEDOR('$datos[prv_id]');");

    }

    public function modificarProveedor($datos, $id)
    {
        $this->db->query("call UPDATE_PROVEEDOR('$id[prv_id]','$datos[prv_nombre]','$datos[prv_ruc]','$datos[prv_direccion]','$datos[prv_email]','$datos[prv_telefono]');");
    }

    public function verificarProveedor($datos)
    {
        $proveedor = $this->db->query("call SELECT_PROVEEDORPORRUC('$datos[prv_ruc]');");
        return $proveedor->getResult();
    }


}