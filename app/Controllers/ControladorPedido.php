<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModeloPedido;
use App\Models\ModeloProveedor;
use App\Models\ModeloProducto;
use CodeIgniter\Model;
use PharIo\Manifest\Url;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class ControladorPedido extends BaseController
{

    public function menuPedidos()
    {
        return view('Templates/header') . view('MenuPedidos') . view('Templates/footer');
    }

    public function listarPedidos()
    {
        session_start();

        $objModelo = new ModeloPedido();
        $infoPedidos = $objModelo->listarPedidos();
        $datos = ["pedidos" => $infoPedidos];
        return view('Templates/header') . view('VerPedidos', $datos) . view('Templates/footer');
    }
    public function listarProveedores()
    {
        $objModelo = new ModeloProveedor();
        $infoProveedores = $objModelo->listarProveedores();
        $datos = ["proveedores" => $infoProveedores];
        return view('Templates/header') . view('Pedido', $datos) . view('Templates/footer');
    }
    
    public function insertarPedido()
    {
        echo '<script>alert("Se ha creado un nuevo pedido.")</script>';

        session_start();
        $_SESSION['prvped'] = $_POST['proveedorPedido'];
       
        $datos = [
            "prv_id" => $_POST['proveedorPedido'],
            "fecha" => $_POST['fecha'],
        ];

        $objModelo = new ModeloPedido();
        $objModelo->insertarNuevoPedido($datos);

        $ultimoPedido = $objModelo->seleccionarUltimoPedido();
        $pedido = ["ultimopedido" => $ultimoPedido];

        $objProducto = new ModeloProducto();
        $resultado = $objProducto->listarProductosPorProveedor($datos);
        $resp = ["productos" => $resultado];

        return view('Templates/header') . view('UltimoPedido', $pedido) . view('CrearPedido', $resp) . view('Templates/footer');
    }
    public function insertarProductoEnPedido()
    {

        session_start();

        $datos = [
            "pro_id" => $_POST['mPedidoIDpro'],
            "cantidad" => $_POST['mPedidoCantidad'],
            "ped_id" => $_SESSION['ultimoPedidoID'],
        ];

        $objModelo = new ModeloPedido();
        $existe = $objModelo->verificarProductoEnPedido($datos);

        //para ver la lista de productos por proveedor
        $datosprv = ["prv_id" => $_SESSION['prvped']];
    
        $objProducto = new ModeloProducto();
        $resultado = $objProducto->listarProductosPorProveedor($datosprv);
        $resp = ["productos" => $resultado];
    
        if (empty($existe)) {
            $objModelo->insertarProductoEnPedido($datos);
            echo '<script>alert("Se ha agregado el producto al pedido.")</script>';
            return view('Templates/header') . view('CrearPedido', $resp) . view('Templates/footer');

        } else {
            echo '<script>alert("Ya existe el producto en el pedido.")</script>';
            return view('Templates/header') . view('CrearPedido', $resp) . view('Templates/footer');
        }
    }

    public function listarProductosEnPedido()
    {
        session_start();
        $datos = [
            "ped_id" => $_SESSION['ultimoPedidoID'],
        ];

        $objModelo = new ModeloPedido();
        $infoPedido = $objModelo->listarProductosEnPedido($datos);
        $resp = ["productos" => $infoPedido];

        return view('Templates/header') . view('VerDetallePedido', $resp) . view('Templates/footer');
    }


    public function eliminarProductoDePedido($id)
    {
        $objModelo = new ModeloProducto();
        $data = ["det_id" => $id];

        $objModelo->eliminarProductoDePedido($data);
        return redirect()->to(base_url() . 'VerDetallePedido');
    }

    public function insertarMasEnPedido()
    {
        session_start();
        $datos = [
            "prv_id" => $_POST['prvped'],
            "ped_id" => $_POST['pedid'],
        ];

        $objProducto = new ModeloProducto();
        $resultado = $objProducto->listarProductosPorProveedor($datos);
        $resp = ["productos" => $resultado];

        return view('Templates/header') . view('CrearPedido', $resp) . view('Templates/footer');
    }

    public function verDetallePedido()
    {
        session_start();
        $_SESSION["proveedorpedido"] = $_POST['proveedorpedido'];
        $_SESSION["numeropedido"] = $_POST['numeropedido'];
        $datos = [
            "ped_id" => $_POST['numeropedido'],
        ];

        $objModelo = new ModeloPedido();
        $infoPedido = $objModelo->listarProductosEnPedido($datos);
        $resp = ["productos" => $infoPedido];

        return view('Templates/header') . view('VerProductosEnPedido', $resp) . view('Templates/footer');
    }


    /////////
    public function eliminarPedido($id)
    {
        $objModelo = new ModeloPedido();
        $data = ["ped_id" => $id];

        $objModelo->eliminarPedido($data);
        return redirect()->to(base_url() . 'VerPedidos');
    }


    public function subirComprobanteEnPedido()
    {
        $nombre_imagen = $_FILES['fotos']['name'];
        $temporal = $_FILES['fotos']['tmp_name'];
        $nombrediferencia = date('dhms');
        $nombrefinal = $nombrediferencia . '_' . $nombre_imagen;
        $carpetaDestino = 'assets/file/';
        $datos = [

            "ped_id" => $_POST['numeropedido'],
            "ruta" => ($nombrefinal),
        ];

        move_uploaded_file($temporal, $carpetaDestino . $nombrefinal);

        $objPedido = new ModeloPedido();
        $objPedido->subirComprobanteEnPedido($datos);

        return redirect()->to(base_url() . 'VerPedidos');
    }

    public function abrirComprobante($id)
    {
        $datos = ["ped_comprobante" => $id];
        return redirect()->to(base_url() . 'assets/file/' . $datos['ped_comprobante']);
    }

}