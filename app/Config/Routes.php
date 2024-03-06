<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('controladorMenu');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Index
$routes->get('/', 'controladorIndex::index');

//Proveedores
$routes->get('Proveedores', 'ControladorProveedor::proveedores');
$routes->get('VerProveedores', 'ControladorProveedor::listarProveedores');
$routes->get('AgregarProveedor', 'ControladorProveedor::agregarProveedor');
$routes->post('insertarProveedor', 'ControladorProveedor::insertarProveedor');
$routes->post('modificarProveedor', 'ControladorProveedor::modificarProveedor');
$routes->get('eliminarProveedor/(:any)', 'ControladorProveedor::eliminarProveedor/$1');

//Productos
$routes->get('Productos', 'ControladorProducto::productos');
$routes->get('VerProductos', 'ControladorProducto::listarProductos');
$routes->get('AgregarProducto', 'ControladorProducto::agregarProducto');
$routes->post('modificarProducto', 'ControladorProducto::modificarProducto');
$routes->get('eliminarProducto/(:any)', 'ControladorProducto::eliminarProducto/$1');
$routes->post('insertarProducto', 'ControladorProducto::insertarProducto');
$routes->get('ProductosPorCategoria', 'ControladorProducto::productosPorCategoria');
$routes->get('VerProductosPorCategoria/(:any)', 'ControladorProducto::verProductosPorCategoria/$1');

//Pedidos
$routes->get('MenuPedidos', 'ControladorPedido::menuPedidos');
$routes->get('Pedido', 'ControladorPedido::listarProveedores');
$routes->post('insertarPedido', 'ControladorPedido::insertarPedido');
$routes->get('ultimoPedido', 'ControladorPedido::ultimoPedido');
$routes->post('insertarProductoEnPedido', 'ControladorPedido::insertarProductoEnPedido');
$routes->get('verProductosPorProveedor/(:any)', 'ControladorProducto::verProductosPorProveedor/$1');
$routes->get('VerDetallePedido', 'ControladorPedido::listarProductosEnPedido');
$routes->post('VerDetallePedido', 'ControladorPedido::verDetallePedido');
$routes->post('verProductosEnPedido', 'ControladorPedido::verDetallePedido');
$routes->post('insertarMasEnPedido', 'ControladorPedido::insertarMasEnPedido');
$routes->get('VerPedidos', 'ControladorPedido::listarPedidos');
$routes->get('eliminarPedido/(:any)', 'ControladorPedido::eliminarPedido/$1');
$routes->post('subirComprobanteEnPedido', 'ControladorPedido::subirComprobanteEnPedido');
$routes->get('abrirComprobante/(:any)', 'ControladorPedido::abrirComprobante/$1');
$routes->get('abrirComprobante', 'ControladorPedido::listarPedidos');

//Generar PDF  
$routes->post('GeneradorPDF', 'ControladorPDF::index');

//Correo
$routes->post('EnviarCorreo', 'ControladorCorreo::enviarCorreo');
$routes->get('EnviarCorreo', 'ControladorCorreo::enviarCorreo');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
