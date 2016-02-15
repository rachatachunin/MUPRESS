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
    <script src="../../js/jquery.maskedinput.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.bootpag.js"></script>
    <script src="../../js/jquery.bootpag.min.js"></script> -->
    <?php
        include "../../head.php";
    ?>
      <script src="../../js/jquery.maskedinput.js"></script>
      <script src="../../js/jquery.bootpag.js"></script>
      <script src="../../js/jquery.bootpag.min.js"></script>
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
        .bright {
            border-right: 1px solid #ccc;
        }
    </style>
</head>

<body>
<?php include "../header.php" ?>

<div class = "container-fluid ">
<!--///////////////////////////// End page header /////////////////////////// -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px">
          <h1>การจัดการหนังสือ</h1>
        </div>
    </div>
<!--///////////////////////////// Start insert,update,delete /////////////////////////// -->
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="margin-top: 20px">

        <!-- Start add BOOK Button trigger modal -->
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addbook">
            เพิ่มหนังสือ
        </button>
        <!-- END ADD BOOK Button trigger modal -->
                <!-- Start add author Button trigger modal -->
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addauthor">
            เพิ่มผู้เขียน
        </button>
        <!-- END ADD author Button trigger modal -->
        <!-- Start view all Button -->
        <button type="button" class="btn btn-info btn-lg" onclick="viewAllBook()">
            ดูทั้งหมด
        </button>
        <!-- END view all Button -->
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-right" style="margin-top: 20px">
        <!-- Start Search Button  -->
        <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <span id="search_concept" value="none">ค้นหาโดย</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#serial_no" value="book_id">หมายเลขหนังสือ</a></li>
                      <li><a href="#title" value="title">ชื่อหนังสือ</a></li>
                      <li><a href="#author" value="author">ผู้เขียน</a></li>
                      <li class="divider"></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="" id="search_param">
                <input type="text" id= "searchKeyword" class="form-control" name="x" placeholder="คำที่ต้องการค้าหา ....">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="searchBook()"><span class="glyphicon glyphicon-search"></span></button>
                </span>
        </div>
        <!-- END Search Button  -->
        </div>

    </div>
<!--///////////////////////////// End insert,update,delete /////////////////////////// -->
<!--///////////////////////////// START row search/////////////////////////// -->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="searchtext">
        </div>
      </div>
    </div>
<!--///////////////////////////// END row search/////////////////////////// -->
<!--///////////////////////////// Start book tabel /////////////////////////// -->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <table class="table table-hover" id="book_list">
          <thead>
            <tr>
                <th></th>
                <th>หมายเลขหนังสือ</th>
                <th>ชื่อหนังสือ</th>
                <th>ฉบับที่</th>
                <th>ผู้เขียน</th>
                <th>ราคา</th>
                <th>แนะนำ</th>
                <th></th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>

    </div>

<!--///////////////////////////// End   book tabel /////////////////////////// -->

<!--///////////////////////////// Start page selection /////////////////////////// -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="page-selection" class="pull-right"></div>
    </div></div>
<!--///////////////////////////// End page selection /////////////////////////// -->
</div>




<!--//////////////////////////// Modal add book ///////////////////////////////////////////////-->
<div class="modal fade" id="addbook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มหนังสือ</h4>
      </div>
      <div class="modal-body">
          <form name="addForm" method="post" action="add_book.php" enctype="multipart/form-data"
          onsubmit="return validateFormAdd('add')">
            <div class="form-group">
              <label for="serial_no">หมายเลขหนังสือ</label>
              <input type="text" class="form-control" name="serial_no" id="serial_no" placeholder="หนังสือที่ต้องการจัดรายการ" required>
            </div>
            <div class="form-group">
              <label for="book">ชื่อหนังสือ</label>
              <input type="text" class="form-control" name="title" placeholder="หนังสือที่ต้องการจัดรายการ" required>
            </div>
            <div class="form-group">
              <label for="edition">ฉบับที่</label>
              <input type="text" class="form-control" name="edition" placeholder="หนังสือที่ต้องการจัดรายการ" required>
            </div>
            <div class="form-group" id="author_form">

            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="author" id="author"  required>
            </div>
            <div class="form-group">
              <label for="price">ราคา</label>
              <input type="text" class="form-control" name="price" placeholder="หนังสือที่ต้องการจัดรายการ" id="price" required>
            </div>
            <div class="form-group">
              <label for="file">กรุณาเลือกไฟล์</label>
              <input type="file" name="fileToUpload">
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
<!--//////////////////////////// END Modal add book ///////////////////////////////////////////////-->

