<?php 

    function getListePayement ($dateMin,$dateMax) {
        $str = "select * from v_payement where dateCueillette>='$dateMin' and dateCueillette<='$dateMax'";
        $query = mysqli_query(bdconnect(),$str);
        $rep = array ();
        while($ligne=mysqli_fetch_assoc($query)) {
            $rep[]=$ligne;
        }
        return $rep;
    }

?>