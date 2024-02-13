<?php 
    include "../../inc/php/function.php";

    $identifiant=$_POST['identifiant'];
    $motDePasse=$_POST['motDePasse'];

    $result=verifLogAdmin($identifiant,$motDePasse);

    if(isset($result['info']))  {
        session_start();
        $_SESSION['admin'] = $result['info']; 
    }

    echo json_encode($result);

    
?>