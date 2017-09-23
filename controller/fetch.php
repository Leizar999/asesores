<?php

include ($_SERVER["DOCUMENT_ROOT"] . "/asesores/model/db.php");

$bbdd = DB::getInstance();
$bbdd->stablishUTF8();
$query = "SELECT * FROM mantenimiento";
$cursor = $bbdd->consult($query);
$row = $bbdd->fetch($cursor);

while($row){
    echo "<tr>";
    foreach ($row as $valor) {
        echo "<td> $valor </td>";
    }
    echo "</tr>";
    $row = $bbdd->fetch($cursor);
}

$bbdd->closeConnection($connection);

?>
