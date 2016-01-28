<?php
ob_start();
session_start();
//localhost:8888/MUPRESS_GIT/checkout.php?currency=THB&shipping=0&tax=0&taxRate=0&itemCount=1&item_name_1=%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%95%E0%B8%A3%E0%B8%A7%E0%B8%88%E0%B8%84%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A7%E0%B8%B4%E0%B8%99%E0%B8%B4%E0%B8%88%E0%B8%89%E0%B8%B1%E0%B8%A2%E0%B8%97%E0%B8%B2%E0%B8%87%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%81%E0%B8%9E%E0%B8%97%E0%B8%A2%E0%B9%8C+%3A+Screening+and+Diagnostic+Tests+in+Medicine&item_quantity_1=1&item_price_1=400&item_options_1=bid%3A+1
$content = $_POST;
for($i=1; $i < $content['itemCount'] + 1; $i++) {
 $quantity =  $content['item_quantity_'.$i];
 $price = $content['item_price_'.$i];
 $totalprice =+ ((int) $quantity * (double) $price);
}
$user_id = $_SESSION['user_id'];
//echo $user_id;
include "dbconnection.php";

mysqli_query($con,"insert into order_book(total_price,user_id) values ('".$totalprice."','".$user_id."')");
$id = mysqli_insert_id($con);

for($i=1; $i < $content['itemCount'] + 1; $i++) {
 $quantity =  $content['item_quantity_'.$i];
 $price = $content['item_price_'.$i];
 $book_id = substr($content['item_options_'.$i], -1);
 mysqli_query($con,"insert into order_line(amount,price,discount,book_id,order_id) values ('".$quantity."','".$price."','0','".$book_id."','".$id."')");
}

mysqli_close($con);
header("Location: index.php");
//var_dump($content);


 ?>
