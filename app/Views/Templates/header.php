<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INVENTEC: Sistema de inventario</title>

	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.bxslider.css">
    <link rel="stylesheet" type="<?php echo base_url(); ?>/assets/text/css" href="css/isotope.css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/fancybox/jquery.fancybox.css" type="<?php echo base_url(); ?>/assets/text/css" media="screen" />
    <link href="<?php echo base_url(); ?>/assets/css/prettyPhoto.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" />
    
  </head>
  <body>
	<header>		
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Activar navegación</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="<?php echo base_url() ?>"><h1><span>INVENTEC</span></h1></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="<?php echo base_url() ?>" class="active">Inicio</a></li>
								<li role="presentation"><a href="<?php echo base_url().'Proveedores' ?>">Proveedores</a></li>
								<li role="presentation"><a href="<?php echo base_url().'Productos' ?>">Productos</a></li>
								<li role="presentation"><a href="<?php echo base_url().'MenuPedidos' ?>">Pedidos</a></li>				
							</ul>
						</div>
					</div>						
				</div>
			</div>	
		</nav>	