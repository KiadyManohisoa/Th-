<?php 

// function nbMois($dateMin, $dateMax)
// {   
//     $dateMax = date_create(date('Y-m-d', strtotime($dateMax)));
//     $dateMin = date_create(date('Y-m-d', strtotime($dateMin)));

//     $dateInterval = date_diff($dateMax, $dateMin);
    
//     // Calcul du nombre total de mois
//     $nbMois = $dateInterval->format('%y') * 12 + $dateInterval->format('%m');
    
//     return $nbMois;
// }

function nbMois($dateMin,$dateMax, $tableauSaisons){
    $dateMax = date_create(date('Y-m-d', strtotime($dateMax)));
    $dateMin = date_create(date('Y-m-d', strtotime($dateMin)));

    $oneday = new DateInterval("P1D");
    $bool=true;

    $return=0;
    for($date=$dateMin;true;date_add($date,$oneday)){
        if($tableauSaisons!=null){
            $bool=isValueOfKeyInTab("numMois",date_format($date,'m'),$tableauSaisons);
        }
        if(date_format($date,'d')==1 && $bool){
            $return++;
        }
        if($date==$dateMax){
            break;
        }
    }

    return $return;
}
function getNbPieds($idParcelle) {

    $requeteS="select surface from The_Parcelle where id = '$idParcelle'";
    $resultS=mysqli_query(bdconnect(),$requeteS);
    $surface=mysqli_fetch_assoc($resultS);

    $requeteO="select v.occupation as occupation from The_Variete v join The_Parcelle p on p.idVariete=v.id where p.id ='$idParcelle'";
    $resultO=mysqli_query(bdconnect(),$requeteO);
    $occupation=mysqli_fetch_assoc($resultO);
    
    $nbPieds=$surface['surface']*10000/$occupation['occupation'];
    return (int) $nbPieds;
}

function rendementParcelleParMois($idParcelle)
{
    $nbPieds=getNbPieds($idParcelle); 

    $requete="select v.rendement as rendement from The_Variete v join The_Parcelle p on idVariete=v.id where p.id ='$idParcelle'";
    $result=mysqli_query(bdconnect(),$requete);
    $rendement=mysqli_fetch_assoc($result);

    $rendParcelle=$nbPieds*$rendement['rendement'];
    return $rendParcelle;
}

function sommePoidsAncienneCueillette($idParcelle,$dateCueillette)
{
    $requete="select SUM(c.poids) as somme from The_Cueillette c join The_Parcelle p on c.idParcelle=p.id where p.id ='$idParcelle' and c.dateCueillette < '$dateCueillette'";
    $result=mysqli_query(bdconnect(),$requete);
    $sommePoids=mysqli_fetch_assoc($result);
    return $sommePoids['somme'];
}

function getDateDebutPlantation ($idParcelle) {
    $requete="select p.dateDebutPlantation from The_Parcelle p where p.id ='$idParcelle'";
    $result=mysqli_query(bdconnect(),$requete);
    $date=mysqli_fetch_assoc($result);
    return $date['dateDebutPlantation'];
}

function poidsRestantParcelle($idParcelle,$dateCueillette,$tableauSaisons) {   
    $dateDebutPlantation = getDateDebutPlantation($idParcelle);
    $rendementParcelle=rendementParcelleParMois($idParcelle);
    $nbMois=nbMois($dateDebutPlantation,$dateCueillette,$tableauSaisons);
    $sommeAncienneCueillette=sommePoidsAncienneCueillette($idParcelle,$dateCueillette);
    $poidsRestantParcelle=($rendementParcelle*$nbMois)-($sommeAncienneCueillette);

    return $poidsRestantParcelle;
}

function verifValiditePoids($idParcelle,$dateCueillette,$poidsCueillette,$tableauSaisons) {
    $poidsrestant=poidsRestantParcelle($idParcelle,$dateCueillette,$tableauSaisons);
    $return=[];
    if($poidsCueillette>$poidsrestant){
        $return['error']="Le poids qu'on essaie de recuperer est trop grand pour la parcelle";
    }

    else{
        $return['message']="Réussite";
    }

    return $return;
}

function verifValiditePoids2($idParcelle,$dateCueillette,$poidsCueillette) {
    $saison=selectAll("The_MoisSaison  m natural join The_Saison s where s.id in (select max(id) from The_Saison)");
    return verifValiditePoids($idParcelle, $dateCueillette, $poidsCueillette,$saison);
}


?>