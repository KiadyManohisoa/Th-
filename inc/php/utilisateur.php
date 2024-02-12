<?php 
include 'connex.php';

function verifyLogUser($pseudo,$mdp)
{
    $requete ="select* from Admin where nom = '$nom' and Mdp = MD5('$mdp');";
    $result=mysqli_query(bdconnect(),$requete);
    $reponse = mysqli_num_rows($result);
    return $reponse;
}
?>