<!--//////////////////////////// Modal Edit book ///////////////////////////////////////////////-->
<div class="modal fade" id="editbookmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายละเอียดหนังสือ</h4>
      </div>
      <div class="modal-body">

          <form name="editForm" method="post" action="edit_book.php" enctype="multipart/form-data"
          onsubmit="return validateFormAdd('edit')">
            <div class="form-group">
              <label for="bookid">หมายเลขหนังสือ</label>
              <input type="text" class="form-control" name="serial_no" placeholder="หนังสือที่ต้องการจัดรายการ"
              readonly="readonly">
            </div>
            <div class="form-group">
              <label for="title">ชื่อหนังสือ</label>
              <input type="text" class="form-control" name="title" placeholder="หนังสือที่ต้องการจัดรายการ" required>
            </div>
            <div class="form-group">
              <label for="edition">ฉบับที่</label>
              <input type="text" class="form-control" name="edition" placeholder="หนังสือที่ต้องการจัดรายการ" required>
            </div>
            <div class="form-group" id="author_form">

            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="author" id="author" required>
            </div>
            <div class="form-group">
              <label for="price">ราคา</label>
              <input type="text" class="form-control" name="price" placeholder="หนังสือที่ต้องการจัดรายการ" required>
            </div>
            <div>
              <label for="oldimage">รูปภาพปัจจุบัน</label>
              <div id="Imagedisplay"></div>
            </div>
            <div class="form-group">
              <label for="file">กรุณาเลือกไฟล์</label>
              <input type="file" name="fileToUpload">
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
<!--//////////////////////////// END Modal Edit book ///////////////////////////////////////////////-->

<!--//////////////////////////// Modal add author ///////////////////////////////////////////////-->
<div class="modal fade" id="addauthor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มผู้เขียน</h4>
      </div>
      <div class="modal-body">

          <form id="addAuthorForm" onsubmit="return validateCus();" action ="add_author.php" method="post" class="form-horizontal" role="form" style="margin-top: 20px">
                               <!-- <form class="from" onsubmit="return confirm('Do you really want to submit?');" method="post" action="AddCustomer.php" style="margin-top: 20px"> -->
                           <div class="form-group">
                               <label for="firstname" class="col-md-3 control-label">ชื่อ (ต้องการข้อมูล)</label>
                               <div class="col-md-9">
                                   <input type="text"  id = "fn_cus" class="form-control" name="firstname" placeholder="ชื่อ" required="true">
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="lastname" class="col-md-3 control-label">นามสกุล    (ต้องการข้อมูล)</label>
                               <div class="col-md-9">
                                   <input type="text"  id = "ln_cus"class="form-control" name="lastname" placeholder="นามสกุล" required="true">
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="email" class="col-md-3 control-label">Email    (ต้องการข้อมูล)</label>
                               <div class="col-md-9">
                                   <input type="text"  id= "email_cus" class="form-control" name="email" placeholder="Email Address" required="true">
                               </div>
                           </div>


                            <div class="form-group">
                               <label for="gender" class="col-md-3 control-label">เพศ</label>
                               <div class="col-md-9">
                                   <select name="gender" class="form-control" aria-describedby="sizing-addon" required="ture">
                                       <option value="">เลือกเพศ</option>
                                       <option value="M">ชาย</option>
                                       <option value="F">หญิง</option>
                                   </select>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="address" class="col-md-3 control-label">ที่อยู่   (ต้องการข้อมูล) </label>
                               <div class="col-md-9">
                                   <textarea  name="address" id="address_cus"  cols="50" rows="5"></textarea>
                               </div>
                           </div>


                           <div class="form-group">
                               <label for="phone" class="col-md-3 control-label">เบอร์โทรศัพท์ (ต้องการข้อมูล) </label>
                               <div class="col-md-9">
                                   <input type="text" class="form-control"  id="tel_cus" name="phone" placeholder="เบอร์โทรศัพท์" required="ture">
                               </div>
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
<!--//////////////////////////// END Modal add author ///////////////////////////////////////////////-->

