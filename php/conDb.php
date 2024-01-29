<?php
/*Datos del servidor de la BD, modificar*/
$conn = mysqli_connect(
    "-------Host",
    "-------User",
    "---Password",
    "---Db---name"
);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
