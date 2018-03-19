<?php

include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/model/db.php");
include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/userdao.php");

$bbdd = DB::getInstance();
$userdao = new UserDAO();
$result = $userdao->getUsers();
$row = $bbdd->fetch($result);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Asesores LOPD</title>
        <?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/templates/head.php"); ?>
    </head>
    <body class="googoose-wrapper">
        
        <header>
            <?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/templates/header.php"); ?>
        </header>

        <?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/view/messages.php"); ?>

        <div class='table-responsive'>
            <table class='table'>
                <tr>
                    <th>NIF</th>
                    <th>NOMBRE / RAZÓN SOCIAL</th>
                    <th>TELÉFONO</th>
                    <th>DIRECCIÓN</th>
                    <th>CORREO</th>
                    <th>¿BORRAR?</th>
                </tr>

                <?php
                    while($row){
                        echo "<tr>";
                        echo "<td>" . $row["nif"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["telefono"] . "</td>";
                        echo "<td>" . $row["direccion"] . "</td>";
                        echo "<td><a href='mailto:" . $row["correo"] . "'>" . $row["correo"] . "</a></td>";
                        echo "<td><button id='" . $row["nif"] . "' tipo='usuario' class='btn btn-danger' name='erase'>BORRAR</button></td>";
                        echo "</tr>";

                        $row = $bbdd->fetch($result);
                    }

                ?>
            </table>
        </div>
    </body>
</html>
