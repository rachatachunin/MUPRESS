<?php
$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$promotion_id 	= $_GET['promotion_id'];
unset($_GET['promotion_id']);

$sql = "SELECT * FROM promotion INNER JOIN book ON promotion.book_serial_no = book.serial_no 
WHERE promotion_id = '$promotion_id'";

$result = mysqli_query($con,$sql);
$data = array();
while($r = mysqli_fetch_assoc($result)) {
    $data[] = $r;
}
mysqli_close($con);
//print_r($data);

echo json_encode($data);
?>