<?php
    function isIn($objet, $tableau){
        foreach($tableau as $value){
            if($value==$objet){
                return true;
            }
        }
        return false;
    }

    function isValueOfKeyInTab($key,$objet,$tableau){
        foreach($tableau as $value){
            if($value[$key]==$objet){
                return true;
            }
        }
        return false;
    }

    include 'connex.php';
    include 'admin.php'; 
    include 'utilisateur.php';
    include 'crud.php';
    include 'cueillette.php';
    include 'resultat.php';
?>