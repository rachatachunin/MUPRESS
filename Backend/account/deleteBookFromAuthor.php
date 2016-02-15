<?php
include "../../dbconnection.php";
 $user_id = $_GET['user'];
 $book_id = $_GET['book'];
 $sql = "DELETE FROM book_author WHERE user_id = '".$user_id."' AND book_id = '".$book_id."'  " ;

 mysqli_query($con,$sql);
 header("Location: accountManagement.php");


 ?>
