<?php 
    include "../../inc/php/function.php";

    $identifiant=$_POST['identifiant'];
    $motDePasse=$_POST['motDePasse'];

    $result=verifLogUtilisateur($identifiant,$motDePasse);

    if(isset($result['info']))  {
        session_start();
        $_SESSION['user'] = $result['info']; 
    }

    echo json_encode($result);

?>