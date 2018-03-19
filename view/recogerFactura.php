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
        <title>AsesoresLOPD</title>
        <?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/templates/head.php"); ?>
    </head>

    <body>

        <header>
            <?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/templates/header.php"); ?>
        </header>

        <?php include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/view/messages.php"); ?>

        <div class="col-md-6 mx-auto container">
            <div class="panel panel-primary">

                <div class="panel-heading text-center">
                    <h1>INSERTAR FACTURA</h1>
                </div>

                <div class="panel-body">

                    <form action="/asesores/controller/insertFactura.php" method="post">
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="">SELECCIONAR OPCIÓN DE FACTURA</option>
                            <option value="nuevo">NUEVO CONTRATO</option>
                            <option value="mantenimiento">MANTENIMIENTO</option>
                        </select>

                        <br>

                        <select name="cliente" id="cliente" class="form-control">
                            <option value="">SELECCIONAR CLIENTE</option>
                            <?php
                                while($row){
                                    echo "<option value='" . $row["nif"] . "'>" . $row["nombre"] . "</option>";
                                    $row = $bbdd->fetch($result);
                                } 
                            ?>
                        </select>

                        <br>

                        <div class="form-group">
                            <label for="importe">IMPORTE</label>
                            <input type="text" name="importe" value="" id="importe" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="iva">IVA</label>
                            <input type="text" name="iva" value="21" id="iva" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="total">TOTAL</label>
                            <input type="text" name="total" value="" id="total" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="fecha">FECHA</label>
                            <input type="text" name="fecha" value="" id="fecha" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="button" class="btn btn-primary btn-lg">ENVIAR DATOS</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </body>

</html>
