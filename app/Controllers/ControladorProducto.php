<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModeloProducto;
use App\Models\ModeloProveedor;
use CodeIgniter\Model;
use PharIo\Manifest\Url;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class ControladorProducto extends BaseController
{
    public function Productos()
    {
        return view('Templates/header') . view('Productos') . view('Templates/footer');
    }
    public function agregarProducto()
    {
        $controladorProveedor = new ControladorProveedor();
        $parametros = array();
        $resultado = call_user_func_array(array($controladorProveedor, 'verProveedores'), $parametros);
        return view('Templates/header') . view('AgregarProducto', $resultado) . view('Templates/footer');
    }
    public function listarProductos()
    {
        $objModelo = new ModeloProducto();
        $infoProductos = $objModelo->listarProductos();
        $datos = ["productos" => $infoProductos];
        return view('Templates/header') . view('VerProductos', $datos) . view('Templates/footer');
    }
    public function insertarProducto()
    {
        $datos = [
            "pro_nombre" => $_POST['nombrepro'],
            "pro_codigo" => $_POST['codigo'],
            "pro_precio" => $_POST['precio'],
            "pro_cantidad" => $_POST['cantidad'],
            "prv_id" => $_POST['prvid'],
            "ctg_id" => $_POST['ctgid'],
        ];

        $objModelo = new ModeloProducto();
        $existe = $objModelo->verificarProducto($datos);

        ///para cargar de nuevo los proveedores en el select
        $controladorProveedor = new ControladorProveedor();
        $parametros = array();
        $resultado = call_user_func_array(array($controladorProveedor, 'verProveedores'), $parametros);
        ///
        if (empty($existe)) {
            $objModelo->insertarProducto($datos);
            echo '<script>alert("Se ha agregado el producto.")</script>';
            return view('Templates/header') . view('AgregarProducto', $resultado) . view('Templates/footer');

        } else {
            echo '<script>alert("Ya existe el producto.")</script>';
            return view('Templates/header') . view('AgregarProducto', $resultado) . view('Templates/footer');
        }
    }
    public function modificarProducto()
    {
        $datos = [
            "pro_nombre" => $_POST['mNombrepro'],
            "pro_codigo" => $_POST['mCodigo'],
            "pro_precio" => $_POST['mPrecio'],
            "pro_cantidad" => $_POST['mCantidad'],
            "prv_id" => $_POST['mPrvid'],
            "ctg_id" => $_POST['mCtgid'],
        ];
        $id = ["pro_id" => $_POST['mIDpro']];

        $objModelo = new ModeloProducto();
        $objModelo->modificarProducto($datos, $id);
        return redirect()->to(base_url() . 'VerProductos');
    }

    public function eliminarProducto($id)
    {
        $objModelo = new ModeloProducto();
        $data = ["pro_id" => $id];

        $objModelo->eliminarProducto($data);
        return redirect()->to(base_url() . 'VerProductos');
    }
    public function verProductosPorCategoria($categoria)
    {
        $datos = [
            "categoria" => $categoria,
        ];

        $objModelo = new ModeloProducto();
        $infoProductos = $objModelo->listarProductosPorCategoria($datos);

        $datos = ["productos" => $infoProductos];
        return view('Templates/header') . view('VerProductosPorCategoria', $datos) . view('Templates/footer');
    }

    public function productosPorCategoria()
    {
        return view('Templates/header') . view('ProductosPorCategoria') . view('Templates/footer');
    }
    public function verProductosPorProveedor($proveedor)
    {
        $datos = [
            "prv_id" => $proveedor,
        ];

        $objModelo = new ModeloProducto();
        $infoProductos = $objModelo->listarProductosPorProveedor($datos);

        $datos = ["productos" => $infoProductos];
        return $datos;
    }
}