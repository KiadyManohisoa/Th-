<?php
    require '../../../inc/php/function.php';

    header("Content-Type: application/json");   

    $dateMin=$_POST['dateMin'];
    $dateMax=$_POST['dateMax'];
    
    $answer = array();
    $answer['dateMin'] = $dateMin;
    $answer['dateMax'] = $dateMax;
    $answer['totalCueillette']=calculTotalPoidsCueillette($dateMin,$dateMax);	
    $answer['revientKg'] = revientParKilo($dateMin,$dateMax);

    echo json_encode($answer);
?>