<?php 
include 'connex.php';

function isAdmin($nom,$mdp)
{
    $requete ="select* from The_Connection where nom = '$nom' and motDePasse = MD5('$mdp') and type='a'";
    $result=mysqli_query(bdconnect(),$requete);
    $reponse = mysqli_num_rows($result);
    return $reponse;
}
function verifLogAdmin($nom,$mdp)
{   
    $rep=array();
    if(isAdmin($nom,$mdp)==1)
    {
        $requete ="select* from The_Connection where nom = '$nom' and motDePasse = MD5('$mdp') and type='a'";
        $result=mysqli_query(bdconnect(),$requete);
        $admin=mysqli_fetch_assoc($result);
        $rep['info']=$admin
        
    }
    else{
        $rep['error']="Erreur d \'authentification";
    }
    return $rep;
}
?>