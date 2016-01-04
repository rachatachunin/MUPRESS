<?php


include "../dbconnection.php";

$fn = $_POST['fname'];
$ln = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$tel = $_POST['tel'];

$sql="INSERT into user(email,password,user_fn,user_ln,tel,user_type) values ('".$email."','".$password."','".$fn."','".$ln."','".$tel."',2)";
mysqli_query($con,$sql);

mysql_close();

header("Location: ../index.php");
