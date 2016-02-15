<?php
  include "../../dbconnection.php" ;
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
    header("Location: accountManagement.php");
?>
