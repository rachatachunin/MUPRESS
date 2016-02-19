<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <?php
      include "../head.php"
    ?>
</head>
<body>

<?php
    include "header.php";
?>

<div class="container-fluid" id="navv" style="text-align: center;">
    <h2 class="lead">ADMINISTRATOR SYSTEM</h2>
      <h3 class="lead">(ระบบการจัดการภายใน)<h3>
</div>

<div class="container-fluid" style="margin-top: 50px;">

    <div class="col-lg-4 text-center" >
        <div class="jumbotron">
            <h2 class="lead">Books Management</h2>
            <h3 class="lead">(การจัดการหนังสือ)<h3>

            <p><a class="btn btn-primary btn-lg text-center" href="book_management/book_management.php" role="button">Manage now<span class="glyphicon glyphicon-book" style="margin-left:10px"></span></a></p>
        </div>

    </div>

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Finance Reporting & Management</h2>
              <h3 class="lead">(การจัดการ และ การรายงานการขาย)<h3>

            <p><a class="btn btn-primary btn-lg text-center" href="finance/financial.php" role="button">Manage now<span class="glyphicon glyphicon-usd" style="margin-left:10px"></span></a></p>
        </div>

    </div>

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Users Management</h2>
            <h3 class="lead">(การจัดการบัญชีผู้ใช้)<h3>

            <p><a class="btn btn-primary btn-lg text-center" href="account/accountManagement.php" role="button">Manage now<span class="glyphicon glyphicon-user" style="margin-left:10px"></span></a></p>
        </div>

    </div>



</div>

<div class="container-fluid" style="margin-top: 50px;">

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Stock Management</h2>
              <h3 class="lead">(การจัดการคลังหนังสือ)<h3>

            <p><a class="btn btn-primary btn-lg text-center" href="stock/stock.php" role="button">Manage now<span class="glyphicon glyphicon-folder-close" style="margin-left:10px"></span></a></p>
        </div>

    </div>

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Order Evidence Management</h2>
              <h3 class="lead">(การจัดการหลักฐานการโอน)<h3>

            <p><a class="btn btn-primary btn-lg text-center" href="order_evidence/order_confirmation_management.php" role="button">Manage now<span class="glyphicon glyphicon-shopping-cart" style="margin-left:10px"></span></a></p>
        </div>

    </div>

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Contents Management</h2>
              <h3 class="lead">(การจัดการเนื้อหาเวปไซต์)<h3>

            <p><a class="btn btn-primary btn-lg text-center" href="content_management/content_management.php" role="button">Manage now<span class="glyphicon glyphicon-folder-open" style="margin-left:10px"></span></a></p>
        </div>

    </div>

    <section id="partner">
          <div class="container">
            <div class="row">
              <div class="">

                  <p class="lead text-center" >เป็นการร่วมงานระหว่าง คณะ เทคโนโลยีสาระสนเทศและการสื่อสาร และ สำนักพิมพ์มหาวิทยาลัย มหิดล<br>โดย</p>
                   <div class="lead" style="margin-left: 160px;">
                     MU PRESS MANAGER: Assoc. Prof. Dr.Suvaluck Satumanatpan<br>
                     ADVISOR: Asst. Prof. Dr. Charnyote Pluempitiwiriyawej<br>
                     MU PRESS OFFICER: Miss Phungnapha Sornprasit<br>
                     MU STUDENT: Mr. Supanat Chanjam <br>
                     MU STUDENT: Mr. Rachata Chunin<br>
                     MU STUDENT: Mr. Anan Boonthavornthavee


                   </div>
              </div>
              <br><br>

            <div class="col-md-12">
                <div class="col-md-4 text-center">
                    <img class="img-responsive" width="100"   src="/MUPRESS_GIT/image/mu.png">
                </div>
                <div class="col-md-4 text-center">
                    <img class="img-responsive " width="200"  src="/MUPRESS_GIT/image/ict.png">
                </div>
                <div class="col-md-4 text-center">
                    <img class="img-responsive " width="200"  src="/MUPRESS_GIT/image/press.png">
                </div>
            </div>
          </div>
          </div><!--/.container-->
      </section>



</div>
</body>
</html>
