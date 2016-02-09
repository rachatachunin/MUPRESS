<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <!-- <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/index.css" rel="stylesheet">
    <script src="../../js/jq.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.bootpag.js"></script>
    <script src="../../js/jquery.bootpag.min.js"></script> -->

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

    <?php
        include "../../head.php";
    ?>
</head>

<body>

<!--///////////////////////////// Start  page header ///////////////////////// -->

  <?php include "../header.php" ?>
    <div class = "container-fluid ">
      <!--///////////////////////////// End page header /////////////////////////// -->

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
          <h1>การจัดการเนื้อหา</h1>
        </div>
      </div>


      <ul class="nav nav-tabs" id="contentlist">
        <li class="active" onclick="selectPromotion()"><a data-toggle="tab" href="#home">โปรโมชั่น</a></li>
        <li><a data-toggle="tab" onclick="selectNews()" href="#menu1">ข่าวสาร</a></li>
        <li><a data-toggle="tab" onclick="selectActivities()" href="#menu2">กิจกรรม</a></li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <!--///////////////////////////// Start div promotion ///////////////////////// -->
          <div class="row">
            <div class="label label-primary col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
              <h3>โปรโมชั่น</h3>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
              <!-- Start add promotion trigger modal -->
              <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addPromotionModel">
                เพิ่มโปรโมชั่น
              </button>
              <!-- END add promotion trigger modal -->

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
                <h3>รายการโปรโมชั่น</h3>
                <table class="table table-hover" id="promotion_list">
                  <thead>
                    <tr>
                      <th></th>
                      <th>ชื่อโปรโมชั่น</th>
                      <th>ชื่อหนังสือ</th>
                      <th>ส่วนลด</th>
                      <th>รายละเอียด</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>

              </div>
            </div>

          </div>
                <!--///////////////////////////// Start page selection /////////////////////////// -->
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div id="page-selection1" class="pull-right"></div>
          </div></div>
      <!--///////////////////////////// End page selection /////////////////////////// -->
        </div>
        <!--///////////////////////////// End div promotion /////////////////////////// -->
        <!--///////////////////////////// Start div  News/////////////////////////// -->
        <div id="menu1" class="tab-pane fade">
          <div class="row">
            <div class="label label-info col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="margin-top: 20px">
              <h3>ข่าวสาร</h3>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">

              <!-- Start add news trigger modal -->
              <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addNewsModal">
                เพิ่มข่าวสาร
              </button>
              <!-- END add news trigger modal -->

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
                <h3>รายการข่าวสาร</h3>

                <table class="table table-hover" id="news_list">
                  <thead>
                    <tr>
                      <th></th>
                      <th>ชื่อข่าวสาร</th>
                      <th>รายละเอียดข่าวสาร</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

            </div>


          </div>
      <!--///////////////////////////// Start page selection /////////////////////////// -->
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div id="page-selection2" class="pull-right"></div>
          </div></div>
      <!--///////////////////////////// End page selection /////////////////////////// -->
        </div>
        <!--///////////////////////////// End news////////////////////////// -->
        <!--///////////////////////////// Start div activities/////////////////////////// -->
        <div id="menu2" class="tab-pane fade">
          <div class="row">
            <div class="label label-warning col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="margin-top: 20px">
              <h3>กิจกรรม</h3>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">

              <!-- Start add news trigger modal -->
              <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addActivitiesModel">
                เพิ่มกิจกรรม
              </button>
              <!-- END add news trigger modal -->

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
                <h3>รายการกิจกรรม</h3>

                <table class="table table-hover" id="activities_list">
                  <thead>
                    <tr>
                      <th></th>
                      <th>ชื่อกิจกรรม</th>
                      <th>วันเริ่ม</th>
                      <th>วันสิ้นสุด</th>
                      <th>รายละเอียดกิจกรรม</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

            </div>

          </div>

      <!--///////////////////////////// Start page selection /////////////////////////// -->
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div id="page-selection3" class="pull-right"></div>
          </div></div>
      <!--///////////////////////////// End page selection /////////////////////////// -->
        </div>
        <!--///////////////////////////// End activities////////////////////////// -->

      </div> <!--//////// End tab content //////////////// -->


    </div>  <!--///////////////////// End container ////////////////// -->


