<?php
ob_start();
session_start();
$_SESSION['user_id'] = 1;
?>
<html>
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <script src="js/jq.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.bootpag.js"></script>
    <script src="js/jquery.bootpag.min.js"></script>

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
</head>
<body>

<div class = "container-fluid">
    <!--///////////////////////////// Start history tabel /////////////////////////// -->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <table class="table table-hover" id="order_history_list">
          <thead>
            <tr>
                <th>หมายเลขการสั่งซื้อ</th>
                <th>วันและเวลาที่ทำการสั่งซื้อ</th>
                <th>จำนวนเงิน</th>
                <th>สถานะ</th>
                <th>รายละเอียด</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>

    </div>

<!--///////////////////////////// End history tabel /////////////////////////// -->
<!--///////////////////////////// Start page selection /////////////////////////// -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="page-selection" class="pull-right"></div>
    </div></div>
<!--///////////////////////////// End page selection /////////////////////////// -->
</div>
</body>
<!--///////////////////////////// Start  history Model /////////////////////////// -->
<div class="modal fade" id="orderModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header alert alert-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ประวัติการสั่งซื้อ</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <span>หมายเลขอ้างอิงการสั่งซื้อ</span>
            <span id = "orderID"></span>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
            <span>ชื่อผู้สั่งซื้อ</span>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
            <span id="userName"></span>
            </div>
              
            <div class="col-xs-2 col-sm-2 col-md-2">
            <span>ที่อยู่ผู้ส่ง</span>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
            <span id="senderAddress"></span>
            </div>
               
            <div class="col-xs-2 col-sm-2 col-md-2">
            <span>ที่อยู่ผู้รับ</span>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
            <span id="receiverAddress"></span>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
            <span>ยอดรอม</span>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
            <span id="totalPrice"></span>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
            <span>สถานะ</span>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
            <span id="status"></span>
            </div>
            

        </div>
        <hr>

        <h3 class="bg-primary">รายการหนังสือ</h3>
        <!--///////////////////////////// Start ordered book tabel /////////////////////////// -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <table class="table table-hover" id="order_book_list">
              <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ISBN</th>
                    <th>ชื่อหนังสือ</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>

        </div>

<!--///////////////////////////// End ordered book tabel /////////////////////////// -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
    </div>
</div>
</div>
</div>
<!--///////////////////////////// End  history Model /////////////////////////// -->
</html>
<script>
var orderArray;
var totalPage;
var rowsPerpage = 20;
$(document).ready(function() {

     
});

window.onload = function() {
 $.ajax({
    url: "request_totalPageOrder.php",
    data: {
        page: 1 ,
        rowsPerpage: rowsPerpage,
    },

    type: "GET",
    dataType : "text",
    success: function( json ) {
        totalPage = parseInt(json);

        // init bootpag
      $('#page-selection').bootpag({
        total: totalPage,
        page: 1,
        maxVisible: 5,
        leaps: true,
        firstLastUse: true,
        first: '←',
        last: '→',
        wrapClass: 'pagination',
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first'
      }).on("page", function(event, num){
        getOrderHistory(num);
   });
    },

    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },


});


 getOrderHistory(1);
};

function viewHistoryModel(order_id){
    var data_detail;

    $.ajax({

    url: "request_order_detail.php",

    data: {
        order_id: order_id ,
    },

    type: "GET",
    dataType : "JSON",
    success: function( json ) {
        data_detail = json;
        $("#orderModel #orderID").text(data_detail[0]['order_id']);
        $("#orderModel #userName").text(data_detail[0]['user_fn']+" "+data_detail[0]['user_ln']);
        $("#orderModel #senderAddress").text(data_detail[0]['address']);
        $("#orderModel #receiverAddress").text(data_detail[0]['reciever_address']);
        $("#orderModel #totalPrice").text(data_detail[0]['total_price']);
        if(data_detail[0]['payment_status'] == 1)
         $("#orderModel #status").text("ชำระแล้ว");
        else
         $("#orderModel #status").text("ยังไม่ชำระ");

        var table="";

        for(var i=0; i < data_detail.length;i++){

          table += "<tr>";
          table += "<td>"+(i+1)+"</td>";
          table += "<td>"+data_detail[i]['serial_no']+"</td>";
          table += "<td>"+data_detail[i]['title']+"</td>";
          table += "<td>"+data_detail[i]['bookprice']+"</td>";
          table += "<td>"+data_detail[i]['amount']+"</td>";
          table += "<td>"+data_detail[i]['lineprice']+"</td>";

          table += "</tr>"
          $("#order_book_list > tbody ").html(table);
        }
    },

    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },


});

$("#orderModel").modal();
}

function getOrderHistory(page){
   $.ajax({

    url: "request_order_history.php",

    data: {
        page: page ,
        rowsPerpage: rowsPerpage,
    },

    type: "GET",
    dataType : "JSON",
    success: function( json ) {
        orderArray = json;
        tabledisplay(page);
    },

    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },


});
}

function tabledisplay(currentPage){
    var table = "";
    var startAt = 0;
    var endAt;

    if(currentPage == totalPage)
        endAt   = orderArray.length;
    else
        endAt   = startAt+rowsPerpage;

   for(var i =startAt; i < endAt;i++) {

      table += "<tr>";

      table += "<td>"+orderArray[i]['order_id']+"</td>";
      table += "<td>"+orderArray[i]['created_date']+"</td>";
      table += "<td>"+orderArray[i]['total_price']+"</td>";

    if( orderArray[i]['payment_status'] == 1)
      table += "<td>ชำระแล้ว</td>";
    else
      table += "<td>ยังไม่ชำระ</td>";

      table += "<td><button type='button' class='btn btn-info btn-xs'";
      table += " onclick='viewHistoryModel(\""+orderArray[i]['order_id']+"\")' ";
      table += ">ดู</button></td>";

      table += "</tr>"
    }

    $("#order_history_list > tbody ").html(table);
}
</script>