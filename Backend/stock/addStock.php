<?php

$amount = $_GET['amount'];
$book = $_GET['bookid'];

include "../../dbconnection.php";

$sql="INSERT into book_stock(amount,action,book_id) values ('".$amount."','IN','".$book."')";

mysqli_query($con,$sql);

mysqli_close($con);

header("Location: stock.php");

?>