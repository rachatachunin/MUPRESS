<?php
$headTo = "content_management.html";
$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);

}

$promotion_id  		= $_POST['promotion_id'];
$promotion_name		= $_POST['promotionName'];
$book_serial_no 	= $_POST['book_serial_no'];
$discount 			= $_POST['discount'];
$promotion_detail	= $_POST['promotion_detail'];

unset($_POST['promotion_id']);
unset($_POST['promotionName']);
unset($_POST['book_serial_no']);
unset($_POST['discount']);
unset($_POST['promotion_detail']);


$sql ="UPDATE promotion SET promotion_name='$promotion_name', book_serial_no='$book_serial_no', discount='$discount', promotion_name='$promotion_name',promotion_detail='$promotion_detail' 
		WHERE promotion_id = '$promotion_id'";

if (mysqli_query($con, $sql)) {
    echo "The promotion is edited successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);


header("Location: $headTo");
?>