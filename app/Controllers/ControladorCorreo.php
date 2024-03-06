<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Model;
use App\Models\ModeloProveedor;
use PharIo\Manifest\Url;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class ControladorCorreo extends BaseController
{

    public function enviarCorreo()
    {

        $objModelo = new ModeloProveedor();
        $infoProveedores = $objModelo->listarProveedores();
        $datos = ["proveedores" => $infoProveedores];
        return view('Templates/header') . view('EnviarCorreo', $datos) . view('Templates/footer');
    }

}