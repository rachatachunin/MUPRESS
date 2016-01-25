<?php
include "../../dbconnection.php";
 $pe_id = $_GET['q'];
 $sql = "DELETE FROM payment_evidence WHERE pe_id = '".$pe_id."' " ;
 mysqli_query($con,$sql);
 header("Location: order_confirmation_management.php");
 ?>
