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
    session_start();
    $_SESSION['login'] = 1;
    $_SESSION['username'] = $user;
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['firstname'] = $row['user_fn'];
    $_SESSION['lastname'] = $row['user_ln'];
    header("Location: ../index.php");
}else{
    echo '<script>';
    echo 'alert("Username or Password Invalid!");';
    echo 'location.href="/MUPRESS_GIT/index.php"';
    echo '</script>';
}
