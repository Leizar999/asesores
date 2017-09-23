<?php

include($_SERVER["DOCUMENT_ROOT"] . "/asesores/model/db.php");
include($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/userdao.php");

$nif = $_POST["nif"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$correo = $_POST["correo"];

$userdao = new UserDAO();

if($userdao->insertUser($nif, $nombre, $apellidos, $telefono, $direccion, $correo)){
    echo "USUARIO INSERTADO";
} else {
    echo "USUARIO NO INSERTADO";
}

?>
