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
    <body>
        <div class='table-responsive'>
            <table class='table'>
                <tr>
                    <th>NIF</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>TELÉFONO</th>
                    <th>DIRECCIÓN</th>
                    <th>CORREO</th>
                </tr>

                <?php
                    while($row){
                        echo "<tr>";
                        echo "<td>" . $row["nif"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["apellidos"] . "</td>";
                        echo "<td>" . $row["telefono"] . "</td>";
                        echo "<td>" . $row["direccion"] . "</td>";
                        echo "<td><a href='mailto:" . $row["correo"] . "'>" . $row["correo"] . "</a></td>";
                        echo "</tr>";

                        $row = $bbdd->fetch($result);
                    }

                ?>
            </table>
        </div>
    </body>
</html>
