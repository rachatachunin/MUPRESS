<?php
  include "../../dbconnection.php" ;
  $id = $_GET['id'];

   $queryUpdate = "UPDATE user
                  SET user_type = 3
                  WHERE user_id = '".$id."'
                   ";
                  //  var_dump($queryUpdate);
    mysqli_query($con,$queryUpdate);
    header("Location: accountManagement.php");
?>
