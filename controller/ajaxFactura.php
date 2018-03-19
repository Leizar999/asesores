<?php 

include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/model/db.php");
include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/nuevodao.php");
include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/mantenimientodao.php");

$id = $_POST["id"];
$tipo = $_POST["tipo"];

$factura = "";

if($tipo == "nuevo") {
	$factura = new NuevoDAO();
} else {
	$factura = new MantenimientoDAO();
}

$bill = $factura->getBill($id);

echo json_encode($bill);

?>