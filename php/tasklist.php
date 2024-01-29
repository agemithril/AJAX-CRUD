<?php
include("conDb.php");

$query = "SELECT * FROM tbl_task";
$result = mysqli_query($conn, $query);


if (!$result) {
    die("Consulta fallida: " . mysqli_error($conn));
}

$json = array();
while ($row = mysqli_fetch_assoc($result)) {
    $json[] = array(
        "name" => $row["name"],
        "description" => $row["description"],
        "id" => $row["idTask"]
    );
}

mysqli_free_result($result);
mysqli_close($conn);

$jsonstring = json_encode($json);
if ($jsonstring === false) {
    die("Error al convertir a JSON");
}

echo $jsonstring;
?>