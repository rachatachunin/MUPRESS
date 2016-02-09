<?
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="content-Type" content="text/html; charset=utf-8" />
 <meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <?php
        include "headFrontEnd.php";
    ?>

    <!-- <link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> -->
    <!-- <link href="/MUPRESS/css/simplePagination.css" rel="stylesheet" type="text/css" media="all" /> -->
    <!-- <script src="/MUPRESS_GIT/js/simpleCart.min.js"> </script> -->
    <link href="/MUPRESS_GIT/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="/MUPRESS_GIT/js/memenu.js"></script>
      <script type="text/javascript" src="/MUPRESS_GIT/js/jquery.bootpag.min.js"></script>
    <!-- <script src="//raw.github.com/botmonster/jquery-bootpag/master/lib/jquery.bootpag.min.js"></script> -->


    <script>$(document).ready(function(){$(".memenu").memenu();});</script>

    <title>MU PRESS</title>
</head>
<body>
  <?php
      include "header.php";
  ?>

  <!--start-breadcrumbs-->
<div class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs-main">
      <ol class="breadcrumb">
        <li><a href="index.php">หน้าแรก</a></li>
        <li class="active">หนังสือทั้งหมด</li>
      </ol>
    </div>
  </div>
</div><br><br>
<!--end-breadcrumbs-->
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
          <div class="item active text-center">
              <!--<img src="image/behavioralgame.jpg" alt="Chania" >-->
              <h3 style="width: 200px;height: 200px;">Promotion</h3>
          </div>

          <div class="item">
              <img src="image/health.jpg" alt="Chania" >
          </div>

          <div class="item">
              <img src="image/law.jpg" alt="Flower" >
          </div>

          <div class="item">
              <img src="image/rome.jpg" alt="Flower" >
          </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
</div>

  <!--product-starts-->
	<div class="product" >
		<div class="container">

			<div class="product-top" id="showProducts">

				</div>
			</div>
	</div>
	<!--product-end-->

<!-- pagina-start  -->

                <div class="col-xs-12">
                  <div id="content"></div>
                  <div id="page-selection" class="text-center"></div>
                      <script>
                       var numPerpage = 20 ;
                       var totalPage;
                        window.onload = function(){
                          $.ajax({
                             url: "request_totalPageBook.php",
                             data: {
                                 page: 1 ,
                                 numPerpage: numPerpage,
                             },
                             type: "GET",
                             dataType : "text",
                             success: function( json ) {
                                 totalPage = parseInt(json);

                                 // init bootpag
                                 $('#page-selection').bootpag({
                                   total:  totalPage,
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
                                   getAjax(num);

                            });
                             },
                             error: function( xhr, status, errorThrown ) {
                                 alert( "Sorry, there was a problem!" );
                                 console.log( "Error: " + errorThrown );
                                 console.log( "Status: " + status );
                                 console.dir( xhr );
                             },
                         });
                          getAjax(1);
                        };



                          function getAjax(num){

                            $.ajax({
                           url: "getBookDetail.php",
                           data: {
                               pageNumber: num ,
                               numPerpage:numPerpage ,
                           },
                           type: "GET",
                           dataType : "JSON",
                           success: function( json ) {
                             var bookArray = json ;
                             showAllbook(bookArray);
                           },
                           error: function( xhr, status, errorThrown ) {
                               alert( "Sorry, there was a problem in user profile request!" );
                               console.log( "Error: " + errorThrown );
                               console.log( "Status: " + status );
                               console.dir( xhr );
                           },
                         });
                          }
                          function showAllbook(data){
                            // first row
                             var products = "";
                             var counter = 0 ;
                          for(var j = 0 ; j < 5  ; j++){
                            if(counter >= data.length) {break;}
                            products += "<div class='product-top'>";
                            for(var i = 0 ; i < 4 ;i++) {
                              // products += data[i]['title'] ;
                               products += "<div class='col-md-3 product-left'>" ;
                               products += "<div class='product-main simpleCart_shelfItem' style='padding: 8px;'>";

                               products += "<a href='single.php?id=" + data[counter]['book_id'] + " ' " + "class='mask'><img class='img-responsive zoom-img' src='image/law.jpg' alt='' /></a> ";
                               products += "<div class='product-bottom'>";
                               products += "<h3 class='item_name'>" + data[counter]['title'] + "</h3>" ;
               							   products +=	"<p>" + "ผู้เขียน " + data[counter]['author'] + "</p>" ;
                               products +=	"<p>" + "serial no. " + data[counter]['serial_no'] + "</p>" ;
                               products +=	"<p>" + "Edition  " + data[counter]['edition'] + "</p>" ;
                               if(data[counter]['current_amount']>0){
                                  products += "<h4><a class='item_add' href='#'><i></i></a> <span class='item_price'>" + data[counter]['price'] +" บาท"+"</span><span style='margin-left:20px; color: green;'>มีสินค้า</span></h4>"  ;
                                  products += '<input type="text" name="name" class="item_bid" style="display: none" value="'+ data[counter]['book_id']+'">';
                                  products += '<input type="text" name="name" class="item_dc" style="display: none" value="18">';
                               }else{

                                  products += '<input type="text" name="name" class="item_bid" style="display: none" value="'+ data[counter]['book_id']+'">';
                                  products += '<input type="text" name="name" class="item_dc" style="display: none" value="18">';

                                  products += "<h4><a class='item_add' href='#' style='pointer-events:none; cursor: default;'><i></i></a> <span class='item_price'>" + data[counter]['price'] +" บาท"+"</span><span style='margin-left:20px; color: red;'>สินค้าหมด</span></h4>"  ;

                               }

                               products += "</div>";

                               products += "<div class='srch'>";
                               products += "<span>" + "-50" + "</span>" ;
                               products += "</div>";

                               products += "</div>";
                               products += "</div>";
                               counter ++ ;
                               if(counter >= data.length) {break;}
                             }
                              products += "<div class='clearfix'></div> ";
                              products +="</div><br>" ;

                          }

                            $("#showProducts").html(products);
                          }
                      </script>
                </div><br><br>

  <!-- pagina-end -->



  <!--footer-starts-->
  <?php include "footer.php" ; ?>
  	<!--footer-end-->


</body>

</html>
