<?php
include("conDb.php");

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $query = "SELECT * FROM tbl_task WHERE idTask = ?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Consulta fallida");
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            "name" => $row["name"],
            "description" => $row["description"],
            "id" => $row["idTask"],
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
?>