<?php

include('conDb.php');

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];


echo $id, $name, $description;

$query = "UPDATE tbl_task SET name = ?, description = ? WHERE idTask = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ssi', $name, $description, $id);
$result = mysqli_stmt_execute($stmt);

if (!$result) {
    die("Consulta fallida");
}


?>