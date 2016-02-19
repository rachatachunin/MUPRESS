<?php
ob_start();
session_start();

$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}
$page = $_GET['page'];
$searchBy = $_GET['searchBy'];
$keyword = $_GET['keyword'];
$rowsPerpage	= $_GET['rowsPerpage'];
$startFrom  = ($page-1)*$rowsPerpage;

unset($_GET['page']);
unset($_GET['keyword']);
unset($_GET['searchBy']);
unset($_GET['keyword']);
unset($_GET['rowsPerpage']);

$sql = "";


if($searchBy == "" || $keyword == ""){
/*$sql = "SELECT *,CONCAT_WS(' ', user_fn, user_ln) AS author 
FROM book INNER JOIN user ON book.author_id = user.user_id
ORDER BY serial_no ASC
LIMIT $startFrom,$rowsPerpage";*/
$sql = "SELECT * FROM book
ORDER BY serial_no ASC
LIMIT $startFrom,$rowsPerpage";
}
else{
/*$sql = "SELECT *,CONCAT_WS(' ', user_fn, user_ln) AS author 
FROM book INNER JOIN user ON book.author_id = user.user_id
WHERE $searchBy LIKE '%$keyword%'
ORDER BY serial_no ASC
LIMIT $startFrom,$rowsPerpage";*/
$sql = "SELECT * FROM book
WHERE $searchBy LIKE '%$keyword%'
ORDER BY serial_no ASC
LIMIT $startFrom,$rowsPerpage";
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