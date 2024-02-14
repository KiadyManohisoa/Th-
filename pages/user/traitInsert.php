<?php
    require '../../inc/php/function.php';

    header("Content-Type: application/json");

    $data = array();
    foreach($_POST as $key => $val) {
<<<<<<< Updated upstream
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
=======
        if($key != 'nomTable')
        $data[$key] = $_POST[$key];
>>>>>>> Stashed changes
    }

    $rep = insert($_POST['nomTable'], $data);

    echo json_encode($rep);
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
?>