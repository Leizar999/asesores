<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="../index.php">ASESORES LOPD</a>
  <ul class="navbar-nav">

    <li class="nav-item">
        <a class="nav-link" href="../view/recogerCliente.php">INSERTAR CLIENTE</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../view/cliente.php">VER CLIENTES</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../view/recogerFactura.php">CREAR FACTURA</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            CONSULTAS
        </a>

        <div class="dropdown-menu">
            <a class="dropdown-item" href="../view/mostrarFactura.php?tipo=nuevo">CONSULTAR NUEVO</a>
            <a class="dropdown-item" href="../view/mostrarFactura.php?tipo=mantenimiento">CONSULTAR MANTENIMIENTO</a>
        </div>
    </li>

  </ul>
</nav>

<br><br>