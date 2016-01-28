<?php

$db_cont = "dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$pageNum 	= $_GET['pageNumber'];
unset($_GET['pageNumber']);

if($pageNum == 1){
$sql = "SELECT * FROM book ORDER BY book_id ASC LIMIT 0,20";
}else if($pageNum == 2){
$sql = "SELECT * FROM book ORDER BY book_id ASC LIMIT 20,20";
}

$result = mysqli_query($con,$sql);
$data = array();
while($r = mysqli_fetch_assoc($result)) {
    $data[] = $r;
}
mysqli_close($con);
//print_r($data);

echo json_encode($data);
 ?>
