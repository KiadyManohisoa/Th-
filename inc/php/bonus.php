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
    $config=selectAll("The_ConfigPoids WHERE id in (SELECT MAX(id) FROM The_ConfigPoids)");
    $salkilo=selectAll("The_SalKilo WHERE id in (SELECT MAX(id) FROM The_SalKilo)");

    $cueillette['commission']=$cueillette['poids']*$salKilo;
    if($config['poidsMinimal']==$cueillette['poids']){
        $cueillette['bonus']=0;
        $cueillette['mallus']=0;
    }
    else if($poidsMin>$cueillette['poids']){
        $cueillette['mallus']=sousMoins($config['poidsMinimal'],$cueillette['poids'],$salkilo,$config['mallus']);
        $cueillette['bonus']=0;

    }
    else if($poidsMin<$cueillette['poids']){
        $cueillette['bonus']=surplus($config['poidsMinimal'],$cueillette['poids'],$salkilo,$config['bonus']);
        $cueillette['mallus']=0;

    }

}

