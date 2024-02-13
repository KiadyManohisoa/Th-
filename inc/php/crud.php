<?php 

    function selectAll($tabName) {
        $query = "select * from $tabName";
        $result = mysqli_query(bdconnect(), $query);
        $rep = array();
        while($ligne=mysqli_fetch_assoc($result)) {
            $rep[] = $ligne;
        }
        return $rep;
    }

    function insert ($tabName,$tabAssoc) {
        $columns = '';
        $values = '';

        foreach ($tabAssoc as $key => $value) {
            $columns .= "$key, ";
            $values .= "'$value', "; 
        }

        $columns = rtrim($columns, ', ');
        $values = rtrim($values, ', ');

        $query = "insert into $tabName ($columns) values ($values)";
        $result = mysqli_query(bdconnect(),$query);
        
        if($result) {
            if(mysqli_affected_rows(bdconnect())>0) {
                return true; //success
            }
            else {
                return false;
            }
        }

    }   
?>