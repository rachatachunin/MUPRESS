<?php
include "../../dbconnection.php";
 $user_id = $_GET['q'];
 $sql = "UPDATE user set user_type = 2 WHERE user_id = '".$user_id."' " ;
 mysqli_query($con,$sql);
 header("Location: accountManagement.php");


 ?>
