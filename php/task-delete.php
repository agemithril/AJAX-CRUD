<?php
include('conDb.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM tbl_task WHERE idTask = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Consulta fallida");
    }


}
?>