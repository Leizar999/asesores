<?php

include($_SERVER["DOCUMENT_ROOT"] . "/asesores/model/db.php");
include($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/userdao.php");
include($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/nuevodao.php");
include($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/mantenimientodao.php");

$tipo = $_POST["tipo"];
$id = $_POST["id"];


$borrar = "";

switch ($tipo) {
	case 'nuevo':
		$borrar = new NuevoDAO();
		break;
	case 'mantenimiento':
		$borrar = new MantenimientoDAO();
		break;
	case 'usuario':
		$borrar = new UserDAO();
		break;
}

if($borrar->delete($id)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION["success"][0] = "strtolower($tipo) HA SIDO BORRADO CORRECTAMENTE";
} else {
    header('Location: /index.php');
    $_SESSION["errors"][0] = " strtolower($tipo) NO HA PODIDO SER BORRADO";
}

?>