
<?php 
//ESTA PARTE ES PARA RECONOCER CUÁL ES EL ÚLTIMO PEDIDO QUE FUE CREADO

if (!isset($_SESSION)) {
    session_start();
}

foreach ($ultimopedido as $ped): ?>
    <?php $_SESSION["ultimoPedidoID"] =  $ped->ped_id; ?>
<?php endforeach; ?>