<!--//////////////////////////// Start Modal rec toggle ///////////////////////////////////////////////-->
<div class="modal fade" id="recommendmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert alert-warning">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">คุณต้องการเปลี่ยนการแนะนำของหนังสือเล่นนี้หรือไม่</h4>
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success" id="recommendChange"
        onclick="window.location.href='recommend_book.php?serial_no=' + this.value" >ตกลง</button>
      </div>
  </div>
  </div>
</div>
<!--//////////////////////////// END Modal rec toggle ///////////////////////////////////////////////-->

<!--//////////////////////////// Start Modal Delete book ///////////////////////////////////////////////-->
<div class="modal fade" id="deletebookmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert alert-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">คุณต้องการลบหนังสือเล่นนี้หรือไม่</h4>
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success" id="bookdelete"
        onclick="window.location.href='delete_book.php?serial_no=' + this.value" >ตกลง</button>
      </div>
  </div>
  </div>
</div>
<!--//////////////////////////// END Modal Delete book ///////////////////////////////////////////////-->
</body>
<script>

var bookarray;
var totalPage;
var rowsPerpage = 20;


$(document).ready(function() {
//////////////////////////////// Start ISBN check //////////////////////////////////////////
  jQuery(function($){
   $("#serial_no").mask("999-999-999-999-9",{completed:function(){

    $.ajax({
      url: "request_book.php",
      data: {
        serial_no: this.val()
      },

      type: "GET",
      dataType : "JSON",
      success: function( json ) {
        var book = json;
        if(book.length > 0){
          alert("รหัสหนังสือนี้มีอยู่แล้ว");
          $("#serial_no").val("___-___-___-___-_");
        }
      },

      error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem in check_book.php!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
      },
    });

  }});

 });
//////////////////////////////// End ISBN check //////////////////////////////////////////


 //////////////////////////////// Start Jquery for search ////////////////////////////////
  $('.search-panel .dropdown-menu').find('a').click(function(e) {
    e.preventDefault();
    var param = $(this).attr("href").replace("#","");
    var concept = $(this).text();
    $('.search-panel span#search_concept').text(concept);
    $('.input-group #search_param').val(param);

  });
 //////////////////////////////// END  Jquery for search ////////////////////////////////
});
/////////////////////////////// End document ready function ////////
window.onload = function() {

  if(sessionStorage.getItem('Page') == null)          sessionStorage.Page = 1;
  if(sessionStorage.getItem('SearchBy') == null)      sessionStorage.SearchBy = "";
  if(sessionStorage.getItem('SearchKeyword') == null) sessionStorage.SearchKeyword = "";
  if(sessionStorage.SearchBy !="" && sessionStorage.SearchKeyword != "")
   $("#searchtext").html("ค้าหา :"+getSearchByText(sessionStorage.SearchBy)+" โดยคำว่า :"+sessionStorage.SearchKeyword);
 getTotalPage();
 getajax(sessionStorage.Page,sessionStorage.SearchBy,sessionStorage.SearchKeyword);
 getAuthorName();

};

function deletebook(serial_no){
  document.getElementById("bookdelete").value = serial_no;
  $("#deletebookmodel").modal();
}

function recommendtoggle(serial_no){
  document.getElementById("recommendChange").value = serial_no;
  $("#recommendmodel").modal();
}
function searchBook(){
  var search_concept = $('.input-group #search_param').val();
  var keyword = document.getElementById('searchKeyword').value;
  if(search_concept == "" || search_concept == null){
    alert("กรุณาเลือกวิธีการค้นหา");
    return -1;
  }
  if(keyword == "" || keyword == null){
    alert("กรุณาใส่คำที่ต้องการค้นหา");
    return -1;
  }
  sessionStorage.Page           = 1;
  sessionStorage.SearchBy       = search_concept;
  sessionStorage.SearchKeyword  = keyword;

  $("#searchtext").html("ค้าหา :"+getSearchByText(sessionStorage.SearchBy)+" โดยคำว่า :"+sessionStorage.SearchKeyword);



  getTotalPage()
  getajax(sessionStorage.Page ,sessionStorage.SearchBy ,sessionStorage.SearchKeyword);
}

