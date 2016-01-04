<?php

$book = json_decode($_POST['json'],true);

include "../../dbconnection.php";
$totalprice = 0;
foreach($book as $item){
    $result = mysqli_query($con, "select price from book where book_id = ".$item['id']."");
    $priceb = mysqli_fetch_array($result);
    $totalprice += ((int)$priceb['price']*$item['amount']);
}

mysqli_query($con, "insert into order_book(total_price,payment_status,user_id) values ('".$totalprice."',1,1)");
$id = mysqli_insert_id($con);
mysqli_query($con, "insert into sale_history (order_id) value (".$id.")");
mysqli_close($con);
var_dump(null);