<?php
    function isValueOfKeyInTab($key, $object, $table) { 
        foreach($table as $cle=>$value){
            if($value[$key]==$object){
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
    include 'bonus.php';
    include 'payement.php';
?>