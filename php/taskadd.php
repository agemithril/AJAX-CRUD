<?php
include('conDb.php');


if (!empty($_POST['name'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    
    $query = "INSERT INTO tbl_task (name, description) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $name, $description);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Error de inserción");
    }

}
?>