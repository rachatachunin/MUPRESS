<?php

$book = json_decode($_POST['json'],true);
$user_id = $_POST['user_id'];

include "../../dbconnection.php";
$totalprice = 0;
foreach($book as $item){
    $result = mysqli_query($con, "select price from book where book_id = ".$item['id']."");
    $priceb = mysqli_fetch_array($result);
    $totalprice += ((int)$priceb['price']*$item['amount'])*((100-(int)$item['discount'])/100);
}
//give the the buyer to be admin so user_id will be 1 and payment_status also paid (1).
mysqli_query($con, "insert into order_book(total_price,payment_status,user_id) values ('".$totalprice."',1,'".$user_id."')");
$id = mysqli_insert_id($con);

//add to sale_history
mysqli_query($con, "insert into sale_history (order_id) value (".$id.")");

//add to order_line for each item
foreach($book as $item){
    $result = mysqli_query($con, "select price from book where book_id = ".$item['id']."");
    $priceb = mysqli_fetch_array($result);
    $eachprice = ((int)$priceb['price']*$item['amount'])*((100-(int)$item['discount'])/100);
    mysqli_query($con, "insert into order_line(amount,price,book_id,order_id,discount) values ('".$item['amount']."','".$eachprice."','".$item['id']."','".$id."','".$item['discount']."')");
}

foreach($book as $item){
    mysqli_query($con, "insert into book_stock(amount,action,book_id) values ('".$item['amount']."','OUT','".$item['id']."')");
    mysqli_query($con, "update current_stock set current_amount = current_amount-".$item['amount']" where book_id = '".$item['id']."'");
}
mysqli_close($con);
var_dump(null);
