<?php
    require '../../inc/php/function.php';

    header("Content-Type: application/json");

    $nomTable=$_GET['nomTable'];
    $data = selectAll($nomTable);

    echo json_encode($data);

?>