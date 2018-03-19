<?php
session_start();

include($_SERVER["DOCUMENT_ROOT"] . "/asesores/model/db.php");
include($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/userdao.php");

$nif = $_POST["nif"];
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$correo = $_POST["correo"];

$userdao = new UserDAO();

if($userdao->insertUser($nif, $nombre, $telefono, $direccion, $correo)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $_SESSION["success"][0] = "EL USUARIO HA SIDO INSERTADO CORRECTAMENTE";
} else {
    header('Location: /index.php');
    $_SESSION["errors"][0] = "EL USUARIO NO HA PODIDO SER INSERTADO";
}

?>
