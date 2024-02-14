<?php

function surplus($poidsMin,$poidsAzo,$salKilo,$pourcentageBonus){
    $azahonaBonus=$poidsAzo-$poidsMin;
    echo "AZAHONA:".$azahonaBonus;
    $salaire=$salKilo['salaire']*$azahonaBonus;
    echo "Salaire".$salaire;
    return $salaire*($pourcentageBonus/100);
}
function sousMoins($poidsMin,$poidsAzo,$salKilo,$pourcentageMallus){
    $azahonaMallus=$poidsAzo-$poidsMin;
    echo "AZAHONA:".$azahonaMallus;
    $salaire=$salKilo['salaire']*$azahonaMallus;
    echo "Salaire".$salaire;
    return $salaire*($pourcentageMallus/100);
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
        echo("MALLUS".$cueillette['mallus']);
        $cueillette['bonus']=0;

    }
    else if($config['poidsMinimal']<$cueillette['poids']){
        $cueillette['bonus']=surplus($config['poidsMinimal'],$cueillette['poids'],$salKilo,$config['bonus']);
        $cueillette['mallus']=0;
    }

    return $cueillette;
}
function totalVente($dateMin,$dateMax){
    $cueillette=selectAll("The_Cueillette c join The_Parcelle p on p.id=c.idParcelle join The_Variete v on p.idVariete = v.id");
    $somme=0;
    foreach($cueillette as $key=>$value){
        $somme+=$value['prixVente']*$value['poids'];
    }
    return $somme;

}
function benefice($dateMin,$dateMax){
    return totalVente($dateMin,$dateMax)-totalCharges($dateMin,$dateMax);
}