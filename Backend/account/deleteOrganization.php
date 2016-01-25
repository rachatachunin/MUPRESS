<?php
include "../../dbconnection.php";
 $user_id = $_GET['q'];
 $sql = "DELETE FROM user WHERE user_id = '".$user_id."' " ;
 $sql2 = "DELETE FROM organization WHERE user_id = '".$user_id."' " ;
 mysqli_query($con,$sql);
 mysqli_query($con,$sql2);
 header("Location: accountManagement.php");


 ?>
