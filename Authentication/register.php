<?php
ob_start();
session_start();
include "../dbconnection.php";
include "../headFrontEnd.php";

$fn = $_POST['fname'];
$ln = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$tel = $_POST['tel'];
$address = $_POST['address'];
$gender = $_POST['gender'] ;

$sqlChecking = "SELECT * from user WHERE email = '".$email."' AND password = '' ";
$count  = mysqli_query($con,$sqlChecking);


if(mysqli_num_rows($count) > 0){
  $UP = mysqli_fetch_array($count);
  $sum ;
  for($i = 0 ; $i <  strlen ($UP['tel'] ) ; $i++){
    $sum += intval($UP['tel'][$i]);
  }
  $newpass = "MUP".$sum ;

  $sqlUpdatePass = "UPDATE user SET password = '".$newpass."' WHERE user_id = '".$UP['user_id']."'  " ;
  // var_dump($sqlUpdatePass);
  mysqli_query($con,$sqlUpdatePass);

$_SESSION['Modelon'] = 1;
header("Location: ../index.php");

// header("Location: ../index.php");
}else if(mysqli_num_rows($count) == 0){

$sql="INSERT into user(email,password,user_fn,user_ln,gender,tel,address,user_type) values ('".$email."','".$password."','".$fn."','".$ln."','".$gender."','".$address."','".$tel."',2)";
// var_dump($sql);
mysqli_query($con,$sql);


$_SESSION['login'] = 1;
$_SESSION['username'] = $email;
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['firstname'] = $row['user_fn'];
$_SESSION['lastname'] = $row['user_ln'];
// mysql_close();
header("Location: ../index.php");
}

?>
