<?php
function surplus($poidsMin,$poidsAzo,$salKilo,$pourcentageBonus){
    $azahonaBonus=$poidsAzo-$poidsMin;
    return $azahonaBonus*$pourcentageBonus/100;
}
function sousMoins($poidsMin,$poidsAzo,$salKilo,$pourcentageMallus){
    $azahonaMallus=$poidsAzo-$poidsMin;
    return $azahonaMallus*$pourcentageMallus/100;
} 

