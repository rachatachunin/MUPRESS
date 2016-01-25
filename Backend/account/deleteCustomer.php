<?php
include "../../dbconnection.php";
 $user_id = $_GET['q'];
 $sql = "DELETE FROM user WHERE user_id = '".$user_id."' " ;
 mysqli_query($con,$sql);
 header("Location: accountManagement.php");


 ?>
