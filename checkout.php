<?php
ob_start();
session_start();
//localhost:8888/MUPRESS_GIT/checkout.php?currency=THB&shipping=0&tax=0&taxRate=0&itemCount=1&item_name_1=%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%95%E0%B8%A3%E0%B8%A7%E0%B8%88%E0%B8%84%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A7%E0%B8%B4%E0%B8%99%E0%B8%B4%E0%B8%88%E0%B8%89%E0%B8%B1%E0%B8%A2%E0%B8%97%E0%B8%B2%E0%B8%87%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%81%E0%B8%9E%E0%B8%97%E0%B8%A2%E0%B9%8C+%3A+Screening+and+Diagnostic+Tests+in+Medicine&item_quantity_1=1&item_price_1=400&item_options_1=bid%3A+1
$content = $_POST;

$item_number = array();
$item = array();

for($i=1; $i < $content['itemCount'] + 1; $i++)
{
  $options = 'item_options_'.$i;

  $item_number['total'] = $i;

  $item[$i]['options'] = $content[$options];
}

$line = 0;
$totalprice = 0;


for($i=1; $i < $content['itemCount'] + 1; $i++) {
    echo "111";
    $split_options = explode(",", $item[$i]['options']);
    $split_id = explode(":", $split_options[0]);
    $split_dc = explode(":", $split_options[1]);
    $quantity =  $content['item_quantity_'.$i];
    $price = $content['item_price_'.$i];
    $totalprice = $totalprice+((int) $quantity * ((double) $price*((100.0-(int) $split_dc[1])/100.00)));
}

$user_id = $_SESSION['user_id'];
//echo $user_id;
include "dbconnection.php";

mysqli_query($con,"insert into order_book(total_price,user_id) values ('".$totalprice."','".$user_id."')");

$id = mysqli_insert_id($con);

for($i=1; $i < $content['itemCount'] + 1; $i++) {
 $split_options = explode(",", $item[$i]['options']);
 $split_id = explode(":", $split_options[0]);
 $split_dc = explode(":", $split_options[1]);
 $quantity =  $content['item_quantity_'.$i];
 $price = $content['item_price_'.$i];
 $dcprice = ((int) $quantity * ((double) $price*((100.0-(int) $split_dc[1])/100.00)));
 mysqli_query($con,"insert into order_line(amount,price,discount,book_id,order_id) values ('".$quantity."','".$dcprice."','".$split_dc[1]."','".$split_id[1]."','".$id."')");
}

mysqli_close($con);
header("Location: checkout_success.php?order_id=".$id);



 ?>
