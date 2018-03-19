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
                    <h1>INSERTAR USUARIO</h1>
                </div>

                <div class="panel-body">

                    <form action="/asesores/controller/insertClient.php" method="post">
                        <div class="form-group">
                            <label for="nif">NIF</label>
                            <input type="text" name="nif" value="" id="nif" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="nombre">NOMBRE</label>
                            <input type="text" name="nombre" value="" class="form-control" id="nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono">TELÉFONO</label>
                            <input type="text" name="telefono" value="" class="form-control" id="telefono" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="direccion">DIRECCIÓN</label>
                            <input type="text" name="direccion" value="" class="form-control" id="direccion" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="correo">CORREO</label>
                            <input type="email" name="correo" value="" class="form-control" id="correo" class="form-control" required>
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
