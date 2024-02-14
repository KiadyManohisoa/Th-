<?php
    require '../../../inc/php/function.php';

    header("Content-Type: application/json");

    //insertion nouvelle saison
    $saison = array();
    $saison['dateMouvement'] = $_POST['dateMouvement'];
    $retour1 = insert("The_Saison",$saison);

    //get max Id saison 
    $idSaison = selectMaxId();

    //insertion couple idSaison et numMois
    $jsonString = $_POST['json'];
    $json_array = json_decode($jsonString, true);
    $count =0;
    for($i=0;$i<count($json_array);$i++) {
        $moisSaison = array();
        $moisSaison['idSaison'] = $idSaison;
        $moisSaison['numMois'] = $json_array[$i];
        $ans = insert("The_MoisSaison",$moisSaison);
        if($ans ===true) {
            $count++;
        }
    }

    $rep = false;    
    if($retour1===true && $count==count($json_array)) {
        $rep = true;
    }
    else {
        $rep = false;
    }

    echo json_encode($rep);

?>