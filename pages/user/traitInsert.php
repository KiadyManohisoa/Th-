<?php
    require '../../inc/php/function.php';

    header("Content-Type: application/json");

    $data = array();
    foreach($_POST as $key => $val) {
        if($key != 'nomTable'){
            $data[$key] = $_POST[$key];
        }
    }

    if($_POST['nomTable']=="The_Cueillette"){
        $test=verifValiditePoids($data['idParcelle'],$data['dateCueillette'],$data['poids']);   
        if(isset($test['error'])) {
            echo json_encode($test);
            return;
        }    
    }

    $rep = insert($_POST['nomTable'], $data);

    echo json_encode($rep);
?>