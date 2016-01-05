<!DOCTYPE html>
<html>
<?php
  include "../../dbconnection.php";
?>
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <!-- <base href="/Backend" /> -->
    <?php
        include "../../head.php";
    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery('#hideshowAddQ').on('click', function(event) {
                jQuery('#AddQ').toggle('show');
            });
        });

         jQuery(document).ready(function(){
            jQuery('#hideshowAddCus').on('click', function(event) {
                jQuery('#AddCus').toggle('show');
            });
        });

    </script>
</head>
<body>
    <?php include "../header.php" ?>
    <div class="container-fluid">
    <div class = "container" style="text-align: center">

        <h2> การจัดการบัญชีผู้ใช้</h2>
        <h4>( Accounts Management )</h4><br>
         <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div style="text-align:left">
                          ลูกค้าทั่วไป
                          <div class="pull-right" style="margin-top:0;">
                            <button class="btn btn-info" id = "hideshowAddCus"><i class="glyphicon glyphicon-plus"></i> เพิ่มลูกค้า</button>
                          </div>
                        </div>
                    </div>
                    <ul class="list-group">
                       <li class="list-group-item">
                         <div id="search-input">
                            <div class="input-group col-md-12">
                                <input type="text" id = "general_customer" class="form-control input-md" placeholder="ชื่อ ลูกค้า" />
                                  <span class="input-group-btn">
                                    <button class="btn btn-info btn-md" type="button">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                       </div>
                     </li>
                       <li class="list-group-item"><a href="#" onClick="$('#addbox').hide(); $('#editbox').show()">นาย รชต ชูนิล</a></li>
                    </ul>
                    <div class="panel-footer">
                            <div id = "addCustomer">
                                <div id="AddCus" style="display: none">
                                 <form id="addCustomerForm" onsubmit="return confirm('Do you really want to submit?');" action ="addCustomer.php" method="post" class="form-horizontal" role="form" style="margin-top: 20px">
                                    <!-- <form class="from" onsubmit="return confirm('Do you really want to submit?');" method="post" action="AddCustomer.php" style="margin-top: 20px"> -->
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">ชื่อ</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="ชื่อ" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">นามสกุล</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="นามสกุล" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address" required="true">
                                    </div>
                                </div>


                                 <div class="form-group">
                                    <label for="phone" class="col-md-3 control-label">เพศ</label>
                                    <div class="col-md-9">
                                        <select name="gender" class="form-control" aria-describedby="sizing-addon" required="ture">
                                            <option value="">เลือกเพศ</option>
                                            <option value="M">ชาย</option>
                                            <option value="F">หญิง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">ที่อยู่</label>
                                    <div class="col-md-9">
                                        <textarea name="address"  cols="50" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password" required="ture">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="phone" placeholder="เบอร์โทรศัพท์" required="ture">
                                    </div>
                                </div>

                                        <button type="submit" class="btn btn-info">เพิ่ม</button>

                                    </form>
                                </div>
                        </div>

                    </div>

                </div>

        </div>

        <div class="col-lg-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                      <div style="text-align:left">
                        ลูกค้าองค์กร
                        <div class="pull-right" style="margin-top:0;">
                          <button class="btn btn-warning" id = "hideshowAddQ"><i class="glyphicon glyphicon-plus"></i> เพิ่มลูกค้าองค์กร</button>
                        </div>
                      </div>
                    </div>
                    <ul class="list-group">
                      <li class="list-group-item">
                        <div id="search-input">
                           <div class="input-group col-md-12">
                               <input type="text" id = "general_customer" class="form-control input-md" placeholder="ชื่อ ลูกค้า" />
                                 <span class="input-group-btn">
                                   <button class="btn btn-warning btn-md" type="button">
                                       <i class="glyphicon glyphicon-search"></i>
                                   </button>
                               </span>
                           </div>
                      </div>
                    </li>
                      <li class="list-group-item"><a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">CourseSquare.co</a></li>
                    </ul>
                    <div class="panel-footer">
                        <div id = "addOrganization">
                                <div id="AddQ" style="display: none">
                                 <form id="addOrganizationForm" onsubmit="return confirm('Do you really want to submit?');" action ="index.php" method="post" class="form-horizontal" role="form" style="margin-top: 20px">
                                     <div class="form-group">
                                    <label for="organization" class="col-md-3 control-label">ชื่อองกรณ์</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="organization" placeholder="ชื่อองกรณ์">
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">ชื่อ</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="ชื่อ">
                                    </div>
                                    </div>

                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">นามสกุล</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="นามสกุล">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">ที่อยู่</label>
                                    <div class="col-md-9">
                                        <textarea name="address"  cols="50" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="phone" placeholder="เบอร์โทรศัพท์">
                                    </div>
                                </div>
                                        <button type="submit" class="btn btn-warning">เพิ่ม</button>

                                    </form>

                                </div>
                        </div>


                    </div>

                </div>

        </div>
    </div>
    </div>
</body>


</html>
