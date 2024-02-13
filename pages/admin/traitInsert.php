<?php
    require '../../inc/php/function.php';

    header("Content-Type: application/json");

    $data = array();
    foreach($_POST as $key => $val) {
        if($key != 'nomTable')
        $data[$key] = $_POST[$key];
    }

    $rep = insert($_POST['nomTable'], $data);

    echo json_encode($rep);

?>