<?php
function bdconnect()
{
    static $connect = null;
    if ($connect === null) {
        $connect = mysqli_connect('192.168.82.45' , 'kiady' , '' , 'the');   
    }
    return $connect;
}

?>