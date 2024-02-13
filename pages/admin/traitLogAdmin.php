<?php 
    include "../../inc/php/fonction.php";

    $identifiant=$_POST['identifiant'];
    $motDePasse=$_POST['motDePasse'];

    $result=verifLogin($identifiant,$motDePasse);

    
?>