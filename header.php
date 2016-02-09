<!DOCTYPE html>
<html>

<style>
.nav>li>a:hover {
     text-decoration: none;
     background-color: transparent;
    color: grey !important;}


</style>

<script type="text/javascript">
      var empty = 0;
      simpleCart({
        checkout: {
          type: "SendForm",
          url: "checkout.php",
          method: "POST"
        },
        currency: "THB",
        cartStyle: "table",
        cartColumns: [
            { attr: "name", label: "ชื่อหนังสือ"},
            { view: "currency", attr: "price", label: "ราคา"},
            { view: "increment", label: "เพิ่ม"},
            { view: "decrement", label: "ลด"},
            { attr: "quantity", label: "จำนวน"},
            { view: function(item, column){return item.get("dc")+"%";}, attr: "dc", label: "ส่วนลด"},
            { view: function(item, column){return "฿"+parseFloat(parseFloat(item.total())*((100.00-parseFloat(item.get("dc")))/100.00)).toFixed(2);}, attr: "total", label: "ราคารวม" },
            { view: "remove", text: "ลบรายการ", label: false}
        ]
      });
      function checkcart(){
        if(simpleCart.items().length == 0)
        {
          alert("ยังไม่มีสินค้าอยู่ในตะกร้า");
        }
        else{
          $("#cart").modal('show');
          //$(".simpleCart_increment").addClass('btn btn-success btn-xs');
        }
      }

      function confirmaiton(){
        if(!confirm('ยืนยันที่จะลบรายการทั้งหมด?')){
          e.preventDefault();
        }
        else{
          empty = 1;
          simpleCart.empty();
        }
      }


      simpleCart.bind( 'beforeAdd' , function( item ){
        if (simpleCart.has(item))
        {
            alert("มีหนังสือเล่มนี้อยู่ในตะกร้าแล้ว");
            return false;
        }
        else{
            if(!confirm('ต้องการที่จะเพิ่มหนังสือเล่มนี้ลงในตะกร้า?'))e.preventDefault();
            //item.get("price")*((100.00-(item.get("dc")))/100);
        }
      });

      simpleCart.bind( 'beforeRemove' , function( item ){
        if(empty==1){
          empty == 0;
        }else{
        if(!confirm('ต้องการที่จะลบหนังสือเล่มนี้จากตะกร้า?'))e.preventDefault();
        }
      });

      simpleCart.total = function(){
          var total = 0;
      	simpleCart.each(function (item) {
      	    total += (item.price()*((100.00-(item.get("dc")))/100))*item.quantity();
      	});

      	return parseFloat(total).toFixed(2);
      }

      simpleCart.bind( "afterAdd" , function( item ){
        alert("หนังสือเล่มนี้ได้ถูกเพิ่มลงในตะกร้าเรียบร้อย");
      });

      simpleCart.bind( "update" , function( item ){
        if(simpleCart.items().length == 0)
        {
          $("#cart").modal('hide');
        }
      });

      simpleCart.bind("afterCreate", function(){
         $cart_table = $(".simpleCart_items table")
         $cart_table.addClass("table").addClass("table-condensed")
         $(".simpleCart_items").addClass('text-center');
         $(".headerRow").addClass('text-center');
         $(".item-price").css({"width":"50px","text-align":"center"});
         $(".item-name").css({"width":"50%","text-align":"center"});
         $(".simpleCart_decrement").addClass('btn btn-danger btn-xs');
         $(".item-decrement").css({"width":"20px","text-align":"center"});
         $(".item-increment").css({"width":"20px","text-align":"center"});
         $(".simpleCart_increment").addClass('btn btn-success btn-xs');
         $(".item-quantity").css({"width":"50px","text-align":"center"});
         $(".item-dc").css({"width":"50px","text-align":"center"});
         $(".item-total").css({"width":"150px","text-align":"center"});
         $(".item-remove").css({"width":"100px","text-align":"center"});
         $(".simpleCart_remove").addClass('btn btn-danger btn-xs');
      });

      simpleCart.bind( 'beforeCheckout' , function( data ){
        var sessionValue = $("#loginC").val();
        if(sessionValue==1){
          if(!confirm('ยืนยันการสั่งซื้อ?'))e.preventDefault();
          else{
              empty = 1;
              simpleCart.empty();
              return true;
          }
        }
        else{
          alert("กรุณาเข้าสู่ระบบก่อนทำการสั่งซื้อ");
          $("#cart").modal('hide');
          $("#L_R").modal('show');
          $("#uLogin").get(0).focus();
          return false;
        }
      });

      if(localStorage.simpleCart_timeout){
      var timeout = new Date(localStorage.simpleCart_timeout);

      var now = new Date();
      if(now > timeout) {
        simpleCart.empty();
      }

    }

    var timeout = new Date();
    timeout.setMinutes(timeout.getMinutes() + 15);
    localStorage.simpleCart_timeout = timeout;

