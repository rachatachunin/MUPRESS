<?php
ob_start();
session_start();

$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$sql = "";
//$sql = "SELECT serial_no,title FROM book";

$sql = "SELECT book.serial_no AS serial_no,book.title AS title FROM book
WHERE book.serial_no NOT IN(SELECT book.serial_no  
From book INNER JOIN promotion ON book.serial_no = promotion.book_serial_no)";

$result = mysqli_query($con,$sql);
$data = array();

    // output data of each row
while($r = mysqli_fetch_assoc($result)) {
    $data[] = $r;
}
mysqli_close($con);
echo json_encode($data);

?>