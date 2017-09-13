<?php

$sql = "SELECT * FROM mantenimiento";
$cursor = mysqli_query($conexion, $sql) or die("Error al ejecutar la consulta: " . mysqli_error($conexion));
$fila = mysqli_fetch_assoc($cursor);

while($fila){
    echo "<tr>";
    foreach ($fila as $valor) {
        echo "<td> $valor </td>";
    }
    echo "</tr>";
    $fila = mysqli_fetch_assoc($cursor);
}

mysqli_close($conexion);

?>
