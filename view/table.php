<!DOCTYPE html>
<html lang="es">
<head>
	<title>AsesoresLOPD</title>
	<?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/templates/head.php"); ?>
</head>
<body>
	<?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/model/db.php"); ?>

    <div class='table-responsive'>
        <table class='table'>
            <tr>
                <th>Nº FACTURA</th>
                <th>C.I.F.</th>
                <th>NOMBRE/RAZÓN SOCIAL</th>
                <th>DIRECCIÓN</th>
                <th>IMPORTE</th>
                <th>IVA</th>
                <th>TOTAL</th>
                <th>COBRO</th>
            </tr>

            <?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/controller/fetch.php"); ?>

        </table>
    </div>
</body>
</html>
