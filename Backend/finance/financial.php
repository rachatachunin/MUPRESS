<!DOCTYPE html>
<html>
<head>
    <title>Financial management</title>
    <?php
        include "../../head.php";
    ?>
    <style type="text/css">
        .borderless tbody tr td, .borderless tbody tr th, .borderless thead tr th {
            border: none;
        }
    </style>
</head>
<?php
    include "../../dbconnection.php";

    //$allhis = mysqli_query($con,"select * from sale_history where created_date >= CURDATE() AND created_date < CURDATE() + INTERVAL 1 DAY");
    $allhis = mysqli_query($con,"select sale_history.created_date, sum(order_line.price) as eprice, sum(order_line.amount) as eamount , order_line.book_id, book.title from sale_history left join order_book on sale_history.order_id = order_book.order_id left join order_line on order_book.order_id = order_line.order_id left join book on order_line.book_id = book.book_id where sale_history.created_date > CURRENT_DATE group by order_line.book_id");
?>
<body>
<?php include "../header.php" ?>
<div class="container-fluid" id="navv" style="text-align: center;">
    <h2 class="lead">Financial Management</h2>
</div>

<div class="container" id="nav-bar" style="text-align: center;">
  <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="financial.php">รายงานของวันนี้</a></li>
      <li role="presentation"><a href="financehis.php">รายงานย้อยหลัง</a></li>
      <li role="presentation"><a href="financeadd.php">เพิ่มรายการขายจากช่องทางอื่น</a></li>
  </ul>
</div>

<div class="container" style="text-align: center;">
    <h3 class="lead">รายงานการขายของวันนี้</h3>
    <table class="table borderless">
      <?php

           while($his = mysqli_fetch_array($allhis)){
               echo '<tr>';
                   echo '<td>'.$his['title'].'</td>';
                   echo '<td>ขายไปแล้ว '.$his['eamount'].' เล่ม</td>';
                   echo '<td>รวม '.$his['eprice'].' บาท</td>';
               echo '</tr>';
               $totalp += $his['eprice'];
               $totala += $his['eamount'];
           }

      ?>
    </table>
    <?php
    if(mysqli_num_rows($his) > 0){
      echo '<div class="pull-right">ขายได้รวมทั้งหมด '.$totalp.' บาท จำนวน '.$totala.' เล่ม</div>';
    }
    else{
      echo '<h4 class="lead">ยังไม่มีรายงานการขายของวันนี้</h4>';
    }
    ?>
</div>


</body>
</html>
