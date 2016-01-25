<?php
  include "../../dbconnection.php" ;
  $organization_name = $_POST['organization'];
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  // $pass = $_POST['pass'];
  $tel = $_POST['phone'];

// add to user table
  $query = "INSERT into user (email,password,user_fn,user_ln,gender,tel,address,user_type) values('".$email."',null,'".$fname."','".$lname."','NA','".$tel."','".$address."','3') " ;
  mysqli_query($con,$query);

// get user id
  $user_id = $con->insert_id;

  // add to organization table
  mysqli_query($con,"INSERT into organization (organization_name,user_id) values('".$organization_name."','".$user_id."') " ) ;

  header('Location: accountManagement.php');

 ?>
