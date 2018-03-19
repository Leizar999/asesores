<!DOCTYPE html>
<html lang="es">

<head>
	<title>AsesoresLOPD</title>
	<?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/templates/head.php"); ?>
</head>

<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	    <a class="navbar-brand" href="index.php">ASESORES LOPD</a>
	  <ul class="navbar-nav">

	    <li class="nav-item">
	        <a class="nav-link" href="view/recogerCliente.php">INSERTAR CLIENTE</a>
	    </li>

	    <li class="nav-item">
	        <a class="nav-link" href="view/cliente.php">VER CLIENTES</a>
	    </li>

	    <li class="nav-item">
	        <a class="nav-link" href="view/recogerFactura.php">CREAR FACTURA</a>
	    </li>

	    <!-- Dropdown -->
	    <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	            CONSULTAS
	        </a>

	        <div class="dropdown-menu">
	            <a class="dropdown-item" href="view/mostrarFactura.php?tipo=nuevo">CONSULTAR NUEVO</a>
	            <a class="dropdown-item" href="view/mostrarFactura.php?tipo=mantenimiento">CONSULTAR MANTENIMIENTO</a>
	        </div>
	    </li>

	  </ul>
	</nav>

	<div class="input-group col-6 mx-auto align-middle">
	  <input class="form-control"
	         placeholder="BUSCAR DATOS DE CLIENTE">
	  <div class="input-group-addon"><i class="fa fa-search"></i></div>
	</div>

	<?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/view/messages.php"); ?>

</body>

</html>
