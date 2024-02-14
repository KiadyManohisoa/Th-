<?php

    function getPoidsRestantParParcelle ($dateMax) {
        $saison=selectAll("The_MoisSaison  m natural join The_Saison s where s.id in (select max(id) from The_Saison)");
        $list = selectAll("The_Parcelle");
        foreach($list as $key=>$value) {
            $list[$key]['poidsRestant'] = poidsRestantParcelle($value['id'],$dateMax,$saison);
        }
        return $list;
    }

    function sommeRestant($tabParcelle){
        $somme=0;
        foreach($tabParcelle as $key=>$value){
            $somme+=$value['poidsRestant'];
        }
        return $somme;
    }

    function calculTotalPoidsCueillette($dateMin,$dateMax){
        $requete="select SUM(c.poids) as somme from The_Cueillette c join The_Parcelle p on c.idParcelle=p.id where c.dateCueillette <= '$dateMax' and c.dateCueillette >= '$dateMin'";
        $result=mysqli_query(bdconnect(),$requete);

        if(mysqli_num_rows($result)==0){ return 0; }

        $sommePoids=mysqli_fetch_assoc($result);
        return $sommePoids['somme'];
    }

    function totalSalaire($dateMin,$dateMax){
        $salaire=selectAll("The_Cueillette");
        $somme=0;
        foreach($salaire as $key=>$value){
            $somme+=$value['commission']+$value['bonus']+$value['mallus'];

        }

        return $somme;
    }

    function totalDepenses($dateMin,$dateMax) {
        $requete="select SUM(montant) as somme from The_Depense d where d.dateDepense <= '$dateMax' AND d.dateDepense >= '$dateMin'";
        $result=mysqli_query(bdconnect(),$requete);
        if(mysqli_num_rows($result)==0){
            return 0;
        }
        $sommePoids=mysqli_fetch_assoc($result);
        return $sommePoids['somme'];
    }

    function totalCharges($dateMin,$dateMax){
        return totalSalaire($dateMin,$dateMax)+totalDepenses($dateMin,$dateMax);
    }

    function revientParKilo($dateMin,$dateMax) {

        $totalCharges = totalCharges($dateMin,$dateMax);
        $totalPoidsCueillette = calculTotalPoidsCueillette($dateMin,$dateMax);
    
        if (isset($totalPoidsCueillette) && $totalPoidsCueillette != 0) {
            return $totalCharges / $totalPoidsCueillette;
        } else {
            return 0; // ou une valeur par défaut de votre choix
        }
    }
?>