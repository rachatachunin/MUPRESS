<!DOCTYPE html>
<html>

<style>
.nav>li>a:hover {
     text-decoration: none;
     background-color: transparent;
    color: grey !important;}


</style>
<!-- forsearch  -->


</html>
<?php
ob_start();
session_start();
// include "dbconnect.php";
// $sql="SELECT image FROM it_man LEFT JOIN user ON it_man.it_id = user.it_id  WHERE user.username = '".$_COOKIE['username']."'";
// $re = mysqli_query($con,$sql);
// $result = mysqli_fetch_array($re);
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
               <a class="navbar-brand" href="index.php">Start Bootstrap</a>
           </div>

           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav navbar-right">
                   <li>
                       <a href="#" data-toggle="modal" data-target="#L_R"><h4>สมัครสมาชิก หรือ ลงชื่อเข้าใช้งาน</h4></a>
                   </li>

               </ul>
           </div>
           <!-- /.navbar-collapse -->
       </div>
       <!-- /.container -->
   </nav>

   <!-- Page Header -->
   <!-- Set your background image for this header on the line below. -->
   <header class="intro-header" style="background-image: url(\'image/home-bg.jpg\')">
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
             <div class="col-md-12 col-md-offset-2 ">
               <div class="collapse navbar-collapse" style="color:white;" >
               <ul class="nav navbar-nav"  >
                   <li>
                       <a href="listAllBooks.php" style="color: white; ">หนังสือทั้งหมด</a>
                   </li>
                   <li>
                       <a href="#" style="color: white;">โปรโมชั่น</a>
                   </li>
                   <li>
                       <a href="#" style="color: white;">ข่าวสารและกิจกรรม</a>
                   </li>
                   <li>
                       <a href="#" style="color: white;">รายการสินค้าของคุณ</a>
                   </li>
                   <li>
                       <a href="#" style="color: white;">ติดต่อเรา</a>
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
              <a class="navbar-brand" href="index.php">Start Bootstrap</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  <li>
                    <a href="#" onclick="profile_request(\''.$_SESSION["username"].'\')" > '.$_SESSION['username'].' </a>
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
  <header class="intro-header" style="background-image: url(\'image/home-bg.jpg\')">
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
            <div class="col-md-12 col-md-offset-2 ">
              <div class="collapse navbar-collapse" style="color:white;" >
              <ul class="nav navbar-nav"  >
                  <li>
                      <a href="listAllBooks.php" style="color: white; ">หนังสือทั้งหมด</a>
                  </li>
                  <li>
                      <a href="#" style="color: white;">โปรโมชั่น</a>
                  </li>
                  <li>
                      <a href="#" style="color: white;">ข่าวสารและกิจกรรม</a>
                  </li>
                  <li>
                      <a href="#" style="color: white;">รายการสินค้าของคุณ</a>
                  </li>
                  <li>
                      <a href="#" style="color: white;">ติดต่อเรา</a>
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

</script>
