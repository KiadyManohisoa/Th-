<?php
function bdconnect()
{
    static $connect = null;
    if ($connect === null) {
        $connect = mysqli_connect('172.20.6.164' , 'kiady' , '' , 'the');   
    }
    return $connect;
}

?>