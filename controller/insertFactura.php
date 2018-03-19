<?php

include($_SERVER["DOCUMENT_ROOT"] . "/asesores/model/db.php");
include($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/userdao.php");
include($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/nuevodao.php");
include($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/mantenimientodao.php");

$tipo = $_POST["tipo"];
$cliente = $_POST["cliente"];
$importe = $_POST["importe"];
$iva = $_POST["iva"];
$total = $_POST["total"];
$fecha = $_POST["fecha"];

$userdao = new UserDAO();
$datosCliente = $userdao->getUser($cliente);
$factura = "";

if($tipo == "nuevo") {
	$factura = new NuevoDAO();
} else {
	$factura = new MantenimientoDAO();
}

$cif = $datosCliente["nif"];
$nombre = $datosCliente["nombre"];
$telefono = $datosCliente["telefono"];
$direccion = $datosCliente["direccion"];
$correo = $datosCliente["correo"];


if($factura->insertFactura($cif, $nombre, $direccion, $importe, $iva, $total, $fecha)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION["success"][0] = "LA FACTURA HA SIDO INSERTADA CORRECTAMENTE";
} else {
    header('Location: /index.php');
    $_SESSION["errors"][0] = "LA FACTURA NO HA PODIDO SER INSERTADA";
}

?>