<?php
ob_start();
session_start();

$db_cont = "dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
	echo 'can not include db_cont.php';
} else {
	require("./".$db_cont);
}
$order_id	  = $_GET['order_id'];
$user_id	  = $_SESSION['user_id'];

unset($_GET['order_id']);


$sql = "";
$sql =  "SELECT order_book.order_id, user.user_fn,user.user_ln,user.address,order_book.reciever_address,order_book.total_price,order_book.payment_status,book.serial_no,book.title,order_line.price AS lineprice,book.price AS bookprice,order_line.amount
FROM `order_line` 
INNER JOIN order_book On order_line.order_id = order_book.order_id
INNER JOIN book		  On order_line.book_id	 = book.book_id
INNER JOIN user		  On user.user_id		 = order_book.user_id
WHERE order_book.user_id = $user_id AND order_book.order_id = $order_id";

$result = mysqli_query($con,$sql);
$data = array();

    // output data of each row
while($r = mysqli_fetch_assoc($result)) {
	$data[] = $r;
}

mysqli_close($con);

echo json_encode($data);
?>