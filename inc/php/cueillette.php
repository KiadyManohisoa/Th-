<?php 
function nbMois($dateMin, $dateMax)
{   
    $dateMax = date_create(date('Y-m-d', strtotime($dateMax)));
    $dateMin = date_create(date('Y-m-d', strtotime($dateMin)));

    $dateInterval = date_diff($dateMax, $dateMin);
    
    // Calcul du nombre total de mois
    $nbMois = $dateInterval->format('%y') * 12 + $dateInterval->format('%m');
    
    return $nbMois;
}
function getNbPieds($idParcelle){

    $requeteS="select surface from The_Parcelle where id = '$idParcelle'";
    $resultS=mysqli_query(bdconnect(),$requeteS);
    $surface=mysqli_fetch_assoc($resultS);

    $requeteO="select v.occupation from The_Variete v natural join The_Parcelle p where p.id ='$idParcelle'";
    $resultO=mysqli_query(bdconnect(),$requeteO);
    $occupation=mysqli_fetch_assoc($resultS);
    
    $nbPieds=$surface/$occupation;
    return $nbPieds;
}
function rendementParcelleParMois($idParcelle)
{
    $nbPieds=getNbPieds($idParcelle); 

    $requete="select v.rendement from The_Variete v natural join The_Parcelle p where p.id ='$idParcelle'";
    $result=mysqli_query(bdconnect(),$requete);
    $rendement=mysqli_fetch_assoc($result);

    $rendParcelle=$nbPieds*$rendement;
}
function sommePoidsAncienneCueillette($idParcelle,$dateCueillette)
{
    $requete="select SUM(c.poids) from The_Cueillette c natural join The_Parcelle p where p.id ='$idParcelle' and c.dateCueillette < '$dateCueillette'";
    $result=mysqli_query(bdconnect(),$requete);
    $sommePoids=mysqli_fetch_assoc($result);
    return $sommePoids;
}
function poidsRestantParcelle($idParcelle,$dateDebutPlantation,$dateCueillette,$poidsCueillette)
{
    $rendementParcelle=rendementParcelleParMois($idParcelle);
    $nbMois=nbMois($dateDebutPlantation,$dateCueillette);
    $sommeAncienneCueillette=sommePoidsAncienneCueillette($idParcelle,$dateCueillette);
    $poidsRestantParcelle=($rendementParcelle*$nbMois)-($sommeAncienneCueillette-$poidsCueillette);

    return $poidsRestantParcelle;
}


?>