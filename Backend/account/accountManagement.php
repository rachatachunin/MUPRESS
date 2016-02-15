<!DOCTYPE html>
<html>
<?php
  include "../../dbconnection.php";
  //sql geting data
  $sql_getCustomer = "SELECT * FROM user WHERE user_type = 2 ORDER BY user_fn ASC  ";
  $sql_getOrganization = "SELECT comp.user_id, comp.organization_name FROM organization as comp LEFT JOIN user ON comp.user_id = user.user_id
                          ORDER BY comp.organization_name ASC ";
  $sql_getAuthor ="SELECT * FROM user WHERE user_type = 3 ORDER BY user_fn ASC ";
  //query data
  $result = mysqli_query($con,$sql_getCustomer);
  $result2 = mysqli_query($con,$sql_getOrganization);
  $result3 = mysqli_query($con,$sql_getAuthor);

?>
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <!-- <base href="/Backend" /> -->
    <?php
        include "../../head.php";
    ?>

    <style>
      .boxes {
        height: 500px;
        overflow: auto ;
      }
    </style>
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
        return confirm("คุณต้องการจะเพิ่มลูกค้าใหม่หรือไม่ ?");
      }
    }

    function validateOr(e){
      var filter = /[ก-๙a-zA-Z]/ ;
      var filterOrganization = /[.,'ก-๙a-zA-Z]/ ;
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      var name = document.getElementById("name_or").value ;
      var fname = document.getElementById("fn_or").value ;
      var lname = document.getElementById("ln_or").value ;
      var email = document.getElementById("email_or").value ;
      var address = document.getElementById("address_or").value ;
      var tel = document.getElementById("tel_or").value ;
       if(name == "" || !filterOrganization.test(name)){
         alert("กรุณากรอกชื่อองค์กรของลูกค้า");
         return false ;
      }else if(fname == "" || !filter.test(fname)){
        alert("กรุณากรอกชื่อของลูกค้า");
        return false ;
      }else if(lname == "" || !filter.test(lname)){
        alert("กรุณากรอก นามสกุล ของลูกค้า");
        return false ;
      }else if(email == "" || !re.test(email)){
        alert("กรุณา e-mail ของลูกค้า");
        return false ;
      }else if(address == "" ){
        alert("กรุณากรอกที่อยู่ลูกค้า");
        return false ;
     }else if(tel == "" || filter.test(tel) || tel.length != 10 ){
        alert("กรุณากรอกเบอร์โทรลูกค้า");
        return false ;
     }else{
        return confirm("คุณต้องการจะเพิ่มลูกค้าใหม่หรือไม่ ?");
      }
    }
    function DelB(user,book){
      var path = "deleteBookFromAuthor.php?user=" + user +  "&book=" + book ;
      if(confirm("ยืนยันที่จะลบหนังสือหรือไม่")){
      window.location.href= path ;
    }else{
      false ; 
    }
    }

  function deleteCustomer(str){
    var path = "deleteCustomer.php?q=" + str  ;
    window.location.href= path ;
  }
  function deleteOrganization(str){
    var path = "deleteOrganization.php?q=" + str  ;
    window.location.href= path ;
  }

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
    function editAT(str) {
        if (str == "") {
            document.getElementById("editAuthor").innerHTML = "";
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
                    document.getElementById("editAuthor").innerHTML = xmlhttp.responseText;
                    $('#EditAT'+str).modal('show');
                }
            }
            xmlhttp.open("GET","editAuthorDetail.php?q="+str,true);
            xmlhttp.send();
        }
    }

    function addToAuthor(str){
      if( confirm('ยืนยันการตัดสินใจ')){
        window.location.assign("addToAuthor.php?id="+str);
      }else{
        return false ;
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

    $("#search_general_customer").on("keyup", function() {
    var value = $(this).val();

          $("table tr").each(function(index) {
              if (index !== 0) {

                  $row = $(this);

                  var id = $row.find("td:first").text();

                  if (id.indexOf(value) !== 0) {
                      $row.hide();
                  }
                  else {
                      $row.show();
                  }
              }
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

<!-- general custmer          -->
         <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div style="text-align:left">
                          ลูกค้าทั่วไป
                          <div class="pull-right" style="margin-top:0;">
                            <button class="btn btn-info" id = "hideshowAddCus"><i class="glyphicon glyphicon-plus"></i> เพิ่มลูกค้า</button>
                          </div>
                        </div>
                    </div>

                    <ul class="list-group list">
                       <li class="list-group-item">
                         <div id="search-input">
                            <div class="input-group col-md-12">
                                <input type="text" id = "search_general_customer" onkeyup="filter(this)" class="form-control input-md" placeholder="ค้นหา ลูกค้า" />
                                  <span class="input-group-btn">
                                    <button class="btn btn-info btn-md" type="button">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                       </div>
                       <div id = "addCustomer">
                           <div id="AddCus" style="display: none">
                            <form id="addCustomerForm" onsubmit="return validateCus();" action ="addCustomer.php" method="post" class="form-horizontal" role="form" style="margin-top: 20px">
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

                                   <button type="submit" class="btn btn-info">เพิ่ม</button>

                               </form>
                           </div>
                   </div>
                     </li>

                   </ul>
                  <div class="boxes">
                   <ul class="list-group " id = "customerUL">
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
                  </div>


                </div>

        </div>
<!-- End general customer  -->

<!-- Organization customer  -->
        <div class="col-lg-4">
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
                               <input type="text" id = "search_organization_customer" onkeyup ="filterOr(this)" class="form-control input-md" placeholder="ค้นหาลูกค้าองค์กร" />
                                 <span class="input-group-btn">
                                   <button class="btn btn-warning btn-md" type="button">
                                       <i class="glyphicon glyphicon-search"></i>
                                   </button>
                               </span>
                           </div>
                      </div>
                      <div id = "addOrganization">
                              <div id="AddQ" style="display: none">
                               <form id="addOrganizationForm" onsubmit="return validateOr();" action ="addOrganization.php" method="post" class="form-horizontal" role="form" style="margin-top: 20px">
                                   <div class="form-group">
                                  <label for="organization" class="col-md-3 control-label">ชื่อองกรณ์ (ต้องการข้อมูล)</label>
                                  <div class="col-md-9">
                                      <input type="text" class="form-control" id="name_or" name="organization" placeholder="ชื่อองกรณ์">
                                  </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="firstname" class="col-md-3 control-label">ชื่อ (ต้องการข้อมูล)</label>
                                  <div class="col-md-9">
                                      <input type="text" class="form-control"  id="fn_or" name="firstname" placeholder="ชื่อ">
                                  </div>
                                  </div>

                              <div class="form-group">
                                  <label for="lastname" class="col-md-3 control-label">นามสกุล (ต้องการข้อมูล)</label>
                                  <div class="col-md-9">
                                      <input type="text" class="form-control" id="ln_or" name="lastname" placeholder="นามสกุล">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label for="email" class="col-md-3 control-label">Email (ต้องการข้อมูล)</label>
                                  <div class="col-md-9">
                                      <input type="text" class="form-control" id="email_or" name="email" placeholder="Email Address">
                                  </div>
                              </div>



                              <div class="form-group">
                                  <label for="password" class="col-md-3 control-label">ที่อยู่ (ต้องการข้อมูล)</label>
                                  <div class="col-md-9">
                                      <textarea name="address" id="address_or" cols="50" rows="5"></textarea>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="phone" class="col-md-3 control-label">เบอร์โทรศัพท์ (ต้องการข้อมูล)</label>
                                  <div class="col-md-9">
                                      <input type="text" class="form-control" id="tel_or" name="phone" placeholder="เบอร์โทรศัพท์">
                                  </div>
                              </div>
                                      <button type="submit" class="btn btn-warning">เพิ่ม</button>

                                  </form>

                              </div>
                      </div>
                    </li>
                  </ul>
                  <div class="boxes">
                  <ul class="list-group" id ="organizationUL">
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
                  </div>

                </div>

        </div>
<!-- End Organization customer  -->

<!-- Author customer  -->
        <div class="col-lg-4 text-center">
          <div class="panel panel-success">
            <div class="panel-heading">
              <div style="text-align:left">
                ผู้เขียน
              </div>
            </div>
            <ul class="list-group">
              <li class="list-group-item">
                <div id="search-input">
                   <div class="input-group col-md-12">
                       <input type="text" id = "general_customer" onkeyup="filterAuther(this)" class="form-control input-md" placeholder="ค้นหาผู้เขียน" />
                         <span class="input-group-btn">
                           <button class="btn btn-success btn-md" type="button">
                               <i class="glyphicon glyphicon-search"></i>
                           </button>
                       </span>
                   </div>
              </div>
            </li>
            </ul>
            <div class="boxes">
            <ul class ="list-group" id = "authorUL">
            <?php

            while($row3 = mysqli_fetch_array($result3)){
              // var_dump($row3);
              echo '<li class = "list-group-item">' ;
              echo $row3['user_fn']."  ".$row3['user_ln'] ;
              echo '<a href="#" class="icon pull-right" onclick="editAT('.$row3['user_id'].');">
                    <span class="glyphicon glyphicon-cog"></span>
                    </a>
                    </li>';
                  }

            ?>
            </ul>
          </div>


          </div>

        </div>


    </div>
    </div>
</body>

<div id= "editCustomers">  </div>

<div id= "editOrganization">  </div>
<div id= "editAuthor">  </div>
</html>

<script type="text/javascript">

function filter(element) {
        var value = $(element).val();

        $("#customerUL > li").each(function() {
            if ($(this).text().search(value) > -1) {
                $(this).show();
            }
            else {
                $(this).hide();
            }
        });
    }

    function filterOr(element) {
            var value = $(element).val();

            $("#organizationUL > li").each(function() {
                if ($(this).text().search(value) > -1) {
                    $(this).show();
                }
                else {
                    $(this).hide();
                }
            });
        }

        function filterAuther(element) {
                var value = $(element).val();

                $("#authorUL > li").each(function() {
                    if ($(this).text().search(value) > -1) {
                        $(this).show();
                    }
                    else {
                        $(this).hide();
                    }
                });
            }


</script>