function getTotalPage(){
 // alert("search by: "+ sessionStorage.SearchBy );
 // alert("keyword: "+sessionStorage.SearchKeyword);

  $.ajax({
    url: "request_totalPageBook.php",
    data: {
        rowsPerpage: rowsPerpage ,
        searchBy: sessionStorage.SearchBy ,
        keyword : sessionStorage.SearchKeyword ,
    },
    type: "GET",
    dataType : "text",
    success: function( json ) {
        totalPage = parseInt(json);
//        alert(totalPage);
        // init bootpag
      $('#page-selection').bootpag({
        total: totalPage,
        page: sessionStorage.Page,
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
        sessionStorage.Page = num;
        getajax(num,sessionStorage.SearchBy,sessionStorage.SearchKeyword);
   });
    },
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem on get totalPage!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },
});
}

function validateCus(e){
      var filter = /[ก-๙a-zA-Z]/ ;
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      var fname = document.getElementById("fn_cus").value ;
      var lname = document.getElementById("ln_cus").value ;
      var email = document.getElementById("email_cus").value ;
      var address = document.getElementById("address_cus").value ;
      var tel = document.getElementById("tel_cus").value ;

      if(fname == "" || !filter.test(fname)){
        alert("กรุณากรอกชื่อของลูกค้าให้ถูกต้อง");
        return false ;
      }else if(lname== "" || !filter.test(lname) ){
        alert("กรุณากรอกนามสกุลของลูกค้าให้ถูกต้อง");
        return false ;
     }else if(email == "" || !re.test(email) ){
        alert("กรุณากรอก e-mail ของลูกค้าให้ถูกต้อง");
        return false ;
     }else if(address == "" ){
        alert("กรุณากรอกที่อยู่ลูกค้าให้ถูกต้อง");
        return false ;
    }else if(tel == "" || filter.test(tel) || tel.length != 10  ){
        alert("กรุณากรอกเบอร์โทรลูกค้าให้ถูกต้อง");
        return false ;
    }else{
        return confirm("คุณต้องการจะเพิ่มผู้เขียนใหม่หรือไม่ ?");
      }
}


function validateFormAdd(mode) {
  var price;
  var edition;
  var authorid;
  if( mode == "add"){
  price    = Number(document.forms["addForm"]["price"].value);
  edition  = Number(document.forms["addForm"]["edition"].value);
  authorid = Number(document.forms["addForm"]["author_id"].value);
  }
  if( mode == "edit"){
  price    = Number(document.forms["editForm"]["price"].value);
  edition  = Number(document.forms["editForm"]["edition"].value);
  authorid = Number(document.forms["editForm"]["author_id"].value);
  }

  if( isNaN(price)){
    alert("ราคาหนังสือต้องเป็นตัวเลขเท่านั้น");
    return false;
  }
  if( isNaN(edition)){
    alert("ฉบับหนังสือต้องเป็นตัวเลขเท่านั้น");
    return false;
  }

  if(edition < 1){
    alert("ฉบับหนังสือต้องมีค่าตั้งแต่ 1 ขึ้นไป");
    return false;
  }
  if(authorid == 0){
    alert("กรุณาเลือกผู้เขียน")
    return false;
  }
  if(!(Number.isInteger(edition)) ){
    alert("ฉบับหนังสือต้องเป็นจำนวนเต็ม");
    return false;
  }
  if(price <= 0 ){
    alert("ราคาไม่สามารถมีค่าเป็น ศุนย์ หรือ ติดลบ");
    return false;
  }

    return true;
}
function changeAuthorName(name){
    $("#addbook #author").val(name);
    $("#editbookmodel #author").val(name);

}

function getAuthorName(){

  $.ajax({
    url: "request_authorName.php",
    data: {
    },

    type: "GET",

    dataType : "JSON",

    success: function( json ) {
    var author = json;
    var authorNameform = "";
      authorNameform += "<label for='author'>ชื่อผู้เขียน</label>";
      authorNameform += "<select class='form-control' name='author_id' onchange='changeAuthorName(this.options[this.selectedIndex].innerHTML)'>";
      authorNameform += "<option value='0' disabled selected>กรุณาเลือกผู้เขียน</option>";
      for(var i=0;i< author.length ;i++){
        var fullName = author[i]['user_fn']+" "+author[i]['user_ln'];
        authorNameform += "<option value='"+author[i]['user_id']+"'>"+fullName+"</option>";
      }
      authorNameform += "</select>";

    $("#addbook #author_form").html(authorNameform);
    $("#editbookmodel #author_form").html(authorNameform);
    },

    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem in request_authorName.php!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },

  });

}