</body>

<!--//////////////////////////// Modal add promotion ///////////////////////////////////////////////-->
<div class="modal fade" id="addPromotionModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มโปรโมชั่น</h4>
      </div>
      <div class="modal-body">

        <form name="addPromotionForm" method="post" onsubmit="return validatePromotion('add')" action="add_promotion.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="book">ชื่อโปรโมชั่น</label>
            <input type="text" class="form-control" name="promotionName" required>
          </div>
          <div class="form-group" id="book_serialno">

          </div>
          <div class="form-group">
            <label for="discount">ส่วนลด</label>
            <div class="input-group">
              <input type="text" class="form-control" name="discount" placeholder="ลด" required>
              <div class="input-group-addon">%</div>
            </div>
          </div>
          <div class="form-group">
            <label for="promotion_detail">รายละเอียดโปรโมชั่น</label>
            <textarea  class="form-control" name="promotion_detail" placeholder="รายละเอียดโปรโมชั่น"></textarea>
          </div>
          <div class="form-group">
            <label for="file">กรุณาเลือกไฟล์</label>
            <input type="file" id="fileToUpload" name="fileToUpload">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
          <button type="submit" class="btn btn-success">เพิ่ม</button>
        </div>
      </form>

    </div>
  </div>
</div>
</div>
<!--//////////////////////////// END Modal add promotion ///////////////////////////////////////////////-->
<!--//////////////////////////// Start Modal add news ////////////////////////////////////////-->
<div class="modal fade" id="addNewsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มข่าวสาร</h4>
      </div>
      <div class="modal-body">

        <form method="post" action="add_news.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="news_name">ชื่อข่าวสาร</label>
          <input type="text" class="form-control" name="news_name" required>
        </div>
        <div class="form-group">
          <label for="news_detail">รายละเอียดข่าวสาร</label>
          <textarea  class="form-control" name="news_detail"  required></textarea>
        </div>
        <div class="form-group">
          <label for="fileToUpload">รูปภาพประกอบข่าวสาร</label>
          <input type="file" id="fileToUpload" name="fileToUpload">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success">เพิ่ม</button>
      </div>
    </form>

  </div>
</div>
</div>
</div>
<!--//////////////////////////// END Modal add news ////////////////////////////////////////-->

<!--//////////////////////////// Start Modal add activities ////////////////////////////////////////-->
<div class="modal fade" id="addActivitiesModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มกิจกรรม</h4>
      </div>
      <div class="modal-body">

        <form method="post" action="add_activities.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="activitiesName">ชื่อกิจกรรม</label>
          <input type="text" class="form-control" name="activitiesName" placeholder="ชื่อของกิจกรรม" >
        </div>
         <div class="form-group">
          <label for="startDate">วันที่กิจกรรมเเริ่ม</label>
          <input type="date" class="form-control" name="startDate" >
        </div>
        <div class="form-group">
          <label for="endDate">วันที่กิจกรรมเสิ้นสุด</label>
          <input type="date" class="form-control" name="endDate" >
        </div>
        <div class="form-group">
          <label for="activitiesDetail">รายละเอียดกิจกรรม</label>
          <textarea  class="form-control" name="activitiesDetail" placeholder="รายละเอียดกิจกรรม"></textarea>
        </div>
        <div class="form-group">
          <label for="fileToUpload">รูปภาพประกอบกิจกรรม</label>
          <input type="file" id="fileToUpload" name="fileToUpload">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success">เพิ่ม</button>
      </div>
    </form>

  </div>
</div>
</div>
</div>
<!--//////////////////////////// END Modal add activities ////////////////////////////////////////-->