</script>


</html>
<?php
ob_start();
session_start();

if(!isset($_SESSION['login'])){
 echo '
   <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
       <div class="container-fluid">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header page-scroll">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>

               <a class="navbar-brand" style="width:430px; height:70px;" href="index.php#partner"></a></a>

           </div>

           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav navbar-right">
                   <li>
                       <a href="#" data-toggle="modal" data-target="#L_R"><h4>สมัครสมาชิก หรือ ลงชื่อเข้าใช้งาน</h4></a>
                   </li>
                   <li>

                       <div style="margin-top: 5px" class="cart box_1">
            						<a href="#" onclick="checkcart();"">

            								<img src="image/cart-2.png" alt="" />
                            <div class="total">
             								<span class="simpleCart_total"></span></div>
            						</a>
            						<p><a href="javascript:;" style="text-decoration:none;" onclick="confirmaiton();">Empty Cart</a></p>
                        <input type="hidden" id="loginC" value="'; echo $_SESSION['login'];
                        echo '"></input>
            						<div class="clearfix"> </div>
            					</div>
                   </li>
               </ul>
           </div>
           <!-- /.navbar-collapse -->
       </div>
       <!-- /.container -->
   </nav>

   <!-- Page Header -->
   <!-- Set your background image for this header on the line below. -->
   <header class="intro-header" style="background-image: url(\'image/bg_1.jpg\'); opacity: 0.9;">
       <div class="container">
           <div class="row">
               <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                   <div class="site-heading">
                       <h1>สำนักพิมพ์ มหาวิทยาลัย มหิดล</h1>
                       <hr class="small">
                       <span class="subheading">Mahidol University Press</span>
                   </div>
               </div>
           </div>

           <div class="row">
             <div class="col-md-12 ">
               <div class="collapse navbar-collapse" style="color:white;" >
               <ul class="nav navbar-nav"  >
                   <li>
                       <a href="index.php" style="color: white; ">หน้าแรก</a>
                   </li>
                   <li>
                       <a href="listAllBooks.php" style="color: white; ">หนังสือทั้งหมด</a>
                   </li>
                   <li>
                       <a href="promotion.php" style="color: white;">โปรโมชั่น</a>
                   </li>
                   <li>
                       <a href="newsandactivities.php" style="color: white;">ข่าวสารและกิจกรรม</a>
                   </li>
                   <li>
                       <a href="contactus.php" style="color: white;">ติดต่อเรา</a>
                   </li >
                   <li>
                   <div class="search-bar">
                        <form action="searchBookPage.php" method="post">
               					<input type="text" style="color:white" value="Search" name="searchStr" onfocus="this.value = \'\';">
               					<input type="submit" value="">
                        </form>
               				</div>
                   </li>
               </ul>
             </div>

             </div>
           </div>
       </div>
   </header>
';}

// header for user who login in
else{
  echo'
  <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
      <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" style="width:430px; height:70px;" href="index.php#partner"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  <li>
                    <a href="#" onclick="profile_request(\''.$_SESSION["username"].'\')" > '.$_SESSION['username'].' </a>
                  </li>
                  <li>

                        <div style="margin-top: 5px" class="cart box_1">
                         <a href="#" onclick="checkcart();"">
                         <img src="image/cart-2.png" alt="" />
                            <div class="total">
                             <span class="simpleCart_total"></span></div>

                         </a>
                         <p><a href="javascript:;" style="text-decoration:none;" onclick="confirmaiton();">Empty Cart</a></p>
                         <input type="hidden" id="loginC" value="'; echo $_SESSION['login'];
                         echo '"></input>
                         <div class="clearfix"> </div>
                       </div>
                  </li>
                  <li>
                    <a href="disconnect.php"> <i style ="font-size: 130%;">ออกจากระบบ</i></a>
                  </li>

              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>

  <!-- Page Header -->
  <!-- Set your background image for this header on the line below. -->
  <header class="intro-header" style="background-image: url(\'image/bg_1.jpg\'); opacity: 0.9;">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                  <div class="site-heading">
                      <h1>สำนักพิมพ์ มหาวิทยาลัย มหิดล</h1>
                      <hr class="small">
                      <span class="subheading">Mahidol University Press</span>
                  </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12 ">
              <div class="collapse navbar-collapse" style="color:white;" >
              <ul class="nav navbar-nav"  >
                  <li>
                      <a href="index.php" style="color: white; ">หน้าแรก</a>
                  </li>
                  <li>
                      <a href="listAllBooks.php" style="color: white; ">หนังสือทั้งหมด</a>
                  </li>
                  <li>
                      <a href="promotion.php" style="color: white;">โปรโมชั่น</a>
                  </li>
                  <li>
                      <a href="newsandactivities.php" style="color: white;">ข่าวสารและกิจกรรม</a>
                  </li>
                  <li>
                      <a href="order_history.php" style="color: white;">รายการสินค้าของคุณ</a>
                  </li>
                  <li>
                      <a href="contactus.php" style="color: white;">ติดต่อเรา</a>
                  </li>
                  <li>
                  <div class="search-bar">
                      <form action="searchBookPage.php" method="post" >
                       <input type="text" style="color:white" name="searchStr" value="Search" onfocus="this.value = \'\';">
                       <input type="submit" value="">
                       </form>
                     </div>
                  </li>

              </ul>
            </div>

            </div>
          </div>
      </div>
  </header>
  ' ;

}
// end of loged in user
?>




<div class="modal fade" id="L_R" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">MU PRESS AND BOOK STORE</h4>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#menu1">เข้าสู่ระบบ</a></li>
                    <li><a data-toggle="tab" href="#home">ลงทะเบียนสมาชิก</a></li>

                </ul>
            </div>

          <!-- modal register & login -->
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="menu1" class="tab-pane fade in active">
                            <form  method="post" action="Authentication/login.php">
                              <div class="form-group">
                              						<div class="input-group">
                                            <label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
                              							<input type="text" class="form-control" name="username" id="uLogin" placeholder="Login">

                              						</div>
                              					</div> <!-- /.form-group -->

                              					<div class="form-group">
                              						<div class="input-group">
                                            <label for="uPassword" class="input-group-addon glyphicon glyphicon-lock"></label>
                              							<input type="password" class="form-control" name="password" id="uPassword" placeholder="Password">

                              						</div> <!-- /.input-group -->
                              					</div> <!-- /.form-group -->

                                <button class="btn btn-md btn-primary btn-block" type="submit">
                                    ลงชื่อเข้าใช้</button>
                                <span class="clearfix"></span>

                            </form>
                        </div>

                        <div id="home" class="tab-pane fade">
                          <form id="addCustomerForm" onsubmit="return validateCus();" action ="Authentication/register.php" method="post" role="form">
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="fname" id="firstname" class="form-control input-sm" placeholder="ชื่อ">
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="lname" id="lastname" class="form-control input-sm" placeholder="นามสกุล">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <select name="gender" class="form-control input-sm" aria-describedby="sizing-addon" required="ture">
                                <option value="">เลือกเพศ</option>
                                <option value="M">ชาย</option>
                                <option value="F">หญิง</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                          </div>

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="tel" id="tel" class="form-control input-sm" placeholder="เบอร์โทรศัพท์">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <textarea name="address" placeholder="ที่อยู่" class="form-control input-sm"></textarea>
                          </div>
                          <button class="btn btn-md btn-primary btn-block" type="submit">
                              สมัครสมาชิก</button>
                          <span class="clearfix"></span>

                        </form>
                      </div>
                  </div>


                </div>
                <div class="modal-footer">
                    <!--<button type="submit" class="btn btn-primary">Add</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            <!--</form>-->
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){

  });
  window.onload = function(){
      new UISearch( document.getElementById( 'sb-search' ) );
  };

  function profile_request(email){
       $.ajax({
      url: "request_profile.php",
      data: {
          email: email ,
      },
      type: "GET",
      dataType : "JSON",
      success: function( json ) {
      var profile = json;
      $("#edit_Profile_Model input[name='fname']").val(profile[0]['user_fn']);
      $("#edit_Profile_Model input[name='lname']").val(profile[0]['user_ln']);
      $("#edit_Profile_Model input[name='tel']").val(profile[0]['tel']);
      $("#edit_Profile_Model select[name='gender']").val(profile[0]['gender']);
      $("#edit_Profile_Model textarea[name='address']").val(profile[0]['address']);

      },
      error: function( xhr, status, errorThrown ) {
          alert( "Sorry, there was a problem in user profile request!" );
          console.log( "Error: " + errorThrown );
          console.log( "Status: " + status );
          console.dir( xhr );
      },
    });
  $("#edit_Profile_Model").modal(); ///enable edit model
  }

