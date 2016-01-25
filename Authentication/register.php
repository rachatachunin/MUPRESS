<?php

include "../dbconnection.php";
 // var_dump($_POST['fname']);
$fn = $_POST['fname'];
$ln = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$tel = $_POST['tel'];
$address = $_POST['address'];
$gender = $_POST['gender'] ;


$sql="INSERT into user(email,password,user_fn,user_ln,gender,tel,address,user_type) values ('".$email."','".$password."','".$fn."','".$ln."','".$gender."','".$address."','".$tel."',2)";
// var_dump($sql);
mysqli_query($con,$sql);

// mysql_close();

header("Location: ../index.php");
