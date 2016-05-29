<?php

header('Content-Type: text/html; charset=iso-8859-1');
include 'settings.php';
include 'functions.php';
if (isset($_GET['id'])) {
    $vid = $_GET['id'];
    loadresult('http://'.$domain.'/api/?type=Get+US+Email+result&id='.$vid);
}
