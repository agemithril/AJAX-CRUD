<?php
include("conDb.php");

$search = $_POST["search"];

if (!empty($search)) {

    $query = "SELECT * FROM tbl_task WHERE name LIKE ?";
    $stmt = mysqli_prepare($conn, $query);
    $searchParam = '%' . $search . '%';
    mysqli_stmt_bind_param($stmt, 's', $searchParam);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Error de consulta: " . mysqli_error($conn));
    }

    $json = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = array(
            "name" => $row["name"],
            "description" => $row["description"],
            "Id" => $row["idTask"]
        );
    }

    mysqli_free_result($result);
    mysqli_close($conn);

    $jsonstring = json_encode($json);
    if ($jsonstring === false) {
        die("Error al convertir a JSON");
    }

    echo $jsonstring;
}
?>