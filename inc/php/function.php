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
<<<<<<< HEAD
    include 'payement.php';
=======
    include 'bonus.php';
>>>>>>> 09b6ea12e9884d9ebcf78b6eb5e69b27fd76f801
?>