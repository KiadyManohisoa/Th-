<?php
    require '../../../inc/php/function.php';

    header("Content-Type: application/json");   

    $dateMin=$_POST['dateMin'];
    $dateMax=$_POST['dateMax'];

    $rep = getListePayement($dateMin,$dateMax);

    echo json_encode($rep);
?>