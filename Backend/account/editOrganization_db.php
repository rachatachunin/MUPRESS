<?php
  include "../../dbconnection.php" ;
  $organization_name= $_POST['organization_name'];
  $userID = $_POST['id'];
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $pass = $_POST['pass'];
  $tel = $_POST['phone'];

   $queryUpdate = "UPDATE user
                  SET email = '".$email."',
                      password = '".$pass."',
                      user_fn = '".$fname."',
                      user_ln = '".$lname."',
                      gender = '".$gender."',
                      tel = '".$tel."',
                      address = '".$address."'
                  WHERE user_id = '".$userID."'
                   ";
    mysqli_query($con,$queryUpdate);
  $queryUpdateOrganizationName = "UPDATE organization SET organization_name = '".$organization_name."' WHERE user_id = '".$userID."' " ;
    mysqli_query($con,$queryUpdateOrganizationName);
    header("Location: accountManagement.php");
