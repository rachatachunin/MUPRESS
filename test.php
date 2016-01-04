<?php
include "dbconnection.php";

$sql = "SELECT * FROM book";
$allBook = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($allBook)){
      echo $row['title'];

}



 ?>
