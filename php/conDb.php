<?php
/*Datos del servidor de la BD, modificar*/
$conn = mysqli_connect(
    "localhost",
    "id21766103_ardillacompiladora",
    "ArdillaCompiladora01@",
    "id21766103_api"
);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>