<!--//////////////////////////// Modal Edit promotion ///////////////////////////////////////////////-->
<div class="modal fade" id="editpromotionmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายละเอียดโปรโมชั่น</h4>
      </div>
      <div class="modal-body">

         <form name="editPromotionForm" onsubmit="return validatePromotion('edit')" method="post" action="edit_promotion.php" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control hide" name="promotion_id">
          </div>
          <div class="form-group">
            <label for="book">ชื่อโปรโมชั่น</label>
            <input type="text" class="form-control" name="promotionName" placeholder="หนังสือที่ต้องการจัดรายการ" required>
          </div>
          <div class="form-group">
            <label for="book">ชื่อหนังสือ</label>
            <input type="text" class="form-control" name="book_name" readonly="readonly">
            <input type="text" class="form-control hide" name="book_serial_no">
          </div>
          <div class="form-group">
            <label for="discount">ส่วนลด</label>
            <div class="input-group">
              <input type="text" class="form-control" name="discount" placeholder="ลด" required>
              <div class="input-group-addon">%</div>
            </div>
          </div>
          <div class="form-group">
            <label for="promotion_detail">รายละเอียดโปรโมชั่น</label>
            <textarea  class="form-control" name="promotion_detail" placeholder="รายละเอียดโปรโมชั่น"></textarea>
          </div>
          <div>
            <label for="oldimage">รูปภาพปัจจุบัน</label>
            <div id="Imagedisplay"></div>
          </div>
          <div class="form-group">
            <label for="fileToUpload">กรุณาเลือกไฟล์</label>
            <input type="file" id="fileToUpload" name="fileToUpload">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success">แก้ไข</button>
      </div>
         </form>

    </div>
  </div>
  </div>
</div>
<!--//////////////////////////// END Modal Edit promotion ///////////////////////////////////////////////-->
<!--//////////////////////////// Modal Edit news ///////////////////////////////////////////////-->
<div class="modal fade" id="editNewsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายละเอียดข่าวสาร</h4>
      </div>
      <div class="modal-body">

         <form method="post" action="edit_news.php" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control hide" name="news_id">
          </div>
          <div class="form-group">
          <label for="news_name">ชื่อข่าวสาร</label>
          <input type="text" class="form-control" name="news_name" required>
        </div>
        <div class="form-group">
          <label for="news_detail">รายละเอียดกิจกรรม</label>
          <textarea  class="form-control" name="news_detail"  required></textarea>
        </div>
        <div class="form-group">
          <label for="fileToUpload">รูปภาพประกอบข่าวสาร</label>
          <input type="file" id="fileToUpload" name="fileToUpload">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success">แก้ไข</button>
      </div>
         </form>

    </div>
  </div>
  </div>
</div>
<!--//////////////////////////// END Modal Edit news ///////////////////////////////////////////////-->

<!--//////////////////////////// Modal Edit activities ///////////////////////////////////////////////-->
<div class="modal fade" id="editActivitiesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายละเอียดกิจกรรม</h4>
      </div>
      <div class="modal-body">

         <form method="post" action="edit_activities.php" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control hide" name="activities_id">
          </div>
          <div class="form-group">
          <label for="activitiesName">ชื่อกิจกรรม</label>
          <input type="text" class="form-control" name="activitiesName" placeholder="ชื่อของกิจกรรม" >
        </div>
         <div class="form-group">
          <label for="startDate">วันที่กิจกรรมเเริ่ม</label>
          <input type="date" class="form-control" name="startDate" >
        </div>
        <div class="form-group">
          <label for="endDate">วันที่กิจกรรมเสิ้นสุด</label>
          <input type="date" class="form-control" name="endDate" >
        </div>
        <div class="form-group">
          <label for="activitiesDetail">รายละเอียดกิจกรรม</label>
          <textarea  class="form-control" name="activitiesDetail" placeholder="รายละเอียดกิจกรรม"></textarea>
        </div>
        <div class="form-group">
          <label for="fileToUpload">รูปภาพประกอบกิจกรรม</label>
          <input type="file" id="fileToUpload" name="fileToUpload">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success">แก้ไข</button>
      </div>
         </form>

    </div>
  </div>
  </div>
</div>
<!--//////////////////////////// END Modal Edit activities ///////////////////////////////////////////////-->

