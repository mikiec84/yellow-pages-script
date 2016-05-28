<?php

function db_connect()
{
    static $connection;
    if (!isset($connection)) {
        $host = 'localhost';
        $username = '*****';
        $password = '*****';
        $dbname = '*****';
        $connection = mysqli_connect($host, $username, $password, $dbname);
    }
    if ($connection === false) {
        return mysqli_connect_error();
    }

    return $connection;
}
