<?php
include "../../dbconnection.php";

$order_id = $_POST['order_id'];

$sql = "UPDATE order_book  set payment_status = 1  WHERE order_id = '".$order_id."'  ";
// var_dump($sql);
mysqli_query($con,$sql);

mysqli_query($con, "insert into sale_history (order_id) value (".$order_id.")");

$bookk = mysqli_query($con, "select * from order_book left join order_line on order_book.order_id = order_line.order_id where order_book.order_id= '".$order_id."'");

foreach($item = mysqli_fetch_array($bookk)){
    mysqli_query($con, "insert into book_stock(amount,action,book_id) values ('".$item['amount']."','OUT','".$item['book_id']."')");
    mysqli_query($con, "update current_stock set current_amount = current_amount-".$item['amount']" where book_id = '".$item['book_id']."'");
}


header("Location: order_confirmation_management.php");

 ?>