</script>


<div class="modal fade" id="cart" tabindex="-1" style="font-size: 80%" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">ข้อมูลตะกร้าสินค้า</h4>
            </div>

                <div class="modal-body">
                <!-- <span class="simpleCart_quantity"></span> items - <span class="simpleCart_total"></span>
                <a href="javascript:;" class="simpleCart_empty btn btn-danger">ลบรายการทั้งหมด</a> -->
                <div>
                <div class="simpleCart_items"></div>
                </div>
                </div>
                <div class="modal-footer">
                  <div class="">
                    ราคารวมทั้งหมด<h5 class="simpleCart_total"></h5>
                  </div>
                    <button type="submit" class="btn btn-primary simpleCart_checkout">สั่งซื้อ</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            <!--</form>-->
        </div>
    </div>
</div>

<!---//////////////////////////////////////// Begin edit model  ///////////////////////////////////////////////-->
    <div class="modal fade" id="edit_Profile_Model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">แก้ไขประวัติส่วนตัว</h4>

            </div>

            <!--<form method="post" >-->
                <div class="modal-body">

                    <form class="form" method="post" action="edit_profile.php">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon3">Email</span>
                            <input type="text" value="<?php echo $_SESSION['username']; ?>" class="form-control" placeholder="" aria-describedby="sizing-addon3" name="email" readonly="true">
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
                          <div class="form-group">
                            <span class="input-group-addon" id="sizing-addon4">เพศ</span>
                            <select name="gender" class="form-control input-sm" aria-describedby="sizing-addon" aria-describedby="sizing-addon4" required="ture">
                                <option value="">เลือกเพศ</option>
                                <option value="M">ชาย</option>
                                <option value="F">หญิง</option>
                            </select>
                          </div>

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <span class="input-group-addon" id="sizing-addon7">เบอร์โทรศัพท์</span>
                                <input type="text" name="tel" id="tel" class="form-control input-sm" placeholder="เบอร์โทรศัพท์" aria-describedby="sizing-addon7">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <span class="input-group-addon" id="sizing-addon8">ที่อยู่</span>
                            <textarea name="address" placeholder="ที่อยู่" class="form-control input-sm"  aria-describedby="sizing-addon8"></textarea>
                          </div>
                          <button class="btn btn-lg btn-primary btn-block" type="submit">
                              แก้ไข</button>
                          <span class="clearfix"></span>

                    </form>

                </div>
                <div class="modal-footer">
                    <!--<button type="submit" class="btn btn-primary">Add</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            <!--</form>-->
        </div>
    </div>
</div>
<!---//////////////////////////////////////// End edit model  ///////////////////////////////////////////////-->
