<?php
function db_query($query)
{
    $connection = db_connect();
    $result = mysqli_query($connection, $query);

    return $result;
}

function db_error()
{
    $connection = db_connect();

    return mysqli_error($connection);
}

function db_quote($value)
{
    $connection = db_connect();

    return "'".mysqli_real_escape_string($connection, $value)."'";
}

?>
