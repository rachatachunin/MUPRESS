<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);
$user = $_POST['username'];
$ps = $_POST['password'];
//echo $user;
//echo $ps;
include '../dbconnection.php';


$sql = "Select * from user where email = '".$user."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

if($row['password']==$ps&&$row['user_type']==1)
{

    header("Location: ../Backend/admin.php");
}
if($row['password']==$ps&&$row['user_type']==2)
{
    ob_start();
    session_start();
    $_SESSION['login'] = 1;
    $_SESSION['username'] = $user;
    $_SESSION['firstname'] = $row['user_fn'];
    $_SESSION['lastname'] = $row['user_ln']
    header("Location: ../index.php");
}
