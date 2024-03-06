<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;
use App\Models\ModeloPedido;

class controladorPDF extends BaseController
{
    public function index()
    {
        $dompdf = new Dompdf();
        session_start();
        $datos = [
            "ped_id" => $_POST['pedidopdf'],
        ];

        $objModelo = new ModeloPedido();
        $infoPedido = $objModelo->listarProductosEnPedido($datos);
        $resp = ["productos" => $infoPedido];

        $html = view('VerProductosEnPedido', $resp);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('pedido.pdf', ['Attachment' => false]);
    }


}