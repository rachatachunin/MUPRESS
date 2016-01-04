<?php
$con = new mysqli("localhost", "root", "root", "MU_PRESS");

header('Content-Type: text/html; charset=utf-8');
mysqli_query($con,"SET NAMES UTF8");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
date_default_timezone_set('Asia/Bangkok');

// ini_set('display_errors',1);
// error_reporting(E_ALL);
