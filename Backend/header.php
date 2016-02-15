<!DOCTYPE html>
<?php
// session_start();
// include "dbconnect.php";
// $sql="SELECT image FROM it_man LEFT JOIN user ON it_man.it_id = user.it_id  WHERE user.username = '".$_COOKIE['username']."'";
// $re = mysqli_query($con,$sql);
// $result = mysqli_fetch_array($re);

 echo '
<header>
  <style>
        .navbar .navbar-nav {
        display: inline-block;
        float: none;
        }

        .navbar .navbar-collapse {
        text-align: center;
        }
  </style>
    <nav id="navbarC" class="navbar navbar-default" role = "navigation">
        <div class="container-fluid text-center">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/MUPRESS_GIT/Backend/admin.php">
                    <img class="img-responsive" alt="Brand" width="130px"  src="/MUPRESS_GIT/image/logo_mupress.jpg">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="nav navbar-nav" >
                        <a style="margin-left:0px;" href="/MUPRESS_GIT/Backend/admin.php" class="navbar-text"> <h4>MUPMIS</h4><b>(Mahidol University Press Management Information System)</b></a></li>
                </div>

                <div class="nav navbar-nav navbar-right" style="margin-top:30px;">
                    <a href="/MUPRESS_GIT/disconnect.php" role="button" class="btn btn-danger">Log out</a>
                </div>

                <div class="collapse navbar-collapse" style="margin-left:30px;" >
                <ul class="nav navbar-nav"  >
                    <li>
                        <a href="/MUPRESS_GIT/Backend/book_management/book_management.php" >การจัดการหนังสือ</a>
                    </li>
                    <li>
                        <a href="/MUPRESS_GIT/Backend/stock/stock.php" >การจัดการคลังหนังสือ</a>
                    </li>
                    <li>
                        <a href="/MUPRESS_GIT/Backend/finance/financial.php" >การจัดการและรายงานการขาย</a>
                    </li>
                    <li>
                        <a href="/MUPRESS_GIT/Backend/order_evidence/order_confirmation_management.php">การจัดการหลักฐานการโอน</a>
                    </li>
                    <li>
                        <a href="/MUPRESS_GIT/Backend/account/accountManagement.php" >การจัดการบัญชีผู้ใช้</a>
                    </li >
                    <li>
                        <a href="/MUPRESS_GIT/Backend/content_management/content_management.php" >การจัดการเนื้อหาเวปไซต์</a>
                    </li >
                </ul>
              </div>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
' ;


?>
