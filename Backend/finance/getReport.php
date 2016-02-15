<?php
$id = $_GET['q'];
include "../../dbconnection.php";
//echo date('m', strtotime($id));
//echo strtotime($id);
//echo strlen($id);

if(strlen($id)==4){
  $totalp =0 ;
  $totala =0 ;
  $rpt = mysqli_query($con,"select sale_history.created_date, sum(order_line.price) as eprice, sum(order_line.amount) as eamount,order_line.discount , order_line.book_id, book.title from sale_history left join order_book on sale_history.order_id = order_book.order_id left join order_line on order_book.order_id = order_line.order_id left join book on order_line.book_id = book.book_id
  where YEAR(sale_history.created_date) = ".date('Y', strtotime($id))."
  group by order_line.book_id, order_line.discount");
  echo '<table class="table borderless">';
  while($his = mysqli_fetch_array($rpt)){
      echo '<tr>';
          echo '<td>'.$his['title'].'</td>';
          echo '<td>'.'ส่วนลด '.$his['discount'].' %</td>';
          echo '<td>ขายไปแล้ว '.$his['eamount'].' เล่ม</td>';
          echo '<td>รวม '.$his['eprice'].' บาท</td>';
      echo '</tr>';
      $totalp += $his['eprice'];
      $totala += $his['eamount'];
  }
  echo '</table>';
  if(mysqli_num_rows($rpt) > 0){
    echo '<div class="pull-right">ขายได้รวมทั้งหมด '.$totalp.' บาท จำนวน '.$totala.' เล่ม</div>';
  }
  else{
    echo '<h4 class="lead">ยังไม่มีรายงานการขายของปีนี้</h4>';
  }
}
elseif (strlen($id)>4) {
  $totalp =0 ;
  $totala =0 ;
  $rpt = mysqli_query($con,"select DATE_FORMAT(sale_history.created_date,'%m-%d-%Y') as datef, sum(order_line.price) as eprice, sum(order_line.amount) as eamount,order_line.discount , order_line.book_id, book.title from sale_history left join order_book on sale_history.order_id = order_book.order_id left join order_line on order_book.order_id = order_line.order_id left join book on order_line.book_id = book.book_id
  where MONTH(sale_history.created_date) = ".date('m', strtotime($id))." AND YEAR(sale_history.created_date) = ".date('Y', strtotime($id))."
  group by order_line.book_id, order_line.discount, DATE(sale_history.created_date)");
  echo '<table class="table borderless">';
  while($his = mysqli_fetch_array($rpt)){
      echo '<tr>';
          echo '<td>'.$his['datef'].'</td>';
          echo '<td>'.$his['title'].'</td>';
          echo '<td>'.'ส่วนลด '.$his['discount'].' %</td>';
          echo '<td>ขายไปแล้ว '.$his['eamount'].' เล่ม</td>';
          echo '<td>รวม '.$his['eprice'].' บาท</td>';
      echo '</tr>';
      $totalp += $his['eprice'];
      $totala += $his['eamount'];
  }
  echo '</table>';
  if(mysqli_num_rows($rpt) > 0){
    echo '<div class="pull-right">ขายได้รวมทั้งหมด '.$totalp.' บาท จำนวน '.$totala.' เล่ม</div>';
  }
  else{
    echo '<h4 class="lead">ยังไม่มีรายงานการขายของปีนี้</h4>';
  }
}
