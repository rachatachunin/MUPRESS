<!DOCTYPE html>
<html>
<?php
  include "../../dbconnection.php";
  //sql geting data
  $sql_getCustomer = "SELECT * FROM user ORDER BY user_fn ASC  ";
  $sql_getOrganization = "SELECT comp.user_id, comp.organization_name FROM organization as comp LEFT JOIN user ON comp.user_id = user.user_id
                          ORDER BY comp.organization_name ASC ";
  //query data
  $result = mysqli_query($con,$sql_getCustomer);
  $result2 = mysqli_query($con,$sql_getOrganization);

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

    <script >
    function editCUS(str) {
        if (str == "") {
            document.getElementById("editCustomers").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("editCustomers").innerHTML = xmlhttp.responseText;
                    $('#EditC'+str).modal('show');
                }
            }
            xmlhttp.open("GET","editCustomerDetail.php?q="+str,true);
            xmlhttp.send();
        }
    }

    function editOR(str) {
        if (str == "") {
            document.getElementById("editOrganization").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("editOrganization").innerHTML = xmlhttp.responseText;
                    $('#EditO'+str).modal('show');
                }
            }
            xmlhttp.open("GET","editOrganizationDetail.php?q="+str,true);
            xmlhttp.send();
        }
    }

    function generateRandomString() {
      var text = "";
     var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
     for( var i=0; i < 10; i++ )
         text += possible.charAt(Math.floor(Math.random() * possible.length));

    var elem = document.getElementById("mytext");
    elem.value = text;

    }

    function generateRandomStringOr() {
      var text = "";
     var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
     for( var i=0; i < 10; i++ )
         text += possible.charAt(Math.floor(Math.random() * possible.length));

    var elem = document.getElementById("mytextOr");
    elem.value = text;

    }

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
                     <?php
                     while($row1 = mysqli_fetch_array($result)){
                      echo '<li class = "list-group-item">' ;
                      echo $row1['user_fn']."  ".$row1['user_ln'];
                      echo '<a href="#" class="icon pull-right" onclick="editCUS('.$row1['user_id'].')">
                            <span class="glyphicon glyphicon-cog"></span>
                            </a>
                            </li>';
                          }
                     ?>
                       <!-- <li class="list-group-item"><a href="#" onClick="$('#addbox').hide(); $('#editbox').show()">นาย รชต ชูนิล</a></li> -->
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
                                    <label for="address" class="col-md-3 control-label">ที่อยู่</label>
                                    <div class="col-md-9">
                                        <textarea  name="address"  cols="50" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                      <div class="col-md-6">
                                          <input type="password" class="form-control"  id ="mytext" value="" name="pass" placeholder="Password">
                                      </div>
                                      <div class="col-md-3">
                                          <button type="button" class="btn btn-info" onclick="generateRandomString()" name="button">Generate Password</button>
                                      </div>
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
                    <?php
                    while($row2 = mysqli_fetch_array($result2)){
                     echo '<li class = "list-group-item">' ;
                     echo $row2['organization_name'];
                     echo '<a href="#" class="icon pull-right" onclick="editOR('.$row2['user_id'].')" >
                           <span class="glyphicon glyphicon-cog"></span>
                           </a>
                           </li>';
                   }
                    ?>

                      <!-- <li class="list-group-item"><a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">CourseSquare.co</a></li> -->
                    </ul>
                    <div class="panel-footer">
                        <div id = "addOrganization">
                                <div id="AddQ" style="display: none">
                                 <form id="addOrganizationForm" onsubmit="return confirm('Do you really want to submit?');" action ="addOrganization.php" method="post" class="form-horizontal" role="form" style="margin-top: 20px">
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
                                      <div class="col-md-6">
                                          <input type="password" class="form-control"  id ="mytextOr" value="" name="pass" placeholder="Password">
                                      </div>
                                      <div class="col-md-3">
                                          <button type="button" class="btn btn-warning" onclick="generateRandomStringOr()" name="button">Generate Password</button>
                                      </div>
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

<div id= "editCustomers">  </div>

<div id= "editOrganization">  </div>


</html>
