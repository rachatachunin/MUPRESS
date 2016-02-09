<?php

$db_cont = "dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}
$pageNum 	= $_GET['pageNumber'];
$Numperpage = $_GET['numPerpage'];
unset($_GET['pageNumber']);
$SearchKey 	= $_GET['SearchKey'];
unset($_GET['SearchKey']);

$sql = "SELECT book.book_id , title ,price, author , edition, serial_no ,recommend,image,content_preview,cs_id,current_amount FROM book LEFT JOIN current_stock on book.book_id = current_stock.book_id
        WHERE book.title LIKE '%$SearchKey%' OR book.author LIKE '%$SearchKey%' ORDER BY book.book_id DESC LIMIT 0,20";
// var_dump($sql) ;

$result = mysqli_query($con,$sql);
$data = array();
while($r = mysqli_fetch_assoc($result)) {
    $data[] = $r;
}
mysqli_close($con);

echo json_encode($data);
 ?>
