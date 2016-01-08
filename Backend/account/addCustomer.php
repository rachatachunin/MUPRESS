<?php
  include "../../dbconnection.php" ;

  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $pass = $_POST['pass'];
  $tel = $_POST['phone'];
  //  var_dump($pass);

  $query = "INSERT into user (email,password,user_fn,user_ln,gender,tel,address,user_type) values('".$email."','".$pass."','".$fname."','".$lname."','".$gender."','".$tel."','".$address."','2') " ;
  mysqli_query($con,$query);


  header('Location: accountManagement.php');

 ?>