<!--//////////////////////////// Start Modal Delete promotion ///////////////////////////////////////////////-->
<div class="modal fade" id="deletepromotion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert alert-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">คุณต้องการลบโปรโมชั่นนี้หรือไม่</h4>
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success" id="bookdelete"
        onclick="window.location.href='delete_promotion.php?promotion_id=' + this.value" >ตกลง</button>
      </div>
  </div>
  </div>
</div>
<!--//////////////////////////// END Modal Delete promotion ///////////////////////////////////////////////-->
<!--//////////////////////////// Start Modal Delete news ///////////////////////////////////////////////-->
<div class="modal fade" id="deleteNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert alert-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">คุณต้องการลบข่าวสารนี้หรือไม่</h4>
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success" id="newsIdToDelete"
        onclick="window.location.href='delete_news.php?news_id=' + this.value" >ตกลง</button>
      </div>
  </div>
  </div>
</div>
<!--//////////////////////////// END Modal Delete news ///////////////////////////////////////////////-->

<!--//////////////////////////// Start Modal Delete activities ///////////////////////////////////////////////-->
<div class="modal fade" id="deleteActivitiesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert alert-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">คุณต้องการลบกิจกรรมนี้หรือไม่</h4>
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success" id="activitiesIdToDelete"
        onclick="window.location.href='delete_activities.php?activities_id=' + this.value" >ตกลง</button>
      </div>
  </div>
  </div>
</div>
<!--//////////////////////////// END Modal Delete activities ///////////////////////////////////////////////-->
<script>
var list;
var totalPagePromotion;
var totalPageNews;
var totalPageActivities;
var rowsPerpage = 20;

$(document).ready(function() {


});

window.onload = function() {

  getTotalPagePromotion();
  getTotalPageNews();
  getTotalPageActivities();
  getajax(1,"none",null,"select_promotion.php");
  getBookName();
};
function selectPromotion(){
  getajax(1,"none",null,"select_promotion.php");
}
function selectNews(){
  getajax(1,"none",null,"select_news.php");
}
function selectActivities(){
  getajax(1,"none",null,"select_activities.php");
}


function deletepromotion(promotion_id){
  document.getElementById("bookdelete").value = promotion_id;
  $("#deletepromotion").modal();
}

function deleteNews(news_id){
  document.getElementById("newsIdToDelete").value = news_id;
 $("#deleteNews").modal();
}

function deleteactivities(activities_id){
  document.getElementById("activitiesIdToDelete").value = activities_id;
  $("#deleteActivitiesModal").modal();
}

function editPromotion(promotion_id){

  $.ajax({
    // The URL for the request
    url: "request_promotion.php",
    // The data to send (will be converted to a query string)
    data: {
        promotion_id: promotion_id
    },

    // Whether this is a POST or GET request
    type: "GET",
    // The type of data we expect back
    dataType : "JSON",

    // Code to run if the request succeeds;
    // the response is passed to the function
    success: function( json ) {
    var promotion = json;
    var img  = new Image();
    $("#editpromotionmodel input[name='promotion_id']").val(promotion[0]['promotion_id']);
    $("#editpromotionmodel input[name='promotionName']").val(promotion[0]['promotion_name']);
    $("#editpromotionmodel input[name='book_name']").val(promotion[0]['title']);
    $("#editpromotionmodel input[name='book_serial_no']").val(promotion[0]['book_serial_no']);
    $("#editpromotionmodel input[name='discount']").val(promotion[0]['discount']);
    $("#editpromotionmodel textarea[name='promotion_detail']").val(promotion[0]['promotion_detail']);
      img.src = promotion[0]['image'];
    $("#editpromotionmodel #Imagedisplay").html(img);
    },

    // Code to run if the request fails; the raw request and
    // status codes are passed to the function
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem in request_book.php!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },


  });

  $("#editpromotionmodel").modal(); ///enable edit model

}
function editNews(news_id){

  $.ajax({
    // The URL for the request
    url: "request_news.php",
    // The data to send (will be converted to a query string)
    data: {
        news_id: news_id
    },

    type: "GET",
    // The type of data we expect back
    dataType : "JSON",

    success: function( json ) {
    var news = json;

    $("#editNewsModal input[name='news_id']").val(news[0]['news_id']);
    $("#editNewsModal input[name='news_name']").val(news[0]['news_name']);
    $("#editNewsModal textarea[name='news_detail']").val(news[0]['news_detail']);

    },
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem in request_activities.php!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },
  });

  $("#editNewsModal").modal(); ///enable edit model

}

