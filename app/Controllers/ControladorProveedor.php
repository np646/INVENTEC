<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModeloProveedor;
use CodeIgniter\Model;
use PharIo\Manifest\Url;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class ControladorProveedor extends BaseController
{

    public function agregarProveedor()
    {
        return view('Templates/header') . view('AgregarProveedor') . view('Templates/footer');
    }

    public function proveedores()
    {
        return view('Templates/header') . view('Proveedores') . view('Templates/footer');
    }

    public function listarProveedores()
    {
        $objModelo = new ModeloProveedor();
        $infoProveedores = $objModelo->listarProveedores();
        $datos = ["proveedores" => $infoProveedores];
        return view('Templates/header') . view('VerProveedores', $datos) . view('Templates/footer');
    }

    public function verProveedores()
    {
        $objModelo = new ModeloProveedor();
        $infoProveedores = $objModelo->listarProveedores();
        $datos = ["proveedores" => $infoProveedores];
        return $datos;
    }

    public function insertarProveedor()
    {
        $datos = [
            "prv_nombre" => $_POST['nombreprv'],
            "prv_ruc" => $_POST['ruc'],
            "prv_direccion" => $_POST['direccion'],
            "prv_telefono" => $_POST['telefono'],
            "prv_email" => $_POST['email'],
        ];


        $objModelo = new ModeloProveedor();

        $existe = $objModelo->verificarProveedor($datos);

        if (empty($existe)) {

            $objModelo->insertarProveedor($datos);
            echo '<script>alert("Se ha agregado al proveedor.")</script>';

            return view('Templates/header') . view('AgregarProveedor') . view('Templates/footer');

        } else {
            echo '<script>alert("Ya existe el proveedor.")</script>';
            return view('Templates/header') . view('AgregarProveedor') . view('Templates/footer');
        }

    }

    public function modificarProveedor()
    {
        $datos = [
            "prv_nombre" => $_POST['mNombreprv'],
            "prv_ruc" => $_POST['mRUC'],
            "prv_direccion" => $_POST['mDireccion'],
            "prv_telefono" => $_POST['mTelefono'],
            "prv_email" => $_POST['mEmail'],
        ];

        $id = ["prv_id" => $_POST['mIDprv']];

        $objModelo = new ModeloProveedor();
        $objModelo->modificarProveedor($datos, $id);
        return redirect()->to(base_url() . 'VerProveedores');
    }

    public function eliminarProveedor($id)
    {
        $objModelo = new ModeloProveedor();
        $data = ["prv_id" => $id];

        $objModelo->eliminarProveedor($data);
        return redirect()->to(base_url() . 'VerProveedores');
    }

}