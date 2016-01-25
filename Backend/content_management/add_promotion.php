<?php

$headTo = "content_management.html";
$db_cont = "../../dbconnection.php";
if(!@file_exists("./".$db_cont) ) {
	echo 'can not include db_cont.php in add promotion';
} else {
	require("./".$db_cont);
}

$promotion_name = $_POST['promotionName'];
$book_serial_no = $_POST['book_serial_no'];
$discount = $_POST['discount'];
$promotion_detail = $_POST['promotion_detail'];

unset($_POST['promotionName']);
unset($_POST['book_serial_no']);
unset($_POST['discount']);
unset($_POST['promotion_detail']);

/*echo $promotion_name."\n";
echo $book_serial_no;
echo $discount;
echo $promotion_detail;*/

$sql = "INSERT INTO promotion (promotion_name, book_serial_no, discount,promotion_detail)
VALUES ('$promotion_name', '$book_serial_no', '$discount','$promotion_detail')";

if (mysqli_query($con, $sql)) {
	echo "New promotion created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


mysqli_close($con);
header("Location: $headTo");

?>