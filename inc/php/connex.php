<?php
function bdconnect()
{
    static $connect = null;
    if ($connect === null) {
        $connect = mysqli_connect('172.20.0.167' , 'ETU002375' , 'zCjqpVd6Zsqt' , 'db_p16_ETU002375');   
    }
    return $connect;
}

?>