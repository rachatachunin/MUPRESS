<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <script src="js/jq.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
<?php include "headFrontEnd.php";
include 'dbconnection.php';
$orderid = $_GET['order_id'];
$result2 = mysqli_query($con,"select title,order_line.price as dcprice , amount,discount,book.price as bprice from order_book left join order_line on order_book.order_id = order_line.order_id left join book on order_line.book_id = book.book_id where order_book.order_id = '".$orderid."'");
$result = mysqli_query($con , "select * from order_book where order_id='".$orderid."'");
$order = mysqli_fetch_array($result);
 ?>
    <!--<link href="css/bootstrap-theme.min.css" rel="stylesheet">-->
    <title>MU PRESS</title>
    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img,h3 {
            /*width: 70%;*/
            margin: auto;
            max-width: 200;
            max-height: 200;
        }
        .thumbnail{
            background-color: lightblue;
        }
        .thumbnail > img{
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
    <script type="text/javascript">
    function validateCus(e){

      var filter = /[ก-๙a-zA-Z]/ ;
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      var firstname = document.getElementById("firstname").value ;
      var lastname = document.getElementById("lastname").value ;
      var email = document.getElementById("email").value ;
      var tel = document.getElementById("tel").value ;


      if(firstname == "" || !filter.test(firstname)){
        alert("กรุณากรอกชื่อของลูกค้าให้ถูกต้อง");
        return false ;
      }else if(lastname== "" || !filter.test(lastname) ){
        alert("กรุณากรอกนามสกุลของลูกค้าให้ถูกต้อง");
        return false ;
     }else if(email == "" || !re.test(email) ){
        alert("กรุณากรอก e-mail ของลูกค้าให้ถูกต้อง");
        return false ;
    //  }else if(address == "" ){
    //     alert("กรุณากรอกที่อยู่ลูกค้าให้ถูกต้อง");
    //     return false ;
    }else if(tel == "" || filter.test(tel) || tel.length != 10  ){
        alert("กรุณากรอกเบอร์โทรลูกค้าให้ถูกต้อง");
        return false ;
    }else{
        return true;
      }
    }
    </script>
</head>
<body>
  <?php include "header.php" ?>
  <div class="container">
  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <h3 class="panel-title">รายละเอียดการสั่งซื้อเลขที่ <?php echo $order['order_id'];?></h3>
    </div>
    <div class="panel-body" style="font-size: 90%">
      วันที่และเวลาที่ทำการสั่งซื้อ : <?php echo $order['created_date'];?><br>
      <br>
      รายละเอียดสินค้า
      <br>
      <br>

      <?php
      $counter = 0;
      while($row = mysqli_fetch_array($result2)){
        $counter++;
        echo $counter.") ";
        echo $row['title'].' ราคาเล่มละ ';
        echo $row['bprice'].' บาท จำนวน ';
        echo $row['amount'].' เล่ม ส่วนลด';
        echo $row['discount'].'% เป็นจำนวนเงินทั้งหมด ';
        echo $row['dcprice'].' บาท<br>';
      }
       ?>

       <div class="pull-right">
         <br>
         <?php echo 'รวมเป็นเงินทั้งสิ้น '.$order['total_price'].' บาท'; ?>
       </div>

    </div>
  </div>
</div>
</body>
</html>
