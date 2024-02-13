<?php
    include '../../../inc/php/function.php';

    header("Content-Type: application/json");   

    $dateMin=$_POST['dateMin'];
    $dateMax=$_POST['dateMax'];
    
    $answer = array();
    $answer['dateMin'] = $dateMin;
    $answer['dateMax'] = $dateMax;
    $answer['totalCueillette']=calculTotalPoidsCueillette($dateMin,$dateMax);	
    $answer['revientKg'] = revientParKilo($dateMin,$dateMax);
    $answer['restantParParcelle'] = getPoidsRestantParParcelle($dateMax);

    $answer['sommeRestantParParcelle'] = sommeRestant($answer['restantParParcelle']);
    
    $answer['benefice']= benefice($dateMin,$dateMax);
    $answer['totalvente']=totalvente($dateMin,$dateMax);
    $answer['totalCharge']=totalCharges($dateMin,$dateMax);

    echo json_encode($answer);
?>