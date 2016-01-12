<?php

$db_cont = "../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}
$page = $_GET['page'];
$searchBy = $_GET['searchBy'];
$keyword = $_GET['keyword'];

unset($_GET['page']);
unset($_GET['searchBy']);
unset($_GET['keyword']);

$sql = "";


if($searchBy == "none" || $searchBy == "all"){
$sql = "SELECT * FROM book";
}
else{
$sql = "SELECT * FROM book WHERE $searchBy LIKE '%$keyword%' ";
}


$result = mysqli_query($con,$sql);

$data = array();


    // output data of each row
while($r = mysqli_fetch_assoc($result)) {
    $data[] = $r;
}
 


mysqli_close($con);
//print_r($data);

echo json_encode($data);



?>