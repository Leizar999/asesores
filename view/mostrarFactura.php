<?php

include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/model/db.php");
include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/nuevodao.php");
include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/dao/mantenimientodao.php");

$bbdd = DB::getInstance();

$tipo = $_GET["tipo"];

if($tipo == "nuevo") {
    $factura = new NuevoDAO();
} else {
    $factura = new MantenimientoDAO();
}
$result = $factura->getFactura();
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
        
        <header>
            <?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/templates/header.php"); ?>
        </header>

        <?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/view/messages.php"); ?>

        <h1>TIPO FACTURA: <?php echo strtolower($tipo); ?></h1>

        <div class='table-responsive'>
            <table class='table'>
                <tr>
                    <th>Nº FACTURA</th>
                    <th>CIF</th>
                    <th>NOMBRE</th>
                    <th>DIRECCIÓN</th>
                    <th>IMPORTE</th>
                    <th>IVA</th>
                    <th>TOTAL</th>
                    <th>COBRO</th>
                    <th>FACTURA A WORD</th>
                    <th>¿BORRAR?</th>
                </tr>

                <?php
                    while($row){
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["cif"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["direccion"] . "</td>";
                        echo "<td>" . $row["importe"] . "</td>";
                        echo "<td>" . $row["iva"] . "</td>";
                        echo "<td>" . $row["total"] . "</td>";
                        echo "<td>" . $row["cobro"] . "</td>";
                        echo "<td><button id='" . $row["id"] . "' tipo='" . $tipo . "' class='btn btn-primary' name='generate'>GENERAR</button></td>";
                        echo "<td><button id='" . $row["id"] . "' tipo='" . $tipo . "' class='btn btn-danger' name='erase'>BORRAR</button></td>";

                        echo "</tr>";

                        $row = $bbdd->fetch($result);
                    }
                ?>
            </table>
        </div>
    </body>
</html>