function editActivities(activities_id){

  $.ajax({
    // The URL for the request
    url: "request_activities.php",
    // The data to send (will be converted to a query string)
    data: {
        activities_id: activities_id
    },

    // Whether this is a POST or GET request
    type: "GET",
    // The type of data we expect back
    dataType : "JSON",

    success: function( json ) {
    var activities = json;

    $("#editActivitiesModal input[name='activities_id']").val(activities[0]['activities_id']);
    $("#editActivitiesModal input[name='activitiesName']").val(activities[0]['activities_name']);
    $("#editActivitiesModal input[name='startDate']").val(activities[0]['startDate']);
    $("#editActivitiesModal input[name='endDate']").val(activities[0]['endDate']);
    $("#editActivitiesModal textarea[name='activitiesDetail']").val(activities[0]['activities_detail']);

    },

    // Code to run if the request fails; the raw request and
    // status codes are passed to the function
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem in request_activities.php!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },


  });

  $("#editActivitiesModal").modal(); ///enable edit model

}

function validatePromotion(mode){
  var discount;

  if( mode == "add"){
  discount       = Number(document.forms["addPromotionForm"]["discount"].value);
  }
  if( mode == "edit"){
  discount       = Number(document.forms["editPromotionForm"]["discount"].value);
  }

  if( isNaN(discount) ) {
    alert("ส่วนลดต้องเป็นตัวเลข");
    return false;
  }
  if( !Number.isInteger(discount)){
    alert("ส่วนลดต้องเป็นจำนวนเต็ม");
    return false;
  }
  if(discount < 0 || discount > 100){
    alert("ส่วนลดต้องอยู่ระหว่าง 0-100%");
    return false;
  }

  return true;
}


function getajax(page , searchBy , keyword, URL){

  $.ajax({
    // The URL for the request
    url: URL,

    // The data to send (will be converted to a query string)
    data: {
        page: page ,
        rowsPerpage , rowsPerpage ,
        searchBy: searchBy ,
        keyword: keyword
    },

    // Whether this is a POST or GET request
    type: "GET",

    // The type of data we expect back
    dataType : "JSON",

    // Code to run if the request succeeds;
    // the response is passed to the function
    success: function( json ) {
        list = json;
        if(list.length < 1){
          alert("ไม่มีรายการ");
        }

        else{
          if(URL == "select_promotion.php")
            tabledisplayPromotion(page);
          if(URL == "select_news.php")
            tabledisplayNews(page);
          if(URL == "select_activities.php")
            tabledisplayActivities(page);
        }
    },
    // Code to run if the request fails; the raw request and
    // status codes are passed to the function
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },

  });
}

function tabledisplayPromotion(currentPage){

    var table = "";
    var startAt = 0;
    var endAt;

    if(currentPage == totalPagePromotion)
        endAt   = list.length;
    else
        endAt   = startAt+rowsPerpage;

   for(var i =startAt; i < endAt;i++) {

      table += "<tr>";

      table += "<td><button type='button' class='btn btn-info btn-xs'";
      table += "onclick='editPromotion("+list[i]['promotion_id']+")'";
      table +=" >แก้ไข</button></td>";

      table += "<td>"+list[i]['promotion_name']+"</td>";
      table += "<td>"+list[i]['title']+"</td>";
      table += "<td>"+list[i]['discount']+"</td>";
      table += "<td>"+list[i]['promotion_detail']+"</td>";


      table += "<td><button type='button' class='btn btn-danger btn-xs'";
      table += "onclick='deletepromotion("+list[i]['promotion_id']+")'";
      table += ">ลบ</button></td>";

      table += "</tr>"
    }


    $("#promotion_list > tbody ").html(table);
}

