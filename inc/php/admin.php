<?php 

function isAdmin($nom,$mdp)
{
<<<<<<< HEAD
    $requete ="select* from The_Connection where nomUser = '$nom' and motDePasse = MD5('$mdp') and type='a'";
=======
    $requete ="select* from The_Connection where nom = '$nom' and motDePasse = MD5('$mdp') and type='a'";
>>>>>>> f994ae32bb0224e872518e7db9c2f1cc11580ebd
    $result=mysqli_query(bdconnect(),$requete);
    $reponse = mysqli_num_rows($result);
    return $reponse;
}

function verifLogAdmin($nom,$mdp)
{   
    $rep=array();
    if(isAdmin($nom,$mdp)==1)
    {
<<<<<<< HEAD
        $requete ="select* from The_Connection where nomUser = '$nom' and motDePasse = MD5('$mdp') and type='a'";
=======
        $requete ="select* from The_Connection where nom = '$nom' and motDePasse = MD5('$mdp') and type='a'";
>>>>>>> f994ae32bb0224e872518e7db9c2f1cc11580ebd
        $result=mysqli_query(bdconnect(),$requete);
        $admin=mysqli_fetch_assoc($result);
        $rep['info']=$admin;
        
    }
    else{
        $rep['error']="Erreur d \'authentification";
    }
    return $rep;
}

?>