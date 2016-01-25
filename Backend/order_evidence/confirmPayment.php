<?php
include "../../dbconnection.php";

$order_id = $_POST['order_id'];

$sql = "UPDATE order_book  set payment_status = 1  WHERE order_id = '".$order_id."'  ";
// var_dump($sql);
mysqli_query($con,$sql);

header("Location: order_confirmation_management.php");

 ?>