function tabledisplayNews(currentPage){

    var table = "";
    var startAt = 0;
    var endAt;

    if(currentPage == totalPageNews)
        endAt   = list.length;
    else
        endAt   = startAt+rowsPerpage;

   for(var i =startAt; i < endAt;i++) {

      table += "<tr>";

      table += "<td><button type='button' class='btn btn-info btn-xs'";
      table += "onclick='editNews("+list[i]['news_id']+")'";
      table +=" >แก้ไข</button></td>";

      table += "<td>"+list[i]['news_name']+"</td>";
      table += "<td>"+list[i]['news_detail']+"</td>";

      table += "<td><button type='button' class='btn btn-danger btn-xs'";
      table += "onclick='deleteNews("+list[i]['news_id']+")'";
      table += ">ลบ</button></td>";

      table += "</tr>"
    }

    $("#news_list > tbody ").html(table);
}

function tabledisplayActivities(currentPage){

    var table = "";
    var startAt = 0;
    var endAt;

    if(currentPage == totalPageActivities)
        endAt   = list.length;
    else
        endAt   = startAt+rowsPerpage;

   for(var i =startAt; i < endAt;i++) {

      table += "<tr>";

      table += "<td><button type='button' class='btn btn-info btn-xs'";
      table += "onclick='editActivities("+list[i]['activities_id']+")'";
      table +=" >แก้ไข</button></td>";

      table += "<td>"+list[i]['activities_name']+"</td>";
      table += "<td>"+list[i]['startDate']+"</td>";
      table += "<td>"+list[i]['endDate']+"</td>";
      table += "<td>"+list[i]['activities_detail']+"</td>";


      table += "<td><button type='button' class='btn btn-danger btn-xs'";
      table += "onclick='deleteactivities("+list[i]['activities_id']+")'";
      table += ">ลบ</button></td>";

      table += "</tr>"
    }


    $("#activities_list > tbody ").html(table);
}

function getBookName(){

  $.ajax({
    url: "request_bookName.php",
    data: {
    },
    type: "GET",

    dataType : "JSON",

    success: function( json ) {
    var book = json;
    var bookNameform = "";
      bookNameform += "<label for='booktitle'>ชื่อหนังสือ</label>";
      bookNameform += "<select class='form-control' name='book_serial_no'>";
      bookNameform += "<option value='0' disabled selected>กรุณาเลือกหนังสือ</option>";
      for(var i=0;i< book.length ;i++){
        var fullName = book[i]['title'];
        bookNameform += "<option value='"+book[i]['serial_no']+"'>"+fullName+"</option>";
      }
      bookNameform += "</select>";

    $("#addPromotionModel #book_serialno").html(bookNameform);
    },

    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem in request_authorName.php!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },

  });

}

function getTotalPagePromotion(URL){

  $.ajax({
    url: "request_totalPageContent.php",
    data: {
        rowsPerpage: rowsPerpage ,
        URL : "select_promotion.php" ,
    },
    type: "GET",
    dataType : "text",
    success: function( json ) {
        totalPagePromotion = parseInt(json);
        // init bootpag
      $('#page-selection1').bootpag({
        total: totalPagePromotion,
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
        getajax(num,"none",null,"select_promotion.php");
   });
    },
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },
});
}
function getTotalPageNews(){
  $.ajax({
    url: "request_totalPageContent.php",
    data: {
        rowsPerpage: rowsPerpage ,
        URL : "select_news.php" ,
    },
    type: "GET",
    dataType : "text",
    success: function( json ) {
        totalPageNews = parseInt(json);
        // init bootpag
      $('#page-selection2').bootpag({
        total: totalPageNews,
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
      }).on(" page", function(event, num){
        getajax(num,"none",null,"select_news.php");
   });
    },
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },
});
}
function getTotalPageActivities(){

  $.ajax({
    url: "request_totalPageContent.php",
    data: {
        rowsPerpage: rowsPerpage ,
        URL : "select_activities.php" ,
    },
    type: "GET",
    dataType : "text",
    success: function( json ) {
        totalPageActivities = parseInt(json);
        // init bootpag
      $('#page-selection3').bootpag({
        total: totalPageActivities,
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
      }).on(" page", function(event, num){
        getajax(num,"none",null,"select_activities.php");
   });
    },
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },
});
}



</script>

</html>