function editBook(serial_no){

  $.ajax({
    // The URL for the request
    url: "request_book.php",
    // The data to send (will be converted to a query string)
    data: {
        serial_no: serial_no
    },
    // Whether this is a POST or GET request
    type: "GET",
    // The type of data we expect back
    dataType : "JSON",

    // Code to run if the request succeeds;
    // the response is passed to the function
    success: function( json ) {
    var book = json;
    var img  = new Image();
    $("#editbookmodel input[name='serial_no']").val(book[0]['serial_no']);
    $("#editbookmodel input[name='title']").val(book[0]['title']);
    $("#editbookmodel input[name='edition']").val(book[0]['edition']);
    $("#editbookmodel select[name='author_id']").val(book[0]['author_id']);
    $("#editbookmodel input[name='price']").val(book[0]['price']);
    img.src = book[0]['image'];
    $("#editbookmodel #Imagedisplay").html(img);

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

  $("#editbookmodel").modal(); ///enable edit model

}

function getajax(page , searchBy , keyword){

  $.ajax({

    // The URL for the request
    url: "select_book.php",

    // The data to send (will be converted to a query string)
    data: {
        page: page ,
        searchBy: searchBy ,
        keyword: keyword ,
        rowsPerpage : rowsPerpage ,
    },

    // Whether this is a POST or GET request
    type: "GET",

    // The type of data we expect back
    dataType : "JSON",

    // Code to run if the request succeeds;
    // the response is passed to the function
    success: function( json ) {
        bookarray = json;
        if(bookarray.length > 0){
          tabledisplay(page);
        }
        else{
          alert("ไม่มีขือมูลหนังสือที่ค้นหา");
          $("#book_list > tbody ").html("ไม่มีขือมูลหนังสือที่ค้นหา");
          $("#page-selection").html("");
        }
    },

    // Code to run if the request fails; the raw request and
    // status codes are passed to the function
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem on getajax!" );
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
        endAt   = bookarray.length;
    else
        endAt   = startAt+rowsPerpage;

   for(var i =startAt; i < endAt;i++) {

      table += "<tr>";

      table += "<td><button type='button' class='btn btn-info btn-xs'";
      table += "onclick='editBook(\""+bookarray[i]['serial_no']+"\")'";
      table +=" >แก้ไข</button></td>";

      table += "<td>"+bookarray[i]['serial_no']+"</td>";
      table += "<td>"+bookarray[i]['title']+"</td>";
      table += "<td>"+bookarray[i]['edition']+"</td>";
      table += "<td>"+bookarray[i]['author']+"</td>";
      table += "<td>"+bookarray[i]['price']+"</td>";

      if( bookarray[i]['recommend'] == 1){
      table += "<td><span class='glyphicon glyphicon-star'";
      table += "onclick='recommendtoggle(\""+bookarray[i]['serial_no']+"\")' "
      table += "></span></td>"
      }
      else{
      table += "<td><span class='glyphicon glyphicon-star-empty' ";
      table += "onclick='recommendtoggle(\""+bookarray[i]['serial_no']+"\")' ";
      table += "></span></td>";
      }

      table += "<td><button type='button' class='btn btn-danger btn-xs'";
      table += " onclick='deletebook(\""+bookarray[i]['serial_no']+"\")' ";
      table += ">ลบ</button></td>";


      table += "</tr>"
    }


    $("#book_list > tbody ").html(table);
}

function viewAllBook(){
  $("#searchtext").html("");
sessionStorage.Page          = 1;
sessionStorage.SearchBy      = "";
sessionStorage.SearchKeyword = "";
getTotalPage();
getajax(sessionStorage.Page,sessionStorage.SearchBy,sessionStorage.SearchKeyword);
}
function getSearchByText(str){
  var text = "";
   if(str == "serial_no")
      text = "หมายเลขหนังสือ";
   else if(str == "title")
      text = "ชื่อหนังสือ";
   else
      text = "ผู้เขียน";

  return text;
}


</script>
</html>
