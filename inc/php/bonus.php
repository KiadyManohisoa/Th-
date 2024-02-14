<?php

function surplus($poidsMin,$poidsAzo,$salKilo,$pourcentageBonus){
    $azahonaBonus=$poidsAzo-$poidsMin;
    return $azahonaBonus*$pourcentageBonus/100;
}
function sousMoins($poidsMin,$poidsAzo,$salKilo,$pourcentageMallus){
    $azahonaMallus=$poidsAzo-$poidsMin;
    return $azahonaMallus*$pourcentageMallus/100;
} 
function bonus($cueillette){
    $config=selectAll("The_ConfigPoids WHERE id in (SELECT MAX(id) FROM The_ConfigPoids)")[0];
    $salKilo=selectAll("The_SalKilo WHERE id in (SELECT MAX(id) FROM The_SalKilo)")[0];

    $cueillette['commission']=$cueillette['poids']*$salKilo['salaire'];
    if($config['poidsMinimal']==$cueillette['poids']){
        $cueillette['bonus']=0;
        $cueillette['mallus']=0;
    }
    else if($config['poidsMinimal']>$cueillette['poids']){
        $cueillette['mallus']=sousMoins($config['poidsMinimal'],$cueillette['poids'],$salKilo,$config['mallus']);
        $cueillette['bonus']=0;

    }
    else if($config['poidsMinimal']<$cueillette['poids']){
        $cueillette['bonus']=surplus($config['poidsMinimal'],$cueillette['poids'],$salKilo,$config['bonus']);
        $cueillette['mallus']=0;
    }

    return $cueillette;
}
function totalVente($dateMin,$dateMax){
    $cueillette=selectAll("The_Cueillette c natural join The_Variete v");
    $somme=0;
    foreach($cueillette as $key=>$value){
        $somme+=$value['prixVente']*$value['poids'];
    }
    return $somme;

}
function benefice($dateMin,$dateMax){
    return totalVente($dateMin,$dateMax)-totalCharges($dateMin,$dateMax);
}