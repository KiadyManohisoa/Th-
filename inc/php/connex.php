<?php
function bdconnect()
{
    static $connect = null;
    if ($connect === null) {
        $connect = mysqli_connect('localhost' , 'root' , '' , 'nombase');   
    }
    return $connect;
}

?>