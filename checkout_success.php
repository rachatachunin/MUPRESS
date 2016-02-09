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
$user = mysqli_query($con, "select * from user where user_id = '".$_SESSION['user_id']."'");
$userinfo = mysqli_fetch_array($user);
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
      <div class="container-fluid">


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
        echo $row['amount'].' เล่ม ส่วนลด ';
        echo $row['discount'].'% เป็นจำนวนเงินทั้งหมด ';
        echo $row['dcprice'].' บาท<br>';
      }
       ?>

       <div class="pull-right">
         <br>
         <?php echo 'รวมเป็นเงินทั้งสิ้น '.$order['total_price'].' บาท'; ?>
       </div>
      </div>
        <br>
       <div class="container-fluid">
         <h4 class="lead">แบบฟอร์มส่งหลักฐานการชำระเงิน</h4><br>
         <form class="form text-center" style="width: 70%" action="evidenceDB.php" enctype="multipart/form-data" method="post">
           <div class="form-group">
               <span class="input-group-addon" id="sizing-addon3">เลขที่ของ order:</span>
               <input type="number" value="<?php echo $order['order_id']; ?>" class="form-control" placeholder="" aria-describedby="sizing-addon3" name="orderid">
           </div>
           <br>
           <div class="row">
               <div class="col-xs-6 col-sm-6 col-md-6">
                 <div class="form-group">
                   <span class="input-group-addon" id="sizing-addon1">ชื่อ</span>
                   <input type="text" name="fname" id="firstname" class="form-control input-sm" placeholder="ชื่อ" aria-describedby="sizing-addon1">
                 </div>
               </div>
               <div class="col-xs-6 col-sm-6 col-md-6">
                 <div class="form-group">
                   <span class="input-group-addon" id="sizing-addon2">นามสกุล</span>
                   <input type="text" name="lname" id="lastname" class="form-control input-sm" placeholder="นามสกุล" aria-describedby="sizing-addon2">
                 </div>
               </div>
             </div>
             <div class="input-group">
               <span class="input-group-addon" id="sizing-addon4">วันที่ชำระเงิน</span>
               <input name="date" id="datepicker" class="form-control input-sm" type="text" aria-describedby="sizing-addon4">
             </div>
             <br>
             <div class="input-group">
               <span class="input-group-addon" id="sizing-addon4">เวลาชำระเงิน</span>
               <input type="text" name="time" id="timepicker" class="form-control input-sm" aria-describedby="sizing-addon4" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"/>
             </div>
             <h7 style="font-size: 70%">*หมายเหตุ เลือกเวลาที่ใกล้เคียงแล้วสามารถแก้เป็นเวลาที่แน่นอนได้ในฟิลล์</h7>
              <br>
              <br>


             <div class="form-group">
               <span class="input-group-addon" id="sizing-addon4">ธนาคารที่โอน</span>
               <select name="bank" class="form-control input-sm" aria-describedby="sizing-addon" aria-describedby="sizing-addon4" required="ture">
                   <option disabled>เลือกธนาคาร</option>
                   <option value="kasikorn">กสิกรไทย</option>
                   <option value="kungthai">กรุงไทย</option>
               </select>
             </div>
             <br>

             <div class="row">
               <div class="col-xs-6 col-sm-6 col-md-6">
                 <div class="form-group">
                   <span class="input-group-addon" id="sizing-addon7">จำนวนเงินที่ชำระ</span>
                   <input type="number" name="amount" id="tel" class="form-control input-sm" placeholder="จำนวนเงิน" aria-describedby="sizing-addon7">
                 </div>
               </div>
             </div>
             <div class="input-group">
               <!-- <label for="file">กรุณาเลือกไฟล์ภาพหลักฐานการโอน</label> -->
               <span class="input-group-addon" id="sizing-addon7">กรุณาเลือกไฟล์ภาพหลักฐานการโอน</span>
               <input type="file" name="fileToUpload" aria-describedby="sizing-addon7">
             </div>
             <br>
             <div class="input-group">
               <!-- <label for="file">กรุณาเลือกไฟล์ภาพหลักฐานการโอน</label> -->
               <span class="input-group-addon" id="sizing-addon7">กรุณาเลือกที่อยู่จัดส่ง</span>
               <select name="addr" id="selectaddr" class="form-control input-sm" aria-describedby="sizing-addon" aria-describedby="sizing-addon4" required="ture">
                   <option disabled selected>เลือกที่อยู่ในการจัดส่ง</option>
                   <option value="1">ที่อยู่ที่ลงทะเบียนไว้</option>
                   <option value="2">ที่อยู่อื่น</option>
               </select>
             </div>
             <br>
             <textarea name="address" id="address" class="form-control" rows="5" cols="30">โปรดระบุที่อยู่ในการจัดส่ง</textarea>


             <br>

             <button class="btn btn-lg btn-primary btn-block" type="submit">ยืนยันหลักฐานการโอน</button>
         </form>
       </div>

    </div>
  </div>
</div>
</body>
</html>

<script type="text/javascript">
$(function() {
  $( "#datepicker" ).datepicker({
    changeMonth: true,
    changeYear: true,
  });
  $('#timepicker').timepicker({});
});
var standard_message = $('#address').val();
  $('#address').focus(
      function() {
          if ($(this).val() == standard_message)
              $(this).val("");
      }
  );
  $('#address').blur(
      function() {
          if ($(this).val() == "")
              $(this).val(standard_message);
      }
  );

  $("#selectaddr").on("change", function(e){
    if($(this).val()==1){
      $("#address").val("<?php echo $userinfo['address']; ?>");
    }
    else if($(this).val()==2){
      $("#address").val("");
      $("#address").focus();
    }
  });
</script>
