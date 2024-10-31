<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = 'admin';
$dbname = 'paw';
$mysqli = